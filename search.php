<?php
/**
 * The template for displaying search results pages
 *
 * @package CatenaEstates
 */

get_header();
?>

<main id="main" class="site-main">
    <section class="section search-results">
        <div class="container">
            <header class="page-header">
                <h1><?php printf(esc_html__('Search Results for: %s', 'catena-estates'), '<span>' . get_search_query() . '</span>'); ?></h1>
            </header>

            <?php if (have_posts()) : ?>
                <div class="search-results-content">
                    <?php
                    while (have_posts()) :
                        the_post();
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('search-result-item'); ?>>
                            <header class="entry-header">
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            </header>

                            <div class="entry-summary">
                                <?php the_excerpt(); ?>
                            </div>
                        </article>
                        <?php
                    endwhile;
                    ?>

                    <?php
                    the_posts_navigation([
                        'prev_text' => __('Previous page', 'catena-estates'),
                        'next_text' => __('Next page', 'catena-estates'),
                    ]);
                    ?>
                </div>

            <?php else : ?>
                <div class="no-results">
                    <h2><?php esc_html_e('Nothing Found', 'catena-estates'); ?></h2>
                    <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'catena-estates'); ?></p>

                    <?php get_search_form(); ?>

                    <div class="error-actions">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="cta-button">
                            <?php esc_html_e('Return Home', 'catena-estates'); ?>
                        </a>
                        <a href="#contact-form" class="cta-button secondary" data-scroll-to="contact-form">
                            <?php esc_html_e('Contact Us', 'catena-estates'); ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<style>
.search-results-content {
    margin-top: 3rem;
}

.search-result-item {
    border-bottom: 1px solid #e9ecef;
    padding: 2rem 0;
}

.search-result-item:first-child {
    padding-top: 0;
    border-top: none;
}

.search-result-item:last-child {
    border-bottom: none;
}

.search-result-item h2 {
    margin-bottom: 1rem;
}

.search-result-item h2 a {
    color: #1a252f;
    text-decoration: none;
}

.search-result-item h2 a:hover,
.search-result-item h2 a:focus {
    color: #8b5a3c;
}

.no-results {
    text-align: center;
    padding: 4rem 2rem;
}

.no-results h2 {
    margin-bottom: 2rem;
}

.no-results p {
    font-size: 1.125rem;
    margin-bottom: 2rem;
    color: #6c757d;
}

.error-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: 3rem;
}

@media (max-width: 768px) {
    .error-actions {
        flex-direction: column;
        align-items: center;
    }
}
</style>

<?php
get_footer();
