(function () {
  'use strict';

  // ── Smart Sticky Header ────────────────────────────────────────────────────
  function initStickyHeader() {
    const header = document.querySelector('header.wp-block-template-part');
    if (!header) return;

    let lastScrollY = window.scrollY;
    let ticking = false;

    function updateHeader() {
      const currentScrollY = window.scrollY;
      const scrollingDown = currentScrollY > lastScrollY;
      const pastHeader = currentScrollY > header.offsetHeight;

      if (scrollingDown && pastHeader) {
        header.classList.add('dz-header--hidden');
        // Close any open mega menus when header hides
        closeAllMenus();
      } else {
        header.classList.remove('dz-header--hidden');
      }

      lastScrollY = Math.max(0, currentScrollY);
      ticking = false;
    }

    window.addEventListener(
      'scroll',
      function () {
        if (!ticking) {
          requestAnimationFrame(updateHeader);
          ticking = true;
        }
      },
      { passive: true }
    );
  }

  // ── Mega Menu ──────────────────────────────────────────────────────────────
  var openItem = null;

  function closeAllMenus() {
    if (openItem) {
      openItem.classList.remove('dz-mega--open');
      var toggle = openItem.querySelector(':scope > .wp-block-navigation-submenu__toggle');
      if (toggle) toggle.setAttribute('aria-expanded', 'false');
      openItem = null;
    }
  }

  function openMenu(item) {
    closeAllMenus();
    item.classList.add('dz-mega--open');
    var toggle = item.querySelector(':scope > .wp-block-navigation-submenu__toggle');
    if (toggle) toggle.setAttribute('aria-expanded', 'true');
    openItem = item;
  }

  function initMegaMenu() {
    var header = document.querySelector('header.wp-block-template-part');
    if (!header) return;

    // Keep the CSS var for the fixed mega panel's top offset up to date
    function updatePanelTop() {
      var bottom = header.getBoundingClientRect().bottom;
      if (bottom > 0) {
        document.documentElement.style.setProperty('--dz-header-h', bottom + 'px');
      }
    }

    updatePanelTop();
    window.addEventListener('resize', updatePanelTop, { passive: true });
    window.addEventListener('scroll', updatePanelTop, { passive: true });

    // Only target direct children of the top-level container
    var topItems = header.querySelectorAll(
      '.wp-block-navigation__container > .wp-block-navigation-item.has-child'
    );

    topItems.forEach(function (item) {
      var submenu = item.querySelector(':scope > .wp-block-navigation__submenu-container');
      if (!submenu) return;

      // Hover
      item.addEventListener('mouseenter', function () {
        openMenu(item);
      });
      item.addEventListener('mouseleave', function () {
        closeAllMenus();
      });

      // Keyboard: top-level link/button toggles the panel
      var focusTarget = item.querySelector(
        ':scope > .wp-block-navigation-item__content, :scope > .wp-block-navigation-submenu__toggle'
      );
      if (focusTarget) {
        focusTarget.addEventListener('keydown', function (e) {
          if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            if (item.classList.contains('dz-mega--open')) {
              closeAllMenus();
            } else {
              openMenu(item);
            }
          }
          if (e.key === 'Escape') {
            closeAllMenus();
            focusTarget.focus();
          }
        });
      }
    });

    // Close on outside click
    document.addEventListener('click', function (e) {
      if (!e.target.closest('.wp-block-navigation-item.has-child')) {
        closeAllMenus();
      }
    });

    // Close on Escape from anywhere
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') closeAllMenus();
    });
  }

  document.addEventListener('DOMContentLoaded', function () {
    initStickyHeader();
    initMegaMenu();
  });
})();
