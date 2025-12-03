<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <main>
 *
 * @package CatenaEstates
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php // Inline icon sprite once near the top of body ?>
<?php get_template_part('templates/partials/icons-sprite'); ?>

<!-- Skip to main content link for accessibility -->
<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Skip to content', 'catena-estates'); ?></a>

<header id="masthead" class="site-header">
    <div class="header-content">
        <div class="site-branding">
            <?php
            $custom_logo_id = get_theme_mod('custom_logo');
            $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

            if (has_custom_logo()) {
                echo '<a href="' . esc_url(home_url('/')) . '" class="site-logo">';
                echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">';
                echo '</a>';
            } else {
                echo '<a href="' . esc_url(home_url('/')) . '" class="site-logo">';
                echo esc_html(get_bloginfo('name'));
                echo '</a>';
            }
            ?>
        </div>

        <nav id="site-navigation" class="site-navigation">
            <ul class="desktop-menu">
                <li><a href="#home" data-scroll-to="home"><?php esc_html_e('Home', 'catena-estates'); ?></a></li>
                <li><a href="#introduction" data-scroll-to="introduction"><?php esc_html_e('About', 'catena-estates'); ?></a></li>
                <li><a href="#features" data-scroll-to="features"><?php esc_html_e('Features', 'catena-estates'); ?></a></li>
                <li><a href="#legacy" data-scroll-to="legacy"><?php esc_html_e('Developer', 'catena-estates'); ?></a></li>
            </ul>
            <a href="mailto:infodraxhallltd@gmail.com?subject=I'm%20interested%20in%20Catena%20Estates" class="header-cta"><?php esc_html_e('Get started', 'catena-estates'); ?></a>
            <button type="button" class="burger" id="burger" aria-controls="mobile-menu" aria-expanded="false" aria-label="Open menu">
                <span></span><span></span><span></span>
            </button>
        </nav>
    </div>
</header>

<!-- Slide-in Mobile Menu (Stayli-style) -->
<div id="mobile-menu" class="mobile-menu-panel" aria-hidden="true">
    <div class="mobile-menu__header">
        <div class="site-branding">
            <?php
            if (has_custom_logo()) {
                echo '<a href="' . esc_url(home_url('/')) . '" class="site-logo">';
                echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">';
                echo '</a>';
            } else {
                echo '<a href="' . esc_url(home_url('/')) . '" class="site-logo">';
                echo esc_html(get_bloginfo('name'));
                echo '</a>';
            }
            ?>
        </div>
        <button type="button" class="mobile-menu__close" id="mobile-menu-close" aria-label="Close menu">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
    </div>
    <nav class="mobile-menu__nav">
        <a href="#home" data-scroll-to="home"><?php esc_html_e('Home', 'catena-estates'); ?></a>
        <a href="#introduction" data-scroll-to="introduction"><?php esc_html_e('About', 'catena-estates'); ?></a>
        <a href="#features" data-scroll-to="features"><?php esc_html_e('Features', 'catena-estates'); ?></a>
        <a href="#legacy" data-scroll-to="legacy"><?php esc_html_e('Developer', 'catena-estates'); ?></a>
    </nav>
    <div class="mobile-menu__footer">
        <a href="mailto:infodraxhallltd@gmail.com?subject=I'm%20interested%20in%20Catena%20Estates" class="mobile-menu__cta"><?php esc_html_e('Get started', 'catena-estates'); ?></a>
    </div>
</div>
<div id="mobile-menu-backdrop" class="mobile-menu-backdrop"></div>

<script>
// Mobile menu toggle (Stayli-style slide-in panel)
(function() {
    'use strict';
    
    function setupMobileMenu() {
        var burger = document.getElementById('burger');
        var menu = document.getElementById('mobile-menu');
        var backdrop = document.getElementById('mobile-menu-backdrop');
        var closeBtn = document.getElementById('mobile-menu-close');
        
        if (!burger || !menu) {
            return false;
        }
        
        // Skip if already set up
        if (burger.dataset.setup === 'true') {
            return true;
        }
        
        function openNav() {
            menu.classList.add('open');
            backdrop.classList.add('open');
            menu.setAttribute('aria-hidden', 'false');
            document.body.classList.add('menu-open');
            burger.setAttribute('aria-expanded', 'true');
            burger.classList.add('is-active');
        }
        
        function closeNav() {
            menu.classList.remove('open');
            backdrop.classList.remove('open');
            menu.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('menu-open');
            burger.setAttribute('aria-expanded', 'false');
            burger.classList.remove('is-active');
        }
        
        function handleBurgerClick(e) {
            e.preventDefault();
            e.stopPropagation();
            if (menu.classList.contains('open')) {
                closeNav();
            } else {
                openNav();
            }
        }
        
        // Attach burger button events
        burger.addEventListener('click', handleBurgerClick, true);
        burger.addEventListener('touchend', handleBurgerClick, true);
        
        // Close button
        if (closeBtn) {
            closeBtn.addEventListener('click', function(e) {
                e.preventDefault();
                closeNav();
            }, true);
        }
        
        // Close on backdrop click
        if (backdrop) {
            backdrop.addEventListener('click', closeNav);
        }
        
        // Close on menu link click
        var links = menu.querySelectorAll('.mobile-menu__nav a');
        for (var i = 0; i < links.length; i++) {
            links[i].addEventListener('click', closeNav);
        }
        
        burger.dataset.setup = 'true';
        return true;
    }
    
    // Try multiple times to ensure it works
    if (document.readyState === 'complete' || document.readyState === 'interactive') {
        setupMobileMenu();
    } else {
        document.addEventListener('DOMContentLoaded', setupMobileMenu);
    }
    
    window.addEventListener('load', function() {
        if (!setupMobileMenu()) {
            setTimeout(setupMobileMenu, 200);
        }
    });
})();
</script>
