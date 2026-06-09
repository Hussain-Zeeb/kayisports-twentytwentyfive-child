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

    if (element.classList.contains("js-fade-in-up")) {
      return { from: { autoAlpha: 0, y: 24 }, to: { autoAlpha: 1, y: 0, duration, delay, ease: defaults.ease } };
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
    const targets = document.querySelectorAll(
      ".js-fade-in, .js-fade-in-up, .js-fade-in-left, .js-fade-in-right, [data-animate]"
    );

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
  // Each .js-pinned-slider is pinned for (numSlides - 1) × 100vh of scroll.
  // The .js-pinned-slider__track translates horizontally by the same distance.
  // Add/duplicate .js-pinned-slider__slide blocks in the editor — the JS
  // automatically adapts the pin duration and track width.
  // ---------------------------------------------------------------------------

  function initPinnedScrollSlider() {
    const sliders = document.querySelectorAll(".js-pinned-slider");
    if (!sliders.length) return;

    const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

    sliders.forEach(function (slider) {
      const track = slider.querySelector(".js-pinned-slider__track");
      const slides = slider.querySelectorAll(".js-pinned-slider__slide");
      const dotsContainer = slider.querySelector(".js-pinned-slider__dots");

      if (!track || slides.length < 2) return;

      const numSlides = slides.length;

      // --- Build progress dots ---
      if (dotsContainer) {
        dotsContainer.innerHTML = "";
        slides.forEach(function (_, i) {
          const dot = document.createElement("span");
          dot.className = "js-pinned-slider__dot" + (i === 0 ? " is-active" : "");
          dot.setAttribute("aria-hidden", "true");
          dotsContainer.appendChild(dot);
        });
      }

      const dots = dotsContainer ? dotsContainer.querySelectorAll(".js-pinned-slider__dot") : [];

      function updateDots(activeIndex) {
        dots.forEach(function (dot, i) {
          dot.classList.toggle("is-active", i === activeIndex);
        });
      }

      // --- Reduced-motion fallback: simple fade between slides ---
      if (reduceMotion) {
        let current = 0;

        ScrollTrigger.create({
          trigger: slider,
          start: "top top",
          end: function () {
            return "+=" + (numSlides - 1) * window.innerHeight;
          },
          pin: true,
          scrub: false,
          onUpdate: function (self) {
            const index = Math.round(self.progress * (numSlides - 1));
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

      // --- Full horizontal scrub animation with fade + blur transitions ---

      // Force the track to span all slides side-by-side
      gsap.set(track, {
        width: function () {
          return numSlides * window.innerWidth;
        },
      });

      // Set initial state: slides 1+ start off-screen with blur and opacity 0
      slides.forEach(function (slide, i) {
        if (i > 0) {
          gsap.set(slide, { autoAlpha: 0, filter: "blur(8px)" });
        }
      });

      const tween = gsap.to(track, {
        x: function () {
          return -(numSlides - 1) * window.innerWidth;
        },
        ease: "none",
        scrollTrigger: {
          trigger: slider,
          start: "top top",
          end: function () {
            return "+=" + (numSlides - 1) * window.innerHeight;
          },
          pin: true,
          scrub: 1,
          anticipatePin: 1,
          invalidateOnRefresh: true,
          onUpdate: function (self) {
            const rawIndex = self.progress * (numSlides - 1);
            const activeIndex = Math.round(rawIndex);
            const slideProgress = rawIndex - Math.floor(rawIndex);

            // Update progress dots
            updateDots(activeIndex);

            // Smooth fade + blur for incoming slides only
            slides.forEach(function (slide, i) {
              let opacity, blur;

              if (i <= Math.floor(rawIndex)) {
                // Current and all previous slides: fully visible, no blur
                opacity = 1;
                blur = 0;
              } else if (i === Math.ceil(rawIndex)) {
                // Next incoming slide only: fade in and blur in
                opacity = slideProgress;
                blur = 8 - slideProgress * 8;
              } else {
                // Future slides: hidden with blur
                opacity = 0;
                blur = 8;
              }

              gsap.set(slide, {
                autoAlpha: opacity,
                filter: "blur(" + blur + "px)",
              });
            });
          },
        },
      });

      // Recalculate sizes on resize and orientation change
      ScrollTrigger.addEventListener("refreshInit", function () {
        gsap.set(track, { width: numSlides * window.innerWidth });
        gsap.set(tween, {
          x: -(numSlides - 1) * window.innerWidth,
        });
      });

      // Handle mobile orientation changes
      window.addEventListener("orientationchange", function () {
        ScrollTrigger.getAll().forEach(function (trigger) {
          trigger.refresh();
        });
      });
    });
  }

  window.DZAnimations = {
    initHomepageLoader,
    initFadeInAnimations,
    initPinnedScrollSlider,
    animateIn,
  };

  document.addEventListener("DOMContentLoaded", function () {
    initHomepageLoader();
    initFadeInAnimations();
    initPinnedScrollSlider();
  });
})();
