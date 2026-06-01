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

  function initFirstVisitLoader() {
    const loader = document.querySelector("#dz-loader");
    if (!loader) {
      return;
    }

    const logo = loader.querySelector(".dz-loader__logo");

    try {
      const hasSeenLoader = sessionStorage.getItem("dz_loader_seen") === "1";
      const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

      if (hasSeenLoader || reduceMotion || !logo) {
        removeLoaderNow(loader);
        return;
      }

      const tl = gsap.timeline({
        onComplete: () => {
          sessionStorage.setItem("dz_loader_seen", "1");
          removeLoaderNow(loader);
        },
      });

      tl.fromTo(
        logo,
        { autoAlpha: 0, y: 18, scale: 0.96 },
        { autoAlpha: 1, y: 0, scale: 1, duration: 0.65, ease: "power3.out" }
      )
        .to(logo, { autoAlpha: 0, y: -12, duration: 0.3, delay: 0.28, ease: "power2.in" })
        .to(loader, { autoAlpha: 0, duration: 0.35, ease: "power2.inOut" });
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

  window.DZAnimations = {
    initFirstVisitLoader,
    initFadeInAnimations,
    animateIn,
  };

  document.addEventListener("DOMContentLoaded", function () {
    initFirstVisitLoader();
    initFadeInAnimations();
  });
})();
