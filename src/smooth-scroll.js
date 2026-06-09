import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";

gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

(function () {
  "use strict";

  // Respect user's motion preference and skip on touch-primary devices
  const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  const isTouchPrimary = window.matchMedia("(pointer: coarse)").matches;

  // ─── Smooth anchor-link scrolling ─────────────────────────────────────────
  // Always active (even with reduced-motion — just with a shorter duration)
  document.addEventListener("click", function (e) {
    const anchor = e.target.closest('a[href*="#"]');
    if (!anchor) return;

    const href = anchor.getAttribute("href");
    // Only handle same-page anchors
    const isSamePage =
      !href.startsWith("http") ||
      anchor.hostname === window.location.hostname;

    if (!isSamePage) return;

    const hash = href.includes("#") ? "#" + href.split("#")[1] : null;
    if (!hash || hash === "#") return;

    const target = document.querySelector(hash);
    if (!target) return;

    e.preventDefault();

    const adminBar = document.getElementById("wpadminbar");
    const offsetY = adminBar ? adminBar.offsetHeight : 0;

    gsap.to(window, {
      duration: prefersReducedMotion ? 0 : 1.0,
      scrollTo: { y: target, offsetY: offsetY + 16 },
      ease: "power2.inOut",
    });
  });

  // ─── Inertia smooth scroll (desktop mouse-wheel only) ─────────────────────
  if (prefersReducedMotion || isTouchPrimary) return;

  let currentY = window.scrollY;
  let targetY = window.scrollY;
  const lerp = 0.09; // lower = smoother/slower, higher = snappier

  function getMaxScroll() {
    return Math.max(
      0,
      document.body.scrollHeight - window.innerHeight
    );
  }

  // Intercept wheel events so we control the scroll position
  window.addEventListener(
    "wheel",
    function (e) {
      e.preventDefault();
      // Normalize delta across browsers/devices
      let delta = e.deltaY;
      if (e.deltaMode === 1) delta *= 40;  // line mode
      if (e.deltaMode === 2) delta *= 800; // page mode

      targetY += delta;
      targetY = Math.max(0, Math.min(targetY, getMaxScroll()));
    },
    { passive: false }
  );

  // Keep targetY in sync with programmatic scrolls (e.g. browser back/forward)
  window.addEventListener("scroll", function () {
    // Only sync when the scroll wasn't driven by our ticker
    if (!tickerActive) {
      currentY = window.scrollY;
      targetY = window.scrollY;
    }
  });

  let tickerActive = false;

  function onTick() {
    const distance = targetY - currentY;

    // Stop ticking when close enough
    if (Math.abs(distance) < 0.5) {
      currentY = targetY;
      window.scrollTo(0, currentY);
      tickerActive = false;
      gsap.ticker.remove(onTick);
      ScrollTrigger.update();
      return;
    }

    currentY += distance * lerp;
    window.scrollTo(0, currentY);
    ScrollTrigger.update();
  }

  // Start the ticker on first wheel event, restart on subsequent ones
  window.addEventListener(
    "wheel",
    function () {
      if (!tickerActive) {
        tickerActive = true;
        gsap.ticker.add(onTick);
      }
    },
    { passive: true }
  );

  // Prevent lagSmoothing from interfering with the lerp timing
  gsap.ticker.lagSmoothing(0);

  // Re-sync on resize (page height may change)
  window.addEventListener("resize", function () {
    targetY = Math.min(targetY, getMaxScroll());
    currentY = Math.min(currentY, getMaxScroll());
  });
})();
