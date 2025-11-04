<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package CatenaEstates
 */

get_header();
?>

<main id="main" class="site-main">
    <section class="section error-404 not-found">
        <div class="container">
            <div class="error-404-content">
                <h1><?php esc_html_e('404', 'catena-estates'); ?></h1>
                <h2><?php esc_html_e('Page Not Found', 'catena-estates'); ?></h2>
                <p><?php esc_html_e('It looks like the page you\'re looking for doesn\'t exist. Perhaps you can find what you\'re looking for by exploring our beautiful Catena Estates at Drax.', 'catena-estates'); ?></p>

                <div class="error-actions">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="cta-button">
                        <?php esc_html_e('Return Home', 'catena-estates'); ?>
                    </a>
                    <a href="#contact-form" class="cta-button secondary" data-scroll-to="contact-form">
                        <?php esc_html_e('Contact Us', 'catena-estates'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
.error-404-content {
    text-align: center;
    padding: 4rem 2rem;
    max-width: 600px;
    margin: 0 auto;
}

.error-404 h1 {
    font-size: 8rem;
    font-weight: 300;
    color: #8b5a3c;
    margin-bottom: 1rem;
    line-height: 1;
}

.error-404 h2 {
    font-size: 2.5rem;
    margin-bottom: 2rem;
    color: #1a252f;
}

.error-404 p {
    font-size: 1.25rem;
    margin-bottom: 3rem;
    color: #6c757d;
}

.error-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

@media (max-width: 768px) {
    .error-404 h1 {
        font-size: 6rem;
    }

    .error-404 h2 {
        font-size: 2rem;
    }

    .error-actions {
        flex-direction: column;
        align-items: center;
    }
}
</style>

<?php
get_footer();
