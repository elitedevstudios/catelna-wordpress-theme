/**
 * Catena Estates Theme - Main JavaScript
 *
 * @package CatenaEstates
 */

(function($) {
    'use strict';

    // Document ready
    $(document).ready(function() {
        // Add .js class to <html> to enable JS-scoped animations
        document.documentElement.classList.add('js');
        initSmoothScrolling();
        initHeaderScroll();
        initFormValidation();
        initObserverAnimations();
        initMobileMenu();
    });

    /**
     * Initialize smooth scrolling for anchor links
     */
    function initSmoothScrolling() {
        $('a[href^="#"]').on('click', function(event) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                event.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 100
                }, 1000);
            }
        });
    }

    /**
     * Initialize header scroll effect
     */
    function initHeaderScroll() {
        var header = $('.site-header');
        var scrollClass = 'scrolled';

        $(window).on('scroll', function() {
            if ($(this).scrollTop() > 50) {
                header.addClass(scrollClass);
            } else {
                header.removeClass(scrollClass);
            }
        });
    }

    /**
     * Initialize form validation
     */
    function initFormValidation() {
        // Add browser validation polyfill for older browsers (guard Modernizr)
        try {
            if (typeof Modernizr !== 'undefined' && !Modernizr.formvalidation) {
                $('input[required], textarea[required]').on('blur', function() {
                    validateField($(this));
                });
            }
        } catch (e) {
            // Fail silently; validation will fallback to native where available
        }
    }

    /**
     * Validate individual field
     */
    function validateField($field) {
        var isValid = true;
        var value = $field.val().trim();

        // Remove existing error messages
        $field.siblings('.field-error').remove();
        $field.removeClass('error');

        // Check if field is required and empty
        if ($field.prop('required') && !value) {
            isValid = false;
            $field.addClass('error').after('<span class="field-error">' + catenaEstatesL10n.requiredField + '</span>');
        }

        // Email validation
        if ($field.attr('type') === 'email' && value) {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(value)) {
                isValid = false;
                $field.addClass('error').after('<span class="field-error">' + catenaEstatesL10n.invalidEmail + '</span>');
            }
        }

        return isValid;
    }

    /**
     * Utility function to check if element is in viewport
     */
    function isInViewport(element) {
        var elementTop = $(element).offset().top;
        var elementBottom = elementTop + $(element).outerHeight();
        var viewportTop = $(window).scrollTop();
        var viewportBottom = viewportTop + $(window).height();
        return elementBottom > viewportTop && elementTop < viewportBottom;
    }

    /**
     * Animate elements on scroll
     */
    function initObserverAnimations() {
        var elements = document.querySelectorAll('.will-animate');
        if (!('IntersectionObserver' in window)) {
            // Fallback to immediate animation
            $(elements).addClass('animate-in');
            return;
        }
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                    observer.unobserve(entry.target);
                }
            });
        }, { rootMargin: '0px 0px -10% 0px', threshold: 0.15 });
        elements.forEach(function(el) { observer.observe(el); });
    }

    /**
     * Mobile menu toggle
     */
    function initMobileMenu() {
        var $burger = $('#burger');
        var $close = $('#burger-close');
        var $drawer = $('#mobile-menu');
        var $overlay = $('#mobile-menu-overlay');

        function openMenu() {
            $drawer.addClass('open').attr('aria-hidden', 'false');
            $overlay.addClass('open').attr('aria-hidden', 'false');
            $('body').addClass('menu-open');
            $burger.attr('aria-expanded', 'true').addClass('is-active');
        }

        function closeMenu() {
            $drawer.removeClass('open').attr('aria-hidden', 'true');
            $overlay.removeClass('open').attr('aria-hidden', 'true');
            $('body').removeClass('menu-open');
            $burger.attr('aria-expanded', 'false').removeClass('is-active');
        }

        $burger.on('click', function(){
            if ($drawer.hasClass('open')) { closeMenu(); } else { openMenu(); }
        });
        $overlay.on('click', closeMenu);

        // Close when clicking a nav link
        $('#mobile-menu a').on('click', function() { closeMenu(); });
    }

})(jQuery);
