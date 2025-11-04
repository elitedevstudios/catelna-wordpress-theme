/**
 * Catena Estates Theme - Lazy Loading
 *
 * @package CatenaEstates
 */

(function() {
    'use strict';

    // Check if IntersectionObserver is supported
    if ('IntersectionObserver' in window) {
        initLazyLoading();
    } else {
        // Fallback for older browsers
        loadAllImages();
    }

    /**
     * Initialize lazy loading with IntersectionObserver
     */
    function initLazyLoading() {
        var lazyImages = document.querySelectorAll('img[data-src], img[data-srcset]');

        if (lazyImages.length === 0) {
            return;
        }

        var imageObserver = new IntersectionObserver(function(entries, observer) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    var lazyImage = entry.target;
                    loadImage(lazyImage);
                    imageObserver.unobserve(lazyImage);
                }
            });
        });

        lazyImages.forEach(function(lazyImage) {
            imageObserver.observe(lazyImage);
        });
    }

    /**
     * Load a single lazy image
     */
    function loadImage(lazyImage) {
        // Add loading class
        lazyImage.classList.add('loading');

        // Create new image to preload
        var img = new Image();

        img.onload = function() {
            // Set the src/srcset
            if (lazyImage.dataset.src) {
                lazyImage.src = lazyImage.dataset.src;
            }
            if (lazyImage.dataset.srcset) {
                lazyImage.srcset = lazyImage.dataset.srcset;
            }

            // Remove data attributes and loading class
            lazyImage.classList.remove('loading');
            lazyImage.classList.add('loaded');

            // Remove data attributes
            lazyImage.removeAttribute('data-src');
            lazyImage.removeAttribute('data-srcset');
        };

        img.onerror = function() {
            // Handle error - show placeholder or alt text
            lazyImage.classList.remove('loading');
            lazyImage.classList.add('error');
        };

        // Start loading
        if (lazyImage.dataset.src) {
            img.src = lazyImage.dataset.src;
        }
    }

    /**
     * Fallback for browsers without IntersectionObserver
     */
    function loadAllImages() {
        var lazyImages = document.querySelectorAll('img[data-src], img[data-srcset]');

        lazyImages.forEach(function(lazyImage) {
            loadImage(lazyImage);
        });
    }

    /**
     * Add lazy loading attributes to images dynamically added to the DOM
     */
    function observeDynamicImages() {
        var observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                mutation.addedNodes.forEach(function(node) {
                    if (node.nodeType === 1 && node.tagName === 'IMG') {
                        var img = node;
                        if (img.hasAttribute('data-src') || img.hasAttribute('data-srcset')) {
                            if ('IntersectionObserver' in window) {
                                var imageObserver = new IntersectionObserver(function(entries) {
                                    entries.forEach(function(entry) {
                                        if (entry.isIntersecting) {
                                            loadImage(entry.target);
                                            imageObserver.unobserve(entry.target);
                                        }
                                    });
                                });
                                imageObserver.observe(img);
                            } else {
                                loadImage(img);
                            }
                        }
                    }
                });
            });
        });

        observer.observe(document.body, {
            childList: true,
            subtree: true
        });
    }

    // Initialize dynamic image observation
    observeDynamicImages();

})();
