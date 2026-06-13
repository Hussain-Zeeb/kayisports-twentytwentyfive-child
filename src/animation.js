import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

(function () {
  "use strict";
  gsap.registerPlugin(ScrollTrigger);

  const defaults = {
    duration: 0.8,
    ease: "power2.out",
    threshold: 0.15,
  };

  function removeLoaderNow(loader) {
    loader.classList.add("is-hidden");
    loader.remove();
    document.documentElement.classList.remove("dz-loader-pending");
  }

  function initHomepageLoader() {
    const loader = document.querySelector("#dz-loader");
    if (!loader) {
      return;
    }

    const logo = loader.querySelector(".dz-loader__logo");
    const orbit = loader.querySelector(".dz-loader__orbit");
    const loaderWord = loader.querySelector(".dz-loader__word");

    try {
      const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

      if (reduceMotion || !logo) {
        removeLoaderNow(loader);
        return;
      }

      const tl = gsap.timeline({
        onComplete: () => {
          removeLoaderNow(loader);
        },
      });

      const logoIntroDuration = 0.7;
      const logoExitDuration = 0.8;
      const loaderFadeDuration = 0.35;
      const rotatingWords = ["KayiSports.", "Boxing.", "Sports Gear.", "Coaching."];

      tl.fromTo(
        logo,
        { autoAlpha: 0, y: 10, scale: 0.25 },
        { autoAlpha: 1, y: 0, scale: 1, duration: logoIntroDuration, ease: "back.out(1.7)" }
      );

      if (orbit) {
        tl.fromTo(orbit, { autoAlpha: 0, scale: 0.85 }, { autoAlpha: 1, scale: 1, duration: 0.35, ease: "power2.out" }, "<0.05");
      }

      if (loaderWord) {
        rotatingWords.forEach((word) => {
          tl.call(() => {
            loaderWord.textContent = word;
            loaderWord.classList.toggle("is-emphasis", word === "Coaching");
          })
            .fromTo(loaderWord, { autoAlpha: 0, y: 8 }, { autoAlpha: 1, y: 0, duration: 0.18, ease: "power2.out" })
            .to(loaderWord, { autoAlpha: 1, y: 0, duration: 0.62 })
            .to(loaderWord, { autoAlpha: 0, y: -8, duration: 0.2, ease: "power1.in" });
        });
      } else {
        tl.to(logo, { autoAlpha: 1, duration: 4.0 });
      }

      if (orbit) {
        tl.to(orbit, { autoAlpha: 0, duration: 0.2, ease: "power1.in" }, "<");
      }

      tl.to(logo, { autoAlpha: 0, scale: 0, duration: logoExitDuration, ease: "elastic.in(1, 0.55)" }).to(loader, {
        autoAlpha: 0,
        duration: loaderFadeDuration,
        ease: "power2.inOut",
      });
    } catch (error) {
      removeLoaderNow(loader);
    }
  }

  function getAnimationConfig(element) {
    const duration = parseFloat(element.dataset.animDuration || defaults.duration);
    const delay = parseFloat(element.dataset.animDelay || 0);

    const typeFromData = (element.dataset.animate || "").trim();
    if (typeFromData === "fade-up") {
      return { from: { autoAlpha: 0, y: 24 }, to: { autoAlpha: 1, y: 0, duration, delay, ease: defaults.ease } };
    }

    if (typeFromData === "fade-left") {
      return { from: { autoAlpha: 0, x: 24 }, to: { autoAlpha: 1, x: 0, duration, delay, ease: defaults.ease } };
    }

    if (typeFromData === "fade-right") {
      return { from: { autoAlpha: 0, x: -24 }, to: { autoAlpha: 1, x: 0, duration, delay, ease: defaults.ease } };
    }

    if (typeFromData === "fade-down") {
      return { from: { autoAlpha: 0, y: -24 }, to: { autoAlpha: 1, y: 0, duration, delay, ease: defaults.ease } };
    }

    if (typeFromData === "reveal-wall") {
      return {
        from: { y: 56, clipPath: "inset(110% 0 -20% 0)", autoAlpha: 1 },
        to: { y: 0, clipPath: "inset(0% 0 0% 0)", duration: duration || 0.75, delay, ease: "power3.out" },
      };
    }

    if (element.classList.contains("js-reveal-wall")) {
      return {
        from: { y: 56, clipPath: "inset(110% 0 -20% 0)", autoAlpha: 1 },
        to: { y: 0, clipPath: "inset(0% 0 0% 0)", duration: duration || 0.75, delay, ease: "power3.out" },
      };
    }

    if (element.classList.contains("js-slide-image")) {
      return { from: { autoAlpha: 0 }, to: { autoAlpha: 1, duration: duration || 1.0, delay, ease: "power2.out" } };
    }

    if (element.classList.contains("js-fade-in-up")) {
      return { from: { autoAlpha: 0, y: 24 }, to: { autoAlpha: 1, y: 0, duration, delay, ease: defaults.ease } };
    }

    if (element.classList.contains("js-fade-in-down")) {
      return { from: { autoAlpha: 0, y: -24 }, to: { autoAlpha: 1, y: 0, duration, delay, ease: defaults.ease } };
    }

    if (element.classList.contains("js-fade-in-left")) {
      return { from: { autoAlpha: 0, x: 24 }, to: { autoAlpha: 1, x: 0, duration, delay, ease: defaults.ease } };
    }

    if (element.classList.contains("js-fade-in-right")) {
      return { from: { autoAlpha: 0, x: -24 }, to: { autoAlpha: 1, x: 0, duration, delay, ease: defaults.ease } };
    }

    return { from: { autoAlpha: 0 }, to: { autoAlpha: 1, duration, delay, ease: defaults.ease } };
  }

  function hideBeforeAnimate(element) {
    const config = getAnimationConfig(element);
    gsap.set(element, config.from);
  }

  function animateIn(element) {
    const config = getAnimationConfig(element);
    gsap.to(element, config.to);
  }

  function initFadeInAnimations() {
    // Elements with js-scrub are handled by ScrollTrigger in initScrubAnimations
    const targets = Array.from(document.querySelectorAll(
      ".js-fade-in, .js-fade-in-up, .js-fade-in-down, .js-fade-in-left, .js-fade-in-right, .js-reveal-wall, .js-slide-image, [data-animate]"
    )).filter(function (el) {
      return !el.classList.contains("js-scrub") && !el.classList.contains("js-reveal-wall");
    });

    if (!targets.length) {
      return;
    }

    targets.forEach(hideBeforeAnimate);

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) {
            return;
          }

          animateIn(entry.target);

          if (entry.target.dataset.animOnce !== "false") {
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: defaults.threshold }
    );

    targets.forEach((target) => observer.observe(target));
  }

  // ---------------------------------------------------------------------------
  // Pinned Scroll Slider
  // ---------------------------------------------------------------------------
  // Desktop (>= 768px): pinned horizontal scroll with fade+blur transitions.
  // Mobile (< 768px):   full-height tap carousel with prev/next chevron buttons.
  // ---------------------------------------------------------------------------

  var MOBILE_BP = 768;

  function initPinnedScrollSlider() {
    var sliders = document.querySelectorAll(".js-pinned-slider");
    if (!sliders.length) return;

    var reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
    var isMobile = window.innerWidth < MOBILE_BP;

    // Pre-hide content on all slides so first slide also reveals on entry
    sliders.forEach(function (slider) {
      var slides = slider.querySelectorAll(".js-pinned-slider__slide");
      slides.forEach(function (slide) {
        hideSlideContent(slide);
      });
    });

    sliders.forEach(function (slider) {
      var track = slider.querySelector(".js-pinned-slider__track");
      var slides = slider.querySelectorAll(".js-pinned-slider__slide");
      var dotsContainer = slider.querySelector(".js-pinned-slider__dots");

      if (!track || slides.length < 2) return;

      var numSlides = slides.length;

      if (isMobile) {
        initMobileCarousel(slider, track, slides, dotsContainer, numSlides);
      } else {
        initDesktopSlider(slider, track, slides, dotsContainer, numSlides, reduceMotion);
      }
    });
  }


  // ---------------------------------------------------------------------------
  // Slide content reveal — heading/paragraph/button rise up from a clip wall
  // ---------------------------------------------------------------------------

  function getSlideContentTargets(slide) {
    return Array.prototype.slice.call(
      slide.querySelectorAll(".wp-block-heading, .wp-block-paragraph, .wp-block-buttons")
    );
  }

  function hideSlideContent(slide) {
    var targets = getSlideContentTargets(slide);
    if (!targets.length) return;
    gsap.set(targets, { y: 56, clipPath: "inset(110% 0 -20% 0)", autoAlpha: 1 });
  }

  function revealSlideContent(slide, delay) {
    var targets = getSlideContentTargets(slide);
    if (!targets.length) return;
    gsap.to(targets, {
      y: 0,
      clipPath: "inset(0% 0 0% 0)",
      duration: 0.75,
      ease: "power3.out",
      stagger: 0.12,
      delay: delay || 0,
    });
  }

  // ---------------------------------------------------------------------------
  // Mobile carousel — no pinning, prev/next chevron buttons, full-height slides
  // ---------------------------------------------------------------------------

  function initMobileCarousel(slider, track, slides, dotsContainer, numSlides) {
    var current = 0;

    // Stack slides vertically, show only the active one
    gsap.set(track, { width: "100%", x: 0 });
    slides.forEach(function (slide, i) {
      gsap.set(slide, {
        position: i === 0 ? "relative" : "absolute",
        top: 0,
        left: 0,
        autoAlpha: i === 0 ? 1 : 0,
        filter: "blur(0px)",
        zIndex: i === 0 ? 1 : 0,
      });
    });

    // Make outer wrapper the positioning context for absolute slides
    slider.style.position = "relative";
    slider.style.height = "100vh";
    slider.style.overflow = "hidden";

    // Reveal first slide content on load
    revealSlideContent(slides[0], 0.2);

    // Build prev/next buttons in the dots container
    if (dotsContainer) {
      dotsContainer.innerHTML = "";
      dotsContainer.classList.add("is-mobile-nav");

      var prevBtn = document.createElement("button");
      prevBtn.className = "js-pinned-slider__nav-btn js-pinned-slider__nav-btn--prev";
      prevBtn.setAttribute("aria-label", "Previous slide");
      prevBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="20" height="20"><polyline points="15 18 9 12 15 6"></polyline></svg>';

      var dotsWrap = document.createElement("div");
      dotsWrap.className = "js-pinned-slider__dots-inner";
      slides.forEach(function (_, i) {
        var dot = document.createElement("span");
        dot.className = "js-pinned-slider__dot" + (i === 0 ? " is-active" : "");
        dot.setAttribute("aria-hidden", "true");
        dotsWrap.appendChild(dot);
      });

      var nextBtn = document.createElement("button");
      nextBtn.className = "js-pinned-slider__nav-btn js-pinned-slider__nav-btn--next";
      nextBtn.setAttribute("aria-label", "Next slide");
      nextBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="20" height="20"><polyline points="9 18 15 12 9 6"></polyline></svg>';

      dotsContainer.appendChild(prevBtn);
      dotsContainer.appendChild(dotsWrap);
      dotsContainer.appendChild(nextBtn);

      // Attach listeners here while prevBtn/nextBtn are in scope
      prevBtn.addEventListener("click", function () { goTo(current - 1); });
      nextBtn.addEventListener("click", function () { goTo(current + 1); });
    }

    // Query dots AFTER they have been injected into the DOM
    var dots = dotsContainer ? dotsContainer.querySelectorAll(".js-pinned-slider__dot") : [];

    function updateDots(index) {
      dots.forEach(function (dot, i) {
        dot.classList.toggle("is-active", i === index);
      });
    }

    function goTo(index) {
      if (index < 0 || index >= numSlides || index === current) return;

      var outgoing = slides[current];
      var incoming = slides[index];

      gsap.set(incoming, { autoAlpha: 0, filter: "blur(8px)", position: "absolute", top: 0, left: 0, zIndex: 2 });
      gsap.set(outgoing, { zIndex: 1 });

      gsap.to(incoming, {
        autoAlpha: 1,
        filter: "blur(0px)",
        duration: 0.5,
        ease: "power2.out",
        onComplete: function () {
          gsap.set(outgoing, { autoAlpha: 0, position: "absolute", zIndex: 0 });
          gsap.set(incoming, { position: "relative", zIndex: 1 });
          hideSlideContent(outgoing);
        },
      });

      // Reveal incoming slide content mid-transition
      revealSlideContent(incoming, 0.25);

      current = index;
      updateDots(current);
    }

    // Touch swipe support
    var touchStartX = 0;
    slider.addEventListener("touchstart", function (e) { touchStartX = e.touches[0].clientX; }, { passive: true });
    slider.addEventListener("touchend", function (e) {
      var diff = touchStartX - e.changedTouches[0].clientX;
      if (Math.abs(diff) > 50) {
        goTo(diff > 0 ? current + 1 : current - 1);
      }
    }, { passive: true });
  }

  // ---------------------------------------------------------------------------
  // Desktop pinned horizontal scroll slider
  // ---------------------------------------------------------------------------

  function initDesktopSlider(slider, track, slides, dotsContainer, numSlides, reduceMotion) {
    // --- Build progress dots ---
    if (dotsContainer) {
      dotsContainer.innerHTML = "";
      slides.forEach(function (_, i) {
        var dot = document.createElement("span");
        dot.className = "js-pinned-slider__dot" + (i === 0 ? " is-active" : "");
        dot.setAttribute("aria-hidden", "true");
        dotsContainer.appendChild(dot);
      });
    }

    var dots = dotsContainer ? dotsContainer.querySelectorAll(".js-pinned-slider__dot") : [];

    function updateDots(activeIndex) {
      dots.forEach(function (dot, i) {
        dot.classList.toggle("is-active", i === activeIndex);
      });
    }

    // --- Reduced-motion fallback ---
    if (reduceMotion) {
      var current = 0;
      ScrollTrigger.create({
        trigger: slider,
        start: "top top",
        end: function () { return "+=" + (numSlides - 1) * window.innerHeight; },
        pin: true,
        scrub: false,
        onUpdate: function (self) {
          var index = Math.round(self.progress * (numSlides - 1));
          if (index !== current) {
            gsap.set(slides[current], { autoAlpha: 0 });
            gsap.set(slides[index], { autoAlpha: 1 });
            current = index;
            updateDots(current);
          }
        },
        invalidateOnRefresh: true,
      });
      return;
    }

    // --- Full horizontal scrub with fade + blur ---
    gsap.set(track, {
      width: function () { return numSlides * window.innerWidth; },
    });

    slides.forEach(function (slide, i) {
      if (i > 0) gsap.set(slide, { autoAlpha: 0, filter: "blur(8px)" });
    });

    // Track which slides have had their content revealed
    var revealedSlides = [];

    var tween = gsap.to(track, {
      x: function () { return -(numSlides - 1) * window.innerWidth; },
      ease: "none",
      scrollTrigger: {
        trigger: slider,
        start: "top top",
        end: function () { return "+=" + (numSlides - 1) * window.innerHeight; },
        pin: true,
        scrub: 1,
        anticipatePin: 1,
        invalidateOnRefresh: true,
        onEnter: function () {
          // Reveal first slide content when the section pins into view
          if (!revealedSlides[0]) {
            revealedSlides[0] = true;
            revealSlideContent(slides[0], 0.1);
          }
        },
        onUpdate: function (self) {
          var rawIndex = self.progress * (numSlides - 1);
          var floorIndex = Math.floor(rawIndex);
          var slideProgress = rawIndex - floorIndex;
          updateDots(Math.round(rawIndex));

          slides.forEach(function (slide, i) {
            var opacity, blur;
            if (i <= floorIndex) {
              opacity = 1; blur = 0;
            } else if (i === Math.ceil(rawIndex)) {
              opacity = slideProgress; blur = 8 - slideProgress * 8;
            } else {
              opacity = 0; blur = 8;
            }
            gsap.set(slide, { autoAlpha: opacity, filter: "blur(" + blur + "px)" });

            // Reveal content when slide is more than halfway in
            var incomingIndex = floorIndex + 1;
            if (incomingIndex < numSlides && !revealedSlides[incomingIndex] && slideProgress >= 0.5) {
              revealedSlides[incomingIndex] = true;
              revealSlideContent(slides[incomingIndex], 0);
            }
            // Reset content if user scrolls back before threshold
            if (incomingIndex < numSlides && revealedSlides[incomingIndex] && slideProgress < 0.1 && rawIndex < incomingIndex) {
              revealedSlides[incomingIndex] = false;
              hideSlideContent(slides[incomingIndex]);
            }
          });
        },
      },
    });

    ScrollTrigger.addEventListener("refreshInit", function () {
      gsap.set(track, { width: numSlides * window.innerWidth });
      gsap.set(tween, { x: -(numSlides - 1) * window.innerWidth });
    });

    window.addEventListener("orientationchange", function () {
      ScrollTrigger.getAll().forEach(function (t) { t.refresh(); });
    });
  }

  // ---------------------------------------------------------------------------
  // Reveal-wall animations — clip-path wipe that reverses on scroll back up.
  // ---------------------------------------------------------------------------

  function initRevealWallAnimations() {
    var targets = document.querySelectorAll(".js-reveal-wall");
    if (!targets.length) return;

    targets.forEach(function (el) {
      var duration = parseFloat(el.dataset.animDuration || 0.75);
      var delay = parseFloat(el.dataset.animDelay || 0);

      gsap.set(el, { y: 56, clipPath: "inset(110% 0 -20% 0)", autoAlpha: 1 });

      var tween = gsap.fromTo(el,
        { y: 56, clipPath: "inset(110% 0 -20% 0)" },
        {
          y: 0,
          clipPath: "inset(0% 0 0% 0)",
          duration: duration,
          delay: delay,
          ease: "power3.out",
          paused: true,
        }
      );

      ScrollTrigger.create({
        trigger: el,
        start: "top 85%",
        toggleActions: "play reverse play reverse",
        invalidateOnRefresh: true,
        animation: tween,
      });
    });
  }

  // ---------------------------------------------------------------------------
  // Scrub animations — opacity/transform tied directly to scroll progress.
  // Add js-scrub alongside any fade class: e.g. "js-fade-in js-scrub"
  // or standalone on any element. Works with all existing animation types.
  // ---------------------------------------------------------------------------

  function initScrubAnimations() {
    var targets = document.querySelectorAll(".js-scrub");
    if (!targets.length) return;

    targets.forEach(function (el) {
      var config = getAnimationConfig(el);
      // Strip duration/delay/ease — ScrollTrigger scrub controls timing
      var toVars = Object.assign({}, config.to);
      delete toVars.duration;
      delete toVars.delay;
      delete toVars.ease;
      delete toVars.stagger;

      gsap.set(el, config.from);

      gsap.fromTo(el, config.from, Object.assign(toVars, {
        ease: "none",
        scrollTrigger: {
          trigger: el,
          start: "top 90%",
          end: "top 30%",
          scrub: 0.5,
          invalidateOnRefresh: true,
          markers:false,
        },
      }));
    });
  }

  window.DZAnimations = {
    initHomepageLoader,
    initFadeInAnimations,
    initRevealWallAnimations,
    initScrubAnimations,
    initPinnedScrollSlider,
    animateIn,
  };

  document.addEventListener("DOMContentLoaded", function () {
    initHomepageLoader();
    initFadeInAnimations();
    initPinnedScrollSlider();
    ScrollTrigger.refresh();
    initRevealWallAnimations();
    initScrubAnimations();
  });
})();
