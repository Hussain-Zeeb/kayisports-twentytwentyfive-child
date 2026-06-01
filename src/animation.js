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

  window.DZAnimations = {
    initHomepageLoader,
    initFadeInAnimations,
    animateIn,
  };

  document.addEventListener("DOMContentLoaded", function () {
    initHomepageLoader();
    initFadeInAnimations();
  });
})();
