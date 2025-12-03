<?php
/**
 * The main template file for Catena Estates at Drax
 *
 * This is a single-page theme template that displays all sections
 * on one continuous page for optimal user experience.
 *
 * @package CatenaEstates
 */

get_header();
?>

<main id="main" class="site-main">
    <?php
    // Hero Section
    get_template_part('templates/sections/hero');

    // Introduction Section (Discover Your Paradise) - moved after hero
    get_template_part('templates/sections/introduction');

    // Unit Information Section (Exclusive Community Design)
    get_template_part('templates/sections/unit-info');

    // Tagline Break (visual separator with stats)
    get_template_part('templates/sections/tagline-break');

    // Features & Perks Section
    get_template_part('templates/sections/features');

    // Modern Design Section
    get_template_part('templates/sections/modern-design');

    // Beach Parallax Visual Break
    get_template_part('templates/sections/parallax-break');

    // Developer Legacy Section
    get_template_part('templates/sections/legacy');

    // Location Map Section
    get_template_part('templates/sections/location-map');

    // Closing CTA Section
    get_template_part('templates/sections/closing-cta');
    ?>
</main>

<?php
get_footer();
