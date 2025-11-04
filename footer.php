<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package CatenaEstates
 */

$contact_info = catena_estates_get_contact_info();
?>

<footer id="colophon" class="site-footer">
    <div class="footer-content">
        <div class="footer-row">
            <div class="copyright">
                <p>
                    &copy; <?php echo esc_html(date('Y')); ?> <?php echo esc_html(get_bloginfo('name')); ?>. <?php esc_html_e('All rights reserved.', 'catena-estates'); ?>
                </p>
            </div>

            <nav class="footer-links">
                <a href="<?php echo esc_url(home_url('/privacy-policy')); ?>">
                    <?php esc_html_e('Privacy Policy', 'catena-estates'); ?>
                </a>
                <a href="<?php echo esc_url(home_url('/terms-of-service')); ?>">
                    <?php esc_html_e('Terms of Service', 'catena-estates'); ?>
                </a>
            </nav>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
