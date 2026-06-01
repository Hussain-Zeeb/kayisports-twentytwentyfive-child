import { gsap } from "gsap";

(function () {
  "use strict";
  const defaults = {
    duration: 0.8,
    ease: "power2.out",
    threshold: 0.15,
  };

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

  window.DZAnimations = {
    initFadeInAnimations,
    animateIn,
  };

  document.addEventListener("DOMContentLoaded", initFadeInAnimations);
})();
