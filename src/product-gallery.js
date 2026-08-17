(function () {
  'use strict';

  function initProductGalleries() {
    var thumbs = document.querySelectorAll('.kayi-product-gallery__thumb');

    thumbs.forEach(function (thumb) {
      thumb.addEventListener('click', function (event) {
        event.preventDefault();

        var gallery = thumb.closest('.kayi-product-gallery');
        if (!gallery) return;

        var mainImage = gallery.querySelector('[data-main-image]');
        var fullSrc = thumb.getAttribute('data-full');
        if (!mainImage || !fullSrc) return;

        gallery.querySelectorAll('.kayi-product-gallery__thumb').forEach(function (el) {
          el.classList.remove('is-active', 'border-neutral-900');
          el.classList.add('border-transparent');
        });
        thumb.classList.add('is-active', 'border-neutral-900');
        thumb.classList.remove('border-transparent');

        mainImage.style.opacity = '0';
        window.setTimeout(function () {
          mainImage.src = fullSrc;
          mainImage.style.opacity = '1';
        }, 100);
      });
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initProductGalleries);
  } else {
    initProductGalleries();
  }
})();
