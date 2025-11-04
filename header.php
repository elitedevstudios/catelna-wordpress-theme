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
            <button class="burger" id="burger" aria-controls="mobile-menu" aria-expanded="false" aria-label="Open menu">
                <span></span><span></span><span></span>
            </button>
            <ul class="desktop-menu">
                <li><a href="#home" data-scroll-to="home"><?php esc_html_e('Home', 'catena-estates'); ?></a></li>
                <li><a href="#introduction" data-scroll-to="introduction"><?php esc_html_e('About', 'catena-estates'); ?></a></li>
                <li><a href="#features" data-scroll-to="features"><?php esc_html_e('Features', 'catena-estates'); ?></a></li>
                <li><a href="#legacy" data-scroll-to="legacy"><?php esc_html_e('Developer', 'catena-estates'); ?></a></li>
                <li><a href="#contact-form" data-scroll-to="contact-form"><?php esc_html_e('Contact', 'catena-estates'); ?></a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- Off-canvas Mobile Menu -->
<div id="mobile-menu" class="mobile-menu" aria-hidden="true">
    <div class="mobile-menu__header">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo"><?php echo esc_html(get_bloginfo('name')); ?></a>
    </div>
    <ul class="mobile-menu__nav">
        <li><a href="#home" data-scroll-to="home">Home</a></li>
        <li><a href="#introduction" data-scroll-to="introduction">About</a></li>
        <li><a href="#features" data-scroll-to="features">Features</a></li>
        <li><a href="#legacy" data-scroll-to="legacy">Developer</a></li>
        <li><a href="#contact-form" data-scroll-to="contact-form">Contact</a></li>
    </ul>
</div>

<div id="mobile-menu-overlay" class="mobile-menu-overlay" aria-hidden="true"></div>
