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
  // Hover-intent: a short delay before opening (so sweeping across the nav
  // doesn't flash panels) and before closing (so moving down into the panel,
  // or briefly overshooting it, never closes it). Switching between top-level
  // items while a panel is already open is instant.
  var OPEN_DELAY = 90;
  var CLOSE_DELAY = 220;
  var MIN_WIDTH = 600; // matches the CSS breakpoint; below this the core overlay menu is used

  var openItem = null;
  var openTimer = null;
  var closeTimer = null;
  var backdrop = null;

  function isDesktop() {
    return window.innerWidth >= MIN_WIDTH;
  }

  function clearTimers() {
    clearTimeout(openTimer);
    clearTimeout(closeTimer);
  }

  function setExpanded(item, expanded) {
    var toggle = item.querySelector(':scope > .wp-block-navigation-submenu__toggle, :scope > .wp-block-navigation__submenu-icon');
    if (toggle) toggle.setAttribute('aria-expanded', expanded ? 'true' : 'false');
  }

  function closeAllMenus() {
    clearTimers();
    if (openItem) {
      openItem.classList.remove('dz-mega--open');
      setExpanded(openItem, false);
      openItem = null;
    }
    if (backdrop) backdrop.classList.remove('is-visible');
  }

  function openMenu(item) {
    clearTimers();
    if (openItem === item) return;
    if (openItem) {
      openItem.classList.remove('dz-mega--open');
      setExpanded(openItem, false);
    }
    item.classList.add('dz-mega--open');
    setExpanded(item, true);
    openItem = item;
    if (backdrop) backdrop.classList.add('is-visible');
  }

  function initMegaMenu() {
    var header = document.querySelector('header.wp-block-template-part');
    if (!header) return;

    var topItems = header.querySelectorAll(
      '.wp-block-navigation__container > .wp-block-navigation-item.has-child'
    );
    if (!topItems.length) return;

    backdrop = document.createElement('div');
    backdrop.className = 'dz-mega-backdrop';
    backdrop.setAttribute('aria-hidden', 'true');
    document.body.appendChild(backdrop);
    backdrop.addEventListener('mouseenter', function () {
      clearTimeout(openTimer);
      closeTimer = setTimeout(closeAllMenus, CLOSE_DELAY);
    });
    backdrop.addEventListener('click', closeAllMenus);

    // Panel sits flush under the header; the bridge covers the gap between
    // the nav label and the header's bottom edge.
    function updateGeometry() {
      var bottom = header.getBoundingClientRect().bottom;
      if (bottom > 0) {
        document.documentElement.style.setProperty('--dz-header-h', bottom + 'px');
      }
      var first = topItems[0].getBoundingClientRect();
      document.documentElement.style.setProperty('--dz-mega-bridge', Math.max(0, bottom - first.bottom) + 2 + 'px');
    }

    updateGeometry();
    window.addEventListener('resize', updateGeometry, { passive: true });
    window.addEventListener('scroll', updateGeometry, { passive: true });

    topItems.forEach(function (item) {
      if (!item.querySelector(':scope > .wp-block-navigation__submenu-container')) return;

      item.addEventListener('mouseenter', function () {
        if (!isDesktop()) return;
        clearTimeout(closeTimer);
        if (openItem) {
          openMenu(item);
        } else {
          clearTimeout(openTimer);
          openTimer = setTimeout(function () { openMenu(item); }, OPEN_DELAY);
        }
      });

      item.addEventListener('mouseleave', function () {
        if (!isDesktop()) return;
        clearTimeout(openTimer);
        closeTimer = setTimeout(closeAllMenus, CLOSE_DELAY);
      });

      // Keyboard: focusing into the item opens it (CSS :focus-within also does);
      // leaving the item with Tab closes it.
      item.addEventListener('focusin', function () {
        if (isDesktop()) openMenu(item);
      });
      item.addEventListener('focusout', function (e) {
        if (!item.contains(e.relatedTarget)) closeAllMenus();
      });
    });

    // Plain top-level links (no panel) close any open panel when hovered.
    header.querySelectorAll('.wp-block-navigation__container > .wp-block-navigation-item:not(.has-child)').forEach(function (item) {
      item.addEventListener('mouseenter', function () {
        if (openItem) closeAllMenus();
      });
    });

    document.addEventListener('click', function (e) {
      if (!e.target.closest('.wp-block-navigation-item.has-child')) closeAllMenus();
    });

    document.addEventListener('keydown', function (e) {
      if (e.key !== 'Escape' || !openItem) return;
      var link = openItem.querySelector(':scope > .wp-block-navigation-item__content');
      closeAllMenus();
      if (link) link.focus();
    });

    window.addEventListener('resize', function () {
      if (!isDesktop()) closeAllMenus();
    }, { passive: true });
  }

  document.addEventListener('DOMContentLoaded', function () {
    initStickyHeader();
    initMegaMenu();
  });
})();
