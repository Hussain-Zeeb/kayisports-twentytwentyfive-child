// Kayi Sports (black & gold) — small enhancements on top of the block markup:
// marquee, product shelves, the boxing-gloves explorer, video tiles and the
// newsletter form. Every part checks for its markup, so it's safe site-wide.

(function () {
  "use strict";

  var reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  // ---------------------------------------------------------------------------
  // Marquee — duplicate the items once so the CSS loop (-50%) is seamless.
  // ---------------------------------------------------------------------------

  function markClone(node) {
    node.setAttribute("aria-hidden", "true");
    node.querySelectorAll("a").forEach(function (a) {
      a.setAttribute("tabindex", "-1");
    });
    return node;
  }

  function initMarquee() {
    document.querySelectorAll(".kayi-c-marquee__track").forEach(function (track) {
      var originals = Array.prototype.slice.call(track.children);
      if (!originals.length) return;

      // On wide screens repeat the set until it fills the viewport, so the
      // second half of the loop never shows a gap.
      var guard = 0;
      while (track.scrollWidth < window.innerWidth && guard++ < 8) {
        originals.forEach(function (item) {
          track.appendChild(markClone(item.cloneNode(true)));
        });
      }

      Array.prototype.slice.call(track.children).forEach(function (item) {
        track.appendChild(markClone(item.cloneNode(true)));
      });
    });
  }

  // ---------------------------------------------------------------------------
  // Product shelves — style/category tabs and prev/next arrows for the rail.
  // Each tab's link is "#slug" (or "#slug,slug"), matched against the
  // product_cat-{slug} classes WooCommerce puts on every card; "#all" resets.
  // Arrows are added to sections with the "has-arrows" class.
  // ---------------------------------------------------------------------------

  var CHEVRONS = { prev: "15 18 9 12 15 6", next: "9 18 15 12 9 6" };

  function initShelves() {
    document.querySelectorAll(".kayi-c-shelf").forEach(function (section, index) {
      var rail = section.querySelector(".kayi-c-cards");
      if (!rail) return;
      if (!rail.id) rail.id = "kayi-c-rail-" + (index + 1);

      var requestUpdate = function () {};

      if (section.classList.contains("has-arrows")) {
        var host = section.querySelector(".kayi-c-head__actions");
        var tabsEl = section.querySelector(".kayi-c-tabs");
        if (!host && tabsEl) {
          // Group the tabs and arrows so they sit together on the right.
          host = document.createElement("div");
          host.className = "kayi-c-shelf__controls";
          tabsEl.parentNode.insertBefore(host, tabsEl);
          host.appendChild(tabsEl);
        }
        host = host || section.querySelector(".kayi-c-head");
        var arrows = document.createElement("div");
        arrows.className = "kayi-c-arrows";

        var makeArrow = function (dir) {
          var btn = document.createElement("button");
          btn.type = "button";
          btn.className = "kayi-c-arrow kayi-c-arrow--" + dir;
          btn.setAttribute("aria-label", dir === "prev" ? "Previous products" : "Next products");
          btn.setAttribute("aria-controls", rail.id);
          btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="20" height="20" aria-hidden="true"><polyline points="' + CHEVRONS[dir] + '"></polyline></svg>';
          btn.addEventListener("click", function () {
            var card = rail.querySelector(":scope > li:not([hidden])");
            if (!card) return;
            var step = card.getBoundingClientRect().width + (parseFloat(getComputedStyle(rail).columnGap) || 0);
            rail.scrollBy({ left: (dir === "prev" ? -1 : 1) * step, behavior: reduceMotion ? "auto" : "smooth" });
          });
          return btn;
        };

        var prev = makeArrow("prev");
        var next = makeArrow("next");
        arrows.appendChild(prev);
        arrows.appendChild(next);
        host.appendChild(arrows);

        var ticking = false;
        var update = function () {
          ticking = false;
          var max = rail.scrollWidth - rail.clientWidth;
          arrows.hidden = max <= 1;
          prev.disabled = rail.scrollLeft <= 1;
          next.disabled = rail.scrollLeft >= max - 1;
        };
        requestUpdate = function () {
          if (ticking) return;
          ticking = true;
          requestAnimationFrame(update);
        };
        rail.addEventListener("scroll", requestUpdate, { passive: true });
        window.addEventListener("resize", requestUpdate);
        update();
      }

      var tabs = section.querySelector(".kayi-c-tabs");
      if (!tabs) return;
      var cards = Array.prototype.slice.call(rail.querySelectorAll(":scope > li"));

      function slugsOf(link) {
        var hash = (link.getAttribute("href") || "").split("#")[1] || "all";
        return hash.split(",").map(function (s) { return s.trim(); }).filter(Boolean);
      }

      function matchesFor(link) {
        var slugs = slugsOf(link);
        if (slugs.indexOf("all") !== -1) return cards;
        return cards.filter(function (card) {
          return slugs.some(function (slug) {
            return card.classList.contains("product_cat-" + slug);
          });
        });
      }

      // Drop options that match nothing (or everything — no point filtering).
      var links = Array.prototype.slice.call(tabs.querySelectorAll(".wp-block-button__link")).filter(function (link) {
        var count = matchesFor(link).length;
        var isAll = slugsOf(link).indexOf("all") !== -1;
        link.dataset.count = count;
        if (!isAll && (count === 0 || count === cards.length)) {
          (link.closest(".wp-block-button") || link).hidden = true;
          return false;
        }
        return true;
      });

      if (links.length < 2) {
        tabs.hidden = true;
        return;
      }

      function apply(link) {
        var shown = matchesFor(link);
        cards.forEach(function (card) {
          card.hidden = shown.indexOf(card) === -1;
        });

        links.forEach(function (l) {
          var active = l === link;
          l.classList.toggle("is-active", active);
          l.setAttribute("aria-pressed", active ? "true" : "false");
        });

        rail.scrollLeft = 0;
        requestUpdate();
        section.dispatchEvent(new CustomEvent("kayi:filter", { detail: { link: link, count: shown.length } }));
      }

      links.forEach(function (link) {
        link.setAttribute("role", "button");
        link.addEventListener("click", function (e) {
          // Stop the theme's smooth-scroll handler treating "#slug" as an anchor.
          e.preventDefault();
          e.stopPropagation();
          apply(link);
        });
      });

      if (tabs.classList.contains("has-sheet")) {
        initFilterSheet(section, tabs, rail, links, matchesFor);
      }

      apply(links[0]);
    });
  }

  // ---------------------------------------------------------------------------
  // Filter bottom sheet (phones) — a "Filter" bar fixed to the bottom of the
  // screen while the product grid is in view; tapping it slides up a sheet of
  // the same options as the tabs. Choosing one and pressing "Show N products"
  // clicks the matching tab, so the tabs stay the single source of truth.
  // ---------------------------------------------------------------------------

  var FILTER_ICON = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M4 6h10M18 6h2M4 12h4M12 12h8M4 18h12M20 18h0"/><circle cx="16" cy="6" r="2"/><circle cx="10" cy="12" r="2"/><circle cx="18" cy="18" r="2"/></svg>';
  var CLOSE_ICON = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M6 6l12 12M18 6L6 18"/></svg>';

  function initFilterSheet(section, tabs, rail, links, matchesFor) {
    var title = tabs.getAttribute("data-sheet-title") || "Filter";
    var id = "kayi-sheet-" + Math.random().toString(36).slice(2, 8);
    var current = 0;
    var pending = 0;

    var bar = document.createElement("div");
    bar.className = "kayi-filterbar";
    bar.innerHTML = '<button type="button" class="kayi-filterbar__btn" aria-haspopup="dialog" aria-controls="' + id + '">' + FILTER_ICON + '<span></span><span class="kayi-filterbar__value"></span></button>';
    var barBtn = bar.querySelector("button");
    barBtn.children[1].textContent = title;

    var sheet = document.createElement("div");
    sheet.className = "kayi-sheet";
    sheet.id = id;
    sheet.innerHTML =
      '<div class="kayi-sheet__backdrop"></div>' +
      '<div class="kayi-sheet__panel" role="dialog" aria-modal="true" aria-labelledby="' + id + '-title">' +
        '<div class="kayi-sheet__head"><h2 class="kayi-sheet__title" id="' + id + '-title"></h2>' +
        '<button type="button" class="kayi-sheet__close" aria-label="Close">' + CLOSE_ICON + "</button></div>" +
        '<p class="kayi-sheet__label">Category</p>' +
        '<ul class="kayi-sheet__list" role="radiogroup"></ul>' +
        '<button type="button" class="kayi-sheet__apply"></button>' +
      "</div>";
    sheet.querySelector(".kayi-sheet__title").textContent = title;

    var list = sheet.querySelector(".kayi-sheet__list");
    var applyBtn = sheet.querySelector(".kayi-sheet__apply");

    var opts = links.map(function (link, i) {
      var li = document.createElement("li");
      var btn = document.createElement("button");
      btn.type = "button";
      btn.className = "kayi-sheet__opt";
      btn.setAttribute("role", "radio");
      btn.innerHTML = '<span></span><span class="kayi-sheet__count"></span>';
      btn.children[0].textContent = link.textContent.trim();
      btn.children[1].textContent = link.dataset.count;
      btn.addEventListener("click", function () {
        pending = i;
        sync();
      });
      li.appendChild(btn);
      list.appendChild(li);
      return btn;
    });

    function sync() {
      opts.forEach(function (o, i) {
        o.setAttribute("aria-checked", i === pending ? "true" : "false");
        o.tabIndex = i === pending ? 0 : -1;
      });
      var n = matchesFor(links[pending]).length;
      applyBtn.textContent = "Show " + n + (n === 1 ? " product" : " products");
    }

    function open() {
      pending = current;
      sync();
      sheet.classList.add("is-open");
      document.documentElement.classList.add("kayi-sheet-open");
      bar.classList.remove("is-visible");
      opts[pending].focus();
    }

    function close() {
      sheet.classList.remove("is-open");
      document.documentElement.classList.remove("kayi-sheet-open");
      updateBar();
      barBtn.focus({ preventScroll: true });
    }

    barBtn.addEventListener("click", open);
    sheet.querySelector(".kayi-sheet__close").addEventListener("click", close);
    sheet.querySelector(".kayi-sheet__backdrop").addEventListener("click", close);
    applyBtn.addEventListener("click", function () {
      links[pending].click();
      close();
      var top = rail.getBoundingClientRect().top + window.pageYOffset - 140;
      window.scrollTo({ top: Math.max(0, top), behavior: reduceMotion ? "auto" : "smooth" });
    });

    sheet.addEventListener("keydown", function (e) {
      if (e.key === "Escape") {
        close();
      } else if (e.key === "ArrowDown" || e.key === "ArrowUp") {
        e.preventDefault();
        pending = (pending + (e.key === "ArrowDown" ? 1 : opts.length - 1)) % opts.length;
        sync();
        opts[pending].focus();
      } else if (e.key === "Tab") {
        // Keep focus inside the sheet.
        var focusable = [opts[pending], applyBtn, sheet.querySelector(".kayi-sheet__close")];
        var i = focusable.indexOf(document.activeElement);
        e.preventDefault();
        focusable[(i + (e.shiftKey ? focusable.length - 1 : 1)) % focusable.length].focus();
      }
    });

    section.addEventListener("kayi:filter", function (e) {
      current = links.indexOf(e.detail.link);
      bar.querySelector(".kayi-filterbar__value").textContent = e.detail.link.textContent.trim();
    });

    // Show the bar only while the products are on screen.
    var inView = false;
    function updateBar() {
      bar.classList.toggle("is-visible", inView && !sheet.classList.contains("is-open"));
    }
    if ("IntersectionObserver" in window) {
      new IntersectionObserver(function (entries) {
        inView = entries[0].isIntersecting;
        updateBar();
      }, { rootMargin: "-120px 0px -40% 0px" }).observe(rail);
    } else {
      inView = true;
    }

    document.body.appendChild(bar);
    document.body.appendChild(sheet);
    updateBar();
  }

  // ---------------------------------------------------------------------------
  // Boxing-gloves explorer — hovering (desktop) or tapping (mobile tab bar /
  // swipe) a feature slides the media stage to the matching slide.
  // Slides and features are paired by order.
  // ---------------------------------------------------------------------------

  var PLAY_ICON = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30" height="30" fill="currentColor" aria-hidden="true"><path d="M8 5.5v13a1 1 0 0 0 1.5.86l10.5-6.5a1 1 0 0 0 0-1.72L9.5 4.64A1 1 0 0 0 8 5.5z"/></svg>';
  var PAUSE_ICON = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="26" height="26" fill="currentColor" aria-hidden="true"><path d="M7 5h3.5v14H7zM13.5 5H17v14h-3.5z"/></svg>';

  function text(el, sel) {
    var n = el.querySelector(sel);
    return n ? n.textContent.trim() : "";
  }

  // Show/hide a bottom bar (.kayi-c-featbar). Showing plays the dot-expand
  // intro (CSS); hiding plays it in reverse (.is-leaving) unless instant.
  function setDock(dock, show, instant) {
    var visible = dock.classList.contains("is-visible");
    if (show === visible) return;
    dock.classList.remove("is-leaving");
    if (show) {
      dock.classList.add("is-visible");
      return;
    }
    dock.classList.remove("is-visible");
    if (instant || reduceMotion) return;
    dock.classList.add("is-leaving");
    dock.addEventListener("animationend", function done(e) {
      if (e.target !== dock || e.pseudoElement) return;
      dock.classList.remove("is-leaving");
      dock.removeEventListener("animationend", done);
    });
  }

  function initExplorers() {
    document.querySelectorAll(".kayi-c-explore").forEach(function (explore) {
      var stage = explore.querySelector(".kayi-c-stage");
      var track = explore.querySelector(".kayi-c-stage__track");
      var slides = track ? Array.prototype.slice.call(track.children) : [];
      var opts = Array.prototype.slice.call(explore.querySelectorAll(".kayi-c-opt"));
      if (!stage || !slides.length || !opts.length) return;

      var count = Math.min(slides.length, opts.length);
      var current = -1;

      // Progress bars along the top.
      var bars = document.createElement("div");
      bars.className = "kayi-c-stage__bars";
      bars.setAttribute("aria-hidden", "true");

      // Caption bottom-left ("01  COMFORT – COWHIDE LEATHER").
      // On phones this is the feature's description, so announce changes.
      var caption = document.createElement("p");
      caption.className = "kayi-c-stage__caption";
      caption.setAttribute("aria-live", "polite");

      // Phones: the features become a bar fixed to the bottom of the screen,
      // which slides up while the stage is on screen (hidden on larger screens).
      var dock = document.createElement("div");
      dock.className = "kayi-c-featbar kayi-c-featbar--auto";
      var tabBar = document.createElement("div");
      tabBar.className = "kayi-c-stage__tabs";
      tabBar.setAttribute("role", "tablist");
      tabBar.setAttribute("aria-label", "Glove features");
      tabBar.style.setProperty("--kc-tabs", count);

      // Play / pause for video slides.
      var play = document.createElement("button");
      play.type = "button";
      play.className = "kayi-c-play";
      play.innerHTML = PLAY_ICON;
      play.setAttribute("aria-label", "Play video");

      // Auto-play state (phones) — see autoFrame() below.
      var AUTO_MS = 5000;
      var phone = window.matchMedia("(max-width: 781px)");
      var autoElapsed = 0;
      var autoLast = 0;
      var autoRaf = 0;
      var holding = false;
      // Videos play by themselves (muted) while their slide is showing; a
      // visitor pausing one stops that until another slide is picked.
      var userPaused = false;
      var stageInView = false;

      var tabs = [];
      for (var k = 0; k < count; k++) {
        bars.appendChild(document.createElement("span"));

        var tab = document.createElement("button");
        tab.type = "button";
        tab.className = "kayi-c-stage__tab";
        tab.setAttribute("role", "tab");
        tab.innerHTML = '<small></small><span></span><i class="kayi-c-stage__timer" aria-hidden="true"></i>';
        tab.querySelector("small").textContent = text(opts[k], ".kayi-c-opt__num");
        tab.querySelector("span").textContent = text(opts[k], ".kayi-c-opt__title").replace(/\.$/, "");
        tab.addEventListener("click", select.bind(null, k));
        tabBar.appendChild(tab);
        tabs.push(tab);

        var opt = opts[k];
        opt.setAttribute("tabindex", "0");
        opt.setAttribute("role", "button");
        opt.addEventListener("mouseenter", select.bind(null, k));
        opt.addEventListener("focus", select.bind(null, k));
        opt.addEventListener("click", select.bind(null, k));
        opt.addEventListener("keydown", function (i, e) {
          if (e.key === "Enter" || e.key === " ") {
            e.preventDefault();
            select(i);
          }
        }.bind(null, k));
      }

      stage.appendChild(bars);
      stage.appendChild(caption);
      stage.appendChild(play);
      dock.appendChild(tabBar);
      document.body.appendChild(dock);

      // Only while the gloves section is behind the bar: from when the stage
      // is well on screen until the section's bottom edge reaches the bar, so
      // it never sits over the next section.
      var section = explore.closest(".kayi-c-section") || explore;
      var ticking = false;
      function placeDock() {
        ticking = false;
        var vh = window.innerHeight;
        var r = stage.getBoundingClientRect();
        // From when the stage shows above the bar, until the section's end has
        // risen 300px up the screen (user asked for 400px more than vh + 100).
        // The bar floats 20% up the screen, so measure from there.
        var barLine = vh * 0.8;
        var show = r.top < barLine - 110 && r.bottom > vh * 0.2 && section.getBoundingClientRect().bottom > barLine - 300;
        setDock(dock, show);
        kickAuto();
      }
      function requestPlace() {
        if (ticking) return;
        ticking = true;
        requestAnimationFrame(placeDock);
      }
      window.addEventListener("scroll", requestPlace, { passive: true });
      window.addEventListener("resize", requestPlace);
      placeDock();

      slides.forEach(function (slide) {
        var v = slide.querySelector("video");
        if (!v) return;
        v.muted = true;
        v.loop = true;
        v.playsInline = true;
        v.removeAttribute("controls");
        v.addEventListener("play", syncPlay);
        v.addEventListener("pause", syncPlay);
        v.addEventListener("click", togglePlay);
      });

      function activeVideo() {
        return current >= 0 ? slides[current].querySelector("video") : null;
      }

      function syncPlay() {
        var v = activeVideo();
        var playing = !!(v && !v.paused);
        play.hidden = !v;
        stage.classList.toggle("is-playing", playing);
        play.innerHTML = playing ? PAUSE_ICON : PLAY_ICON;
        play.setAttribute("aria-label", playing ? "Pause video" : "Play video");
        kickAuto();
      }

      function togglePlay() {
        var v = activeVideo();
        if (!v) return;
        if (v.paused) {
          userPaused = false;
          var p = v.play();
          if (p && p.catch) p.catch(function () {});
        } else {
          userPaused = true;
          v.pause();
        }
      }

      function autoVideo() {
        var v = activeVideo();
        slides.forEach(function (slide) {
          var other = slide.querySelector("video");
          if (other && other !== v && !other.paused) other.pause();
        });
        if (!v) return;
        var want = stageInView && !userPaused && !document.hidden && !reduceMotion;
        if (want && v.paused) {
          v.muted = true;
          var p = v.play();
          if (p && p.catch) p.catch(function () {});
        } else if (!want && !v.paused && !userPaused) {
          v.pause();
        }
      }

      if ("IntersectionObserver" in window) {
        new IntersectionObserver(function (entries) {
          stageInView = entries[0].isIntersecting;
          autoVideo();
        }, { threshold: 0.4 }).observe(stage);
      }
      document.addEventListener("visibilitychange", function () {
        autoVideo();
      });
      play.addEventListener("click", togglePlay);

      function select(i) {
        if (i === current || i < 0 || i >= count) return;
        current = i;

        track.style.transform = "translateX(" + (-100 * i) + "%)";

        slides.forEach(function (slide, n) {
          var on = n === i;
          slide.classList.toggle("is-active", on);
          slide.setAttribute("aria-hidden", on ? "false" : "true");
          var v = slide.querySelector("video");
          if (v && !on && !v.paused) v.pause();
          // Coming back to a video slide starts the clip from the top.
          if (v && on && v.readyState > 0) v.currentTime = 0;
          // Animated slides (e.g. the padding cut-away) restart from the top.
          slide.querySelectorAll(".kayi-c-layers").forEach(function (anim) {
            anim.classList.remove("is-playing");
            if (on) {
              void anim.offsetWidth;
              anim.classList.add("is-playing");
            }
          });
        });
        opts.forEach(function (o, n) {
          o.classList.toggle("is-active", n === i);
          o.setAttribute("aria-pressed", n === i ? "true" : "false");
        });
        tabs.forEach(function (t, n) {
          t.classList.toggle("is-active", n === i);
          t.setAttribute("aria-selected", n === i ? "true" : "false");
        });
        Array.prototype.forEach.call(bars.children, function (b, n) {
          b.classList.toggle("is-active", n === i);
        });

        var title = text(opts[i], ".kayi-c-opt__title").replace(/\.$/, "");
        var body = text(opts[i], ".kayi-c-opt__text");
        caption.innerHTML = '<b></b><strong></strong><span></span>';
        caption.querySelector("b").textContent = text(opts[i], ".kayi-c-opt__num");
        caption.querySelector("strong").textContent = title;
        caption.querySelector("span").textContent = body;

        autoElapsed = 0;
        userPaused = false;
        syncPlay();
        autoVideo();
      }

      // Phones: auto-advance every 5s while the section's bar is showing, with
      // a gold timer line filling the active tab. Taps/swipes jump and restart
      // the count; it holds while a finger is on the stage, while the video is
      // playing, and when the page is hidden. Off with reduced motion.

      function autoOn() {
        return phone.matches && !reduceMotion;
      }

      function autoRunning() {
        return autoOn() && dock.classList.contains("is-visible") && !document.hidden && !holding && !userPaused;
      }

      function paintAuto() {
        tabs.forEach(function (t, n) {
          var fill = t.querySelector(".kayi-c-stage__timer");
          var p = n !== current ? 0 : (autoOn() ? Math.min(1, autoElapsed / AUTO_MS) : 1);
          fill.style.transform = "scaleX(" + p + ")";
        });
      }

      function autoFrame(now) {
        autoRaf = 0;
        if (!autoRunning()) {
          autoLast = 0;
          paintAuto();
          return;
        }
        if (autoLast) autoElapsed += now - autoLast;
        autoLast = now;
        if (autoElapsed >= AUTO_MS) select((current + 1) % count);
        paintAuto();
        autoRaf = requestAnimationFrame(autoFrame);
      }

      function kickAuto() {
        if (autoRaf) return;
        if (autoRunning()) {
          autoLast = 0;
          autoRaf = requestAnimationFrame(autoFrame);
        } else {
          paintAuto();
        }
      }

      document.addEventListener("visibilitychange", kickAuto);
      if (phone.addEventListener) phone.addEventListener("change", kickAuto);

      // Swipe between slides on touch screens.
      var startX = null;
      var startY = null;
      stage.addEventListener("touchstart", function (e) {
        startX = e.touches[0].clientX;
        startY = e.touches[0].clientY;
        holding = true;
      }, { passive: true });
      stage.addEventListener("touchcancel", function () {
        holding = false;
        kickAuto();
      }, { passive: true });
      stage.addEventListener("touchend", function (e) {
        holding = false;
        kickAuto();
        if (startX === null) return;
        var dx = e.changedTouches[0].clientX - startX;
        var dy = e.changedTouches[0].clientY - startY;
        startX = null;
        if (Math.abs(dx) > 40 && Math.abs(dx) > Math.abs(dy)) {
          select(Math.max(0, Math.min(count - 1, current + (dx < 0 ? 1 : -1))));
        }
      }, { passive: true });

      select(0);
    });
  }

  // ---------------------------------------------------------------------------
  // Focus pads stage (.kayi-c-zoom, homepage) — the features in the section's
  // .kayi-c-zoom-opts list pair by order with the stage's [data-step] targets:
  // a hotspot zooms its picture towards it, a view (the video) just shows.
  // Hover / click / focus a feature, click a hotspot or a top bar. Phones
  // auto-advance like the gloves explorer while the stage is in view.
  // ---------------------------------------------------------------------------

  function initZooms() {
    document.querySelectorAll(".kayi-c-zoom").forEach(function (stage) {
      var section = stage.closest(".kayi-c-section") || stage.parentNode;
      var opts = Array.prototype.slice.call(section.querySelectorAll(".kayi-c-zoom-opt"));
      var targets = Array.prototype.slice.call(stage.querySelectorAll("[data-step]")).sort(function (a, b) {
        return a.getAttribute("data-step") - b.getAttribute("data-step");
      });
      var views = Array.prototype.slice.call(stage.querySelectorAll(".kayi-c-zoom__view"));
      var count = Math.min(opts.length, targets.length);
      if (!count) return;

      var current = -1;
      var AUTO_MS = 5000;
      var VIDEO_MS = 9000;
      var phone = window.matchMedia("(max-width: 781px)");
      var inView = false;
      var holding = false;
      var autoElapsed = 0;
      var autoLast = 0;
      var autoRaf = 0;

      var bars = document.createElement("div");
      bars.className = "kayi-c-zoom__bars";
      var barFills = [];
      for (var k = 0; k < count; k++) {
        var bar = document.createElement("button");
        bar.type = "button";
        bar.className = "kayi-c-zoom__bar";
        bar.setAttribute("aria-label", text(opts[k], ".kayi-c-zoom-opt__title"));
        bar.appendChild(document.createElement("i"));
        bar.addEventListener("click", select.bind(null, k));
        bars.appendChild(bar);
        barFills.push(bar.firstChild);

        var opt = opts[k];
        opt.setAttribute("tabindex", "0");
        opt.setAttribute("role", "button");
        opt.addEventListener("mouseenter", select.bind(null, k));
        opt.addEventListener("focus", select.bind(null, k));
        opt.addEventListener("click", select.bind(null, k));
        opt.addEventListener("keydown", function (i, e) {
          if (e.key === "Enter" || e.key === " ") {
            e.preventDefault();
            select(i);
          }
        }.bind(null, k));

        if (targets[k].classList.contains("kayi-c-zoom__spot")) {
          targets[k].addEventListener("click", select.bind(null, k));
        }
      }
      stage.appendChild(bars);
      stage.classList.add("is-ready");

      stage.querySelectorAll("video").forEach(function (v) {
        v.muted = true;
        v.loop = true;
        v.playsInline = true;
      });

      function syncVideo() {
        views.forEach(function (view) {
          var v = view.querySelector("video");
          if (!v) return;
          var want = view.classList.contains("is-active") && inView && !document.hidden && !reduceMotion;
          if (want && v.paused) {
            v.preload = "auto";
            var p = v.play();
            if (p && p.catch) p.catch(function () {});
          } else if (!want && !v.paused) {
            v.pause();
          }
        });
      }

      function select(i) {
        if (i === current || i < 0 || i >= count) return;
        current = i;

        var target = targets[i];
        var isSpot = target.classList.contains("kayi-c-zoom__spot");
        var view = target.closest(".kayi-c-zoom__view");
        var pic = isSpot ? target.closest(".kayi-c-zoom__pic") : null;

        views.forEach(function (v) {
          var on = v === view;
          var vid = v.querySelector("video");
          if (on && !v.classList.contains("is-active") && vid && vid.readyState > 0) vid.currentTime = 0;
          v.classList.toggle("is-active", on);
          // Pictures that aren't being zoomed settle back to full view.
          v.querySelectorAll(".kayi-c-zoom__pic").forEach(function (p) {
            if (p === pic) return;
            p.style.setProperty("--s", 1);
            p.style.setProperty("--px", 50);
            p.style.setProperty("--py", 50);
          });
        });

        if (pic) {
          pic.style.setProperty("--s", target.style.getPropertyValue("--z") || 1.4);
          pic.style.setProperty("--px", target.style.getPropertyValue("--x") || 50);
          pic.style.setProperty("--py", target.style.getPropertyValue("--y") || 50);
        }

        targets.forEach(function (t) {
          if (t.classList.contains("kayi-c-zoom__spot")) t.classList.toggle("is-active", t === target);
        });
        opts.forEach(function (o, n) {
          o.classList.toggle("is-active", n === i);
          o.setAttribute("aria-pressed", n === i ? "true" : "false");
        });

        autoElapsed = 0;
        syncVideo();
        paintAuto();
      }

      // Phones: auto-advance (longer on the video), holding while a finger is
      // on the stage or the stage is off screen. Off with reduced motion.

      function stepMs() {
        return targets[current] && !targets[current].classList.contains("kayi-c-zoom__spot") ? VIDEO_MS : AUTO_MS;
      }

      function autoOn() {
        return phone.matches && !reduceMotion;
      }

      function autoRunning() {
        return autoOn() && inView && !document.hidden && !holding;
      }

      function paintAuto() {
        barFills.forEach(function (fill, n) {
          var p = n !== current ? 0 : (autoOn() ? Math.min(1, autoElapsed / stepMs()) : 1);
          fill.style.transform = "scaleX(" + p + ")";
        });
      }

      function autoFrame(now) {
        autoRaf = 0;
        if (!autoRunning()) {
          autoLast = 0;
          paintAuto();
          return;
        }
        if (autoLast) autoElapsed += now - autoLast;
        autoLast = now;
        if (autoElapsed >= stepMs()) select((current + 1) % count);
        paintAuto();
        autoRaf = requestAnimationFrame(autoFrame);
      }

      function kickAuto() {
        if (autoRaf) return;
        if (autoRunning()) {
          autoLast = 0;
          autoRaf = requestAnimationFrame(autoFrame);
        } else {
          paintAuto();
        }
      }

      if ("IntersectionObserver" in window) {
        new IntersectionObserver(function (entries) {
          inView = entries[0].isIntersecting;
          syncVideo();
          kickAuto();
        }, { threshold: 0.5 }).observe(stage);
      }
      document.addEventListener("visibilitychange", function () {
        syncVideo();
        kickAuto();
      });
      if (phone.addEventListener) phone.addEventListener("change", kickAuto);

      // Swipe between features on touch screens.
      var startX = null;
      var startY = null;
      stage.addEventListener("touchstart", function (e) {
        startX = e.touches[0].clientX;
        startY = e.touches[0].clientY;
        holding = true;
      }, { passive: true });
      stage.addEventListener("touchcancel", function () {
        holding = false;
        kickAuto();
      }, { passive: true });
      stage.addEventListener("touchend", function (e) {
        holding = false;
        kickAuto();
        if (startX === null) return;
        var dx = e.changedTouches[0].clientX - startX;
        var dy = e.changedTouches[0].clientY - startY;
        startX = null;
        if (Math.abs(dx) > 40 && Math.abs(dx) > Math.abs(dy)) {
          select((current + (dx < 0 ? 1 : count - 1)) % count);
        }
      }, { passive: true });

      select(0);
    });
  }

  // ---------------------------------------------------------------------------
  // Product page info (phones) — the Description / Specifications / Delivery /
  // Reviews accordion becomes a tab bar fixed to the bottom of the screen (same
  // dot-expand entrance as the gloves explorer) plus a bottom sheet that shows
  // one section at a time. The sections' content is moved into the sheet while
  // on a phone-sized screen and moved back for the desktop accordion.
  // ---------------------------------------------------------------------------

  function initProductInfo() {
    var acc = document.querySelector(".kayi-product__accordions");
    if (!acc) return;
    var items = Array.prototype.slice.call(acc.querySelectorAll(":scope > details"));
    if (items.length < 2) return;

    var mq = window.matchMedia("(max-width: 781px)");
    var labels = items.map(function (d) {
      var sum = d.querySelector(":scope > summary");
      return sum ? sum.textContent.trim() : "";
    });
    // Short names for the four-slot bar (the sheet uses the full names).
    var SHORT = { "description": "Details", "specifications": "Specs", "delivery & returns": "Delivery" };
    var shortLabels = labels.map(function (label) {
      return SHORT[label.toLowerCase()] || label.split(/\s+/)[0];
    });
    var id = "kayi-info-" + Math.random().toString(36).slice(2, 8);
    var current = 0;
    var lastTrigger = null;

    var sheet = document.createElement("div");
    sheet.className = "kayi-sheet kayi-sheet--info";
    sheet.innerHTML =
      '<div class="kayi-sheet__backdrop"></div>' +
      '<div class="kayi-sheet__panel" role="dialog" aria-modal="true" aria-labelledby="' + id + '-title">' +
        '<div class="kayi-sheet__head"><h2 class="kayi-sheet__title" id="' + id + '-title"></h2>' +
        '<button type="button" class="kayi-sheet__close" aria-label="Close">' + CLOSE_ICON + "</button></div>" +
        '<div class="kayi-sheet__tabs" role="tablist"></div>' +
        '<div class="kayi-sheet__body"></div>' +
      "</div>";
    var title = sheet.querySelector(".kayi-sheet__title");
    var tabRow = sheet.querySelector(".kayi-sheet__tabs");
    var body = sheet.querySelector(".kayi-sheet__body");
    var closeBtn = sheet.querySelector(".kayi-sheet__close");

    var panes = items.map(function (d, i) {
      var pane = document.createElement("div");
      pane.className = "kayi-sheet__pane";
      pane.id = id + "-pane-" + i;
      pane.setAttribute("role", "tabpanel");
      pane.hidden = true;
      body.appendChild(pane);
      return pane;
    });

    var sheetTabs = labels.map(function (label, i) {
      var t = document.createElement("button");
      t.type = "button";
      t.className = "kayi-sheet__tab";
      t.setAttribute("role", "tab");
      t.setAttribute("aria-controls", panes[i].id);
      t.textContent = label;
      t.addEventListener("click", function () { show(i); });
      tabRow.appendChild(t);
      return t;
    });

    // Bottom bar (reuses the explorer's bar styles).
    var dock = document.createElement("div");
    dock.className = "kayi-c-featbar kayi-c-featbar--info";
    var bar = document.createElement("div");
    bar.className = "kayi-c-stage__tabs";
    bar.setAttribute("aria-label", "Product information");
    bar.style.setProperty("--kc-tabs", items.length);
    labels.forEach(function (label, i) {
      var b = document.createElement("button");
      b.type = "button";
      b.className = "kayi-c-stage__tab";
      b.setAttribute("aria-haspopup", "dialog");
      b.innerHTML = "<small></small><span></span>";
      b.children[0].textContent = (i < 9 ? "0" : "") + (i + 1);
      b.children[1].textContent = shortLabels[i];
      b.setAttribute("aria-label", label);
      b.addEventListener("click", function () { open(i, b); });
      bar.appendChild(b);
    });
    dock.appendChild(bar);

    function show(i) {
      current = i;
      title.textContent = labels[i];
      panes.forEach(function (p, n) { p.hidden = n !== i; });
      sheetTabs.forEach(function (t, n) {
        t.classList.toggle("is-active", n === i);
        t.setAttribute("aria-selected", n === i ? "true" : "false");
        t.tabIndex = n === i ? 0 : -1;
      });
      body.scrollTop = 0;
      // Keep the active pill in view in the scrolling tab row.
      var t = sheetTabs[i];
      tabRow.scrollLeft = Math.max(0, t.offsetLeft - (tabRow.clientWidth - t.offsetWidth) / 2);
    }

    function isOpen() {
      return sheet.classList.contains("is-open");
    }

    function open(i, trigger) {
      lastTrigger = trigger || null;
      show(i);
      sheet.classList.add("is-open");
      document.documentElement.classList.add("kayi-sheet-open");
      updateDock();
      closeBtn.focus({ preventScroll: true });
    }

    function close() {
      if (!isOpen()) return;
      sheet.classList.remove("is-open");
      document.documentElement.classList.remove("kayi-sheet-open");
      // Coming back from the sheet the bar just reappears (no dot intro).
      dock.classList.add("is-quick");
      updateDock();
      if (lastTrigger) lastTrigger.focus({ preventScroll: true });
    }

    closeBtn.addEventListener("click", close);
    sheet.querySelector(".kayi-sheet__backdrop").addEventListener("click", close);
    sheet.addEventListener("keydown", function (e) {
      if (e.key === "Escape") {
        close();
      } else if ((e.key === "ArrowRight" || e.key === "ArrowLeft") && e.target.classList.contains("kayi-sheet__tab")) {
        var next = (current + (e.key === "ArrowRight" ? 1 : items.length - 1)) % items.length;
        show(next);
        sheetTabs[next].focus();
      }
    });

    // On phones a tap on a summary opens the sheet instead of the accordion.
    // Capture phase on <details>, so the smooth-accordion handler never runs.
    items.forEach(function (d, i) {
      d.addEventListener("click", function (e) {
        if (!mq.matches) return;
        var sum = e.target.closest("summary");
        if (!sum || sum.parentNode !== d) return;
        e.preventDefault();
        e.stopPropagation();
        open(i, sum);
      }, true);
    });

    function moveIn() {
      items.forEach(function (d, i) {
        Array.prototype.slice.call(d.childNodes).forEach(function (n) {
          if (n.nodeName !== "SUMMARY") panes[i].appendChild(n);
        });
        d.dataset.wasOpen = d.open ? "true" : "false";
        d.open = false;
      });
      acc.classList.add("is-sheet");
    }

    function moveOut() {
      close();
      panes.forEach(function (p, i) {
        while (p.firstChild) items[i].appendChild(p.firstChild);
        if (items[i].dataset.wasOpen === "true") items[i].open = true;
      });
      acc.classList.remove("is-sheet");
    }

    var inView = false;
    function updateDock() {
      // Hide instantly behind an opening sheet; otherwise play the exit.
      setDock(dock, inView && mq.matches && !isOpen(), isOpen() || !mq.matches);
    }

    function applyMode() {
      if (mq.matches) moveIn(); else moveOut();
      updateDock();
    }

    document.body.appendChild(dock);
    document.body.appendChild(sheet);

    if (mq.addEventListener) mq.addEventListener("change", applyMode);
    else mq.addListener(applyMode);
    applyMode();

    // Show the bar from the top of the page (shortly after load, so the dot
    // intro is seen) and tuck it away while the footer is on screen.
    var footer = document.querySelector("footer.wp-block-template-part") || document.querySelector("footer");
    var footerInView = false;
    var started = false;
    function refresh() {
      var wasInView = inView;
      inView = started && !footerInView;
      if (wasInView && !inView) dock.classList.remove("is-quick");
      updateDock();
    }
    setTimeout(function () {
      started = true;
      refresh();
    }, 600);
    if (footer && "IntersectionObserver" in window) {
      new IntersectionObserver(function (entries) {
        footerInView = entries[0].isIntersecting;
        refresh();
      }).observe(footer);
    }
  }

  // ---------------------------------------------------------------------------
  // Background video tiles — play (muted, looping) only while on screen, so
  // the file isn't downloaded until it's needed.
  // ---------------------------------------------------------------------------

  function initVideoTiles() {
    var videos = document.querySelectorAll(".kayi-c-tile.is-video video");
    if (!videos.length || reduceMotion || !("IntersectionObserver" in window)) return;

    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        var v = entry.target;
        if (entry.isIntersecting) {
          var p = v.play();
          if (p && p.catch) p.catch(function () {});
        } else if (!v.paused) {
          v.pause();
        }
      });
    }, { threshold: 0.25 });

    videos.forEach(function (v) {
      v.muted = true;
      v.loop = true;
      v.playsInline = true;
      io.observe(v);
    });
  }

  // ---------------------------------------------------------------------------
  // Product landing pages (.kayi-lp: patterns/head-guards.php, boxing-gloves.php,
  // focus-pads.php): scroll reveals, hero intro and tilt, sticky section nav,
  // hotspots, scroll-linked zoom / iris (--p), view switcher / size picker,
  // in-view videos and the padding cut-away.
  // ---------------------------------------------------------------------------

  function clamp01(n) {
    return n < 0 ? 0 : n > 1 ? 1 : n;
  }

  function initLanding() {
    var page = document.querySelector(".kayi-lp");
    if (!page) return;

    var animate = !reduceMotion && "IntersectionObserver" in window;
    var hero = page.querySelector(".kayi-lp-hero");
    var nav = page.querySelector(".kayi-lp-nav");

    page.querySelectorAll(".kayi-lp-stagger").forEach(function (group) {
      Array.prototype.forEach.call(group.children, function (child, i) {
        child.style.setProperty("--lp-d", i * 90 + "ms");
      });
    });

    // Hero title: each line rises out of its own mask.
    page.querySelectorAll(".kayi-lp-lines").forEach(function (h) {
      h.innerHTML = h.innerHTML.split(/<br\s*\/?>/i).map(function (line, i) {
        return '<span class="kayi-lp-line"><span class="kayi-lp-line__in" style="--lp-d:' +
          (140 + i * 130) + 'ms">' + line + "</span></span>";
      }).join("");
    });

    var revealSel = ".kayi-lp-rv, .kayi-lp-stagger > *, .kayi-lp-zones, .kayi-lp-iris, .kayi-lp-step, .kayi-lp-drill";
    if (animate) {
      page.classList.add("is-anim");
      var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (e) {
          if (!e.isIntersecting) return;
          e.target.classList.add("is-in");
          io.unobserve(e.target);
        });
      }, { rootMargin: "0px 0px -10% 0px" });
      page.querySelectorAll(revealSel).forEach(function (el) { io.observe(el); });
      if (hero) {
        requestAnimationFrame(function () {
          requestAnimationFrame(function () { hero.classList.add("is-ready"); });
        });
      }
    } else {
      page.querySelectorAll(revealSel).forEach(function (el) { el.classList.add("is-in"); });
      if (hero) hero.classList.add("is-ready");
    }

    // Hero product tilts towards the pointer (mouse only).
    var heroMedia = hero && hero.querySelector(".kayi-lp-hero__media");
    if (animate && heroMedia && window.matchMedia("(hover: hover) and (pointer: fine)").matches) {
      hero.addEventListener("pointermove", function (e) {
        var r = hero.getBoundingClientRect();
        var x = (e.clientX - r.left) / r.width - 0.5;
        var y = (e.clientY - r.top) / r.height - 0.5;
        heroMedia.style.setProperty("--lp-tx", (x * 16).toFixed(2) + "deg");
        heroMedia.style.setProperty("--lp-ty", (-y * 10).toFixed(2) + "deg");
      });
      hero.addEventListener("pointerleave", function () {
        heroMedia.style.setProperty("--lp-tx", "0deg");
        heroMedia.style.setProperty("--lp-ty", "0deg");
      });
    }

    // Section links scroll below the sticky nav (and skip the global
    // smooth-scroll handler, which only allows for the admin bar).
    function navOffset() {
      var bar = document.getElementById("wpadminbar");
      var barH = bar && getComputedStyle(bar).position === "fixed" ? bar.offsetHeight : 0;
      return (nav ? nav.offsetHeight : 0) + barH + 12;
    }

    page.addEventListener("click", function (e) {
      var a = e.target.closest('a[href^="#"]');
      if (!a) return;
      var target = document.getElementById(a.getAttribute("href").slice(1));
      if (!target) return;
      e.preventDefault();
      e.stopPropagation();
      window.scrollTo({
        top: target.getBoundingClientRect().top + window.pageYOffset - navOffset(),
        behavior: reduceMotion ? "auto" : "smooth"
      });
    });

    // Scroll-linked bits: nav progress + active link, hero drift, --p.
    var links = nav ? Array.prototype.slice.call(nav.querySelectorAll(".kayi-lp-nav__links a")) : [];
    var sections = links.map(function (a) {
      return document.getElementById(a.getAttribute("href").slice(1));
    });
    var scrubs = animate ? Array.prototype.slice.call(page.querySelectorAll(".kayi-lp-zoom, .kayi-lp-iris")) : [];
    var activeLink = null;
    var ticking = false;

    function onScroll() {
      ticking = false;
      var vh = window.innerHeight;
      var rect = page.getBoundingClientRect();

      if (nav) {
        nav.style.setProperty("--lp-progress", clamp01(-rect.top / Math.max(1, rect.height - vh)).toFixed(4));
      }

      var current = null;
      var line = navOffset() + vh * 0.25;
      sections.forEach(function (s, i) {
        if (s && s.getBoundingClientRect().top <= line) current = links[i];
      });
      if (current !== activeLink) {
        if (activeLink) activeLink.classList.remove("is-active");
        if (current) {
          current.classList.add("is-active");
          // Keep the active link visible in the phone's scrolling row.
          var row = current.parentNode;
          if (row.scrollWidth > row.clientWidth) {
            row.scrollTo({ left: current.offsetLeft - 16, behavior: reduceMotion ? "auto" : "smooth" });
          }
        }
        activeLink = current;
      }

      if (hero && animate) {
        var h = hero.getBoundingClientRect();
        hero.style.setProperty("--lp-hp", clamp01(-h.top / Math.max(1, h.height)).toFixed(4));
      }

      scrubs.forEach(function (el) {
        var r = el.getBoundingClientRect();
        el.style.setProperty("--p", clamp01((vh - r.top) / (vh * 0.85)).toFixed(4));
      });
    }

    function requestScroll() {
      if (!ticking) {
        ticking = true;
        requestAnimationFrame(onScroll);
      }
    }

    window.addEventListener("scroll", requestScroll, { passive: true });
    window.addEventListener("resize", requestScroll);
    onScroll();

    initLpZones(page, animate);
    initLpMedia(page);
    page.querySelectorAll(".kayi-lp-viewer").forEach(function (v) { initLpViewer(v, animate); });
  }

  // Landing page media: videos play (muted, looping) only while on screen, and
  // the padding cut-away replays each time it scrolls into view.
  function initLpMedia(page) {
    var videos = page.querySelectorAll("video");
    var layers = page.querySelectorAll(".kayi-c-layers");
    if (!("IntersectionObserver" in window)) return;

    videos.forEach(function (v) {
      v.muted = true;
      v.loop = true;
      v.playsInline = true;
      v.removeAttribute("controls");
      if (reduceMotion) v.controls = true;
    });

    if (!reduceMotion && videos.length) {
      var vio = new IntersectionObserver(function (entries) {
        entries.forEach(function (e) {
          var v = e.target;
          if (e.isIntersecting) {
            var p = v.play();
            if (p && p.catch) p.catch(function () {});
          } else if (!v.paused) {
            v.pause();
          }
        });
      }, { threshold: 0.4 });
      videos.forEach(function (v) { vio.observe(v); });
    }

    if (layers.length) {
      var lio = new IntersectionObserver(function (entries) {
        entries.forEach(function (e) {
          e.target.classList.remove("is-playing");
          if (e.isIntersecting) {
            void e.target.offsetWidth;
            e.target.classList.add("is-playing");
          }
        });
      }, { threshold: 0.35 });
      layers.forEach(function (l) { lio.observe(l); });
    }
  }

  // Protection: numbered hotspots on the guard <-> the three zone columns.
  // Cycles through them while in view until the visitor picks one.
  function initLpZones(page, animate) {
    var spots = Array.prototype.slice.call(page.querySelectorAll(".kayi-lp-spot"));
    var zones = Array.prototype.slice.call(page.querySelectorAll(".kayi-lp-zone"));
    var stage = page.querySelector(".kayi-lp-zones");
    if (!spots.length || !zones.length) return;

    var timer = null;
    var current = 0;

    function set(i) {
      current = i;
      spots.forEach(function (s, j) {
        s.classList.toggle("is-active", j === i);
        s.setAttribute("aria-pressed", j === i ? "true" : "false");
      });
      zones.forEach(function (z, j) { z.classList.toggle("is-active", j === i); });
    }

    function stop() {
      clearInterval(timer);
      timer = null;
      stage = null;
    }

    spots.forEach(function (s, i) {
      s.addEventListener("click", function () { stop(); set(i); });
      s.addEventListener("mouseenter", function () { stop(); set(i); });
    });
    zones.forEach(function (z, i) {
      if (!spots[i]) return;
      z.addEventListener("mouseenter", function () { stop(); set(i); });
    });

    set(0);
    if (!animate || !stage) return;

    new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (!stage) return;
        if (e.isIntersecting && !timer) {
          timer = setInterval(function () { set((current + 1) % spots.length); }, 2800);
        } else if (!e.isIntersecting && timer) {
          clearInterval(timer);
          timer = null;
        }
      });
    }, { threshold: 0.5 }).observe(stage);
  }

  // A closer look: stacks the views, adds a pill switcher with a sliding gold
  // marker, swipe on touch, arrow keys, and a slow turntable while in view.
  function initLpViewer(viewer, animate) {
    var views = Array.prototype.slice.call(viewer.querySelectorAll(".kayi-lp-view"));
    if (views.length < 2) return;

    var tabs = document.createElement("div");
    tabs.className = "kayi-lp-tabs";
    tabs.setAttribute("role", "group");
    tabs.setAttribute("aria-label", "Choose a view");
    var marker = document.createElement("span");
    marker.className = "kayi-lp-tabs__ind";
    marker.setAttribute("aria-hidden", "true");
    tabs.appendChild(marker);

    var buttons = views.map(function (v, i) {
      var b = document.createElement("button");
      b.type = "button";
      b.textContent = text(v, ".kayi-lp-view__label") || "View " + (i + 1);
      b.addEventListener("click", function () { stopAuto(); show(i); });
      tabs.appendChild(b);
      return b;
    });

    viewer.parentNode.insertBefore(tabs, viewer.nextSibling);

    // Size picker: no turntable; a weight scale fills as heavier sizes are
    // picked, and it opens on the view marked .is-default.
    var picker = viewer.classList.contains("is-picker");
    var scale = null;
    if (picker) {
      scale = document.createElement("div");
      scale.className = "kayi-lp-scale";
      scale.setAttribute("aria-hidden", "true");
      scale.appendChild(document.createElement("span"));
      tabs.parentNode.insertBefore(scale, tabs.nextSibling);
    }
    viewer.classList.add("is-ready");

    var current = -1;
    var timer = null;
    var stopped = !animate || picker;

    function placeMarker() {
      var b = buttons[current];
      if (!b) return;
      marker.style.width = b.offsetWidth + "px";
      marker.style.transform = "translate(" + b.offsetLeft + "px, " + (b.offsetTop - 5) + "px)";
    }

    function show(i) {
      i = (i + views.length) % views.length;
      if (i === current) return;
      current = i;
      views.forEach(function (v, j) {
        v.classList.toggle("is-active", j === i);
        v.classList.toggle("is-before", j < i);
        v.setAttribute("aria-hidden", j === i ? "false" : "true");
      });
      buttons.forEach(function (b, j) { b.setAttribute("aria-pressed", j === i ? "true" : "false"); });
      var k = (i / Math.max(1, views.length - 1)).toFixed(3);
      viewer.style.setProperty("--lp-k", k);
      if (scale) scale.style.setProperty("--lp-k", k);
      placeMarker();
    }

    function stopAuto() {
      stopped = true;
      clearInterval(timer);
      timer = null;
    }

    var start = views.findIndex(function (v) { return v.classList.contains("is-default"); });
    show(start > 0 ? start : 0);
    window.addEventListener("resize", placeMarker);

    tabs.addEventListener("keydown", function (e) {
      if (e.key !== "ArrowRight" && e.key !== "ArrowLeft") return;
      e.preventDefault();
      stopAuto();
      show(current + (e.key === "ArrowRight" ? 1 : -1));
      buttons[current].focus();
    });

    var startX = null;
    viewer.addEventListener("pointerdown", function (e) { startX = e.clientX; });
    viewer.addEventListener("pointerup", function (e) {
      if (startX === null) return;
      var dx = e.clientX - startX;
      startX = null;
      if (Math.abs(dx) > 40) {
        stopAuto();
        show(current + (dx < 0 ? 1 : -1));
      }
    });

    if (stopped) return;
    new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (stopped) return;
        if (e.isIntersecting && !timer) {
          timer = setInterval(function () {
            if (!document.hidden) show(current + 1);
          }, 3600);
        } else if (!e.isIntersecting && timer) {
          clearInterval(timer);
          timer = null;
        }
      });
    }, { threshold: 0.6 }).observe(viewer);
  }

  // ---------------------------------------------------------------------------
  // Newsletter — not wired to a mailing service yet; validate and say so.
  // ---------------------------------------------------------------------------

  function initNewsletter() {
    document.querySelectorAll(".kayi-c-news__form").forEach(function (form) {
      var input = form.querySelector("input[type=email]");
      var msg = form.querySelector(".kayi-c-news__msg");
      form.addEventListener("submit", function (e) {
        e.preventDefault();
        if (!msg) return;
        msg.hidden = false;
        msg.textContent = input && input.checkValidity() && input.value
          ? "Thanks! Newsletter sign-up will be connected before launch."
          : "Please enter a valid email address.";
      });
    });
  }

  // ---------------------------------------------------------------------------
  // Trade bulk order form ([kayi_trade_order], inc/trade.php): units, tier,
  // row prices and subtotal without VAT as quantities change. An estimate;
  // the basket works out the real totals.
  // ---------------------------------------------------------------------------

  function initTradeOrder() {
    var form = document.querySelector(".kayi-tr-order");
    if (!form) return;

    var tiers = [];
    try { tiers = JSON.parse(form.dataset.tiers || "[]"); } catch (e) {}
    var min = parseInt(form.dataset.min, 10) || 0;
    var basket = parseInt(form.dataset.basket, 10) || 0;
    var symbol = form.dataset.currency || "£";
    var inputs = Array.prototype.slice.call(form.querySelectorAll(".kayi-tr-qty input:not([disabled])"));
    var rows = Array.prototype.slice.call(form.querySelectorAll(".kayi-tr-item"));
    var out = {
      units: form.querySelector("[data-kayi-units]"),
      tier: form.querySelector("[data-kayi-tier]"),
      total: form.querySelector("[data-kayi-total]"),
      msg: form.querySelector("[data-kayi-msg]")
    };
    var submit = form.querySelector(".kayi-tr-submit");

    function offFor(units) {
      var off = tiers.length ? tiers[0].off : 0;
      tiers.forEach(function (t) { if (units >= t.min) off = t.off; });
      return off;
    }

    function round2(n) { return Math.round(n * 100) / 100; }

    function money(n) {
      return symbol + n.toLocaleString("en-GB", { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    // Same rule as kayi_trade_price(): RRP less the tier, unless the sale
    // price is lower; then without VAT.
    function priceEx(input, off) {
      var rrp = parseFloat(input.dataset.rrp) || 0;
      var sale = parseFloat(input.dataset.sale);
      var vat = parseFloat(input.dataset.vat) || 0;
      var inc = round2(rrp * (100 - off) / 100);
      if (sale > 0 && sale < inc) inc = sale;
      return round2(inc / (1 + vat));
    }

    function qty(input) {
      var q = parseInt(input.value, 10);
      return q > 0 ? q : 0;
    }

    function update() {
      var units = 0;
      inputs.forEach(function (i) {
        units += qty(i);
        i.parentNode.classList.toggle("is-set", qty(i) > 0);
      });
      var all = units + basket;
      var off = offFor(all);
      var total = 0;
      inputs.forEach(function (i) { total += priceEx(i, off) * qty(i); });

      rows.forEach(function (row) {
        var now = row.querySelector(".kayi-trade-price__now");
        var prices = Array.prototype.map.call(row.querySelectorAll(".kayi-tr-qty input"), function (i) {
          return priceEx(i, off);
        }).filter(function (p) { return p > 0; });
        if (!now || !prices.length) return;
        var lo = Math.min.apply(null, prices);
        var hi = Math.max.apply(null, prices);
        now.textContent = lo === hi ? money(lo) : money(lo) + " – " + money(hi);
      });

      out.units.textContent = units;
      out.tier.textContent = off + "% off";
      out.total.textContent = money(total);
      submit.disabled = units === 0 || form.hasAttribute("data-preview");

      var next = tiers.filter(function (t) { return t.min > all; })[0];
      var text;
      if (!units) {
        text = basket ? basket + " unit" + (basket === 1 ? "" : "s") + " already in your basket count too." : "Enter quantities for each size you need.";
      } else if (min && all < min) {
        text = "Add " + (min - all) + " more to reach the " + min + "-unit minimum.";
      } else if (next) {
        text = "Add " + (next.min - all) + " more for " + next.off + "% off everything.";
      } else {
        text = "You’re on our best trade price.";
      }
      out.msg.textContent = text;
    }

    form.addEventListener("input", update);
    update();
  }

  document.addEventListener("DOMContentLoaded", function () {
    initTradeOrder();
    initMarquee();
    initShelves();
    initExplorers();
    initZooms();
    initVideoTiles();
    initProductInfo();
    initNewsletter();
    initLanding();
    // Landing-page view switchers reused outside a landing page (homepage
    // head guards section).
    document.querySelectorAll(".kayi-c-look .kayi-lp-viewer").forEach(function (v) {
      initLpViewer(v, !reduceMotion && "IntersectionObserver" in window);
    });
  });
})();
