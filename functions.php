<?php
/**
 * Catena Estates at Drax Theme Functions
 *
 * @package CatenaEstates
 * @version 1.0.0
 */

declare(strict_types=1);

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Define theme constants
define('CATENA_ESTATES_VERSION', '1.0.0');
define('CATENA_ESTATES_DIR', get_template_directory());
define('CATENA_ESTATES_URI', get_template_directory_uri());

/**
 * Theme Setup
 */
function catena_estates_setup(): void {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');

    // Enable support for custom logo
    add_theme_support('custom-logo', [
        'height'      => 100,
        'width'       => 300,
        'flex-width'  => true,
        'flex-height' => true,
    ]);

    // Enable support for custom background
    add_theme_support('custom-background', [
        'default-color' => 'ffffff',
    ]);

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Enable support for HTML5 markup
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style',
        'navigation-widgets',
    ]);

    // Enable support for wide and full alignment
    add_theme_support('align-wide');

    // Enable support for editor styles
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css');

    // Enable responsive embedded content
    add_theme_support('responsive-embeds');

    // Register navigation menus
    register_nav_menus([
        'primary' => __('Primary Menu', 'catena-estates'),
    ]);
}
add_action('after_setup_theme', 'catena_estates_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet
 */
function catena_estates_content_width(): void {
    $GLOBALS['content_width'] = apply_filters('catena_estates_content_width', 1200);
}
add_action('after_setup_theme', 'catena_estates_content_width', 0);

/**
 * Register widget area
 */
function catena_estates_widgets_init(): void {
    register_sidebar([
        'name'          => __('Footer Widget Area', 'catena-estates'),
        'id'            => 'footer-widgets',
        'description'   => __('Add widgets here to appear in your footer.', 'catena-estates'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);
}
add_action('widgets_init', 'catena_estates_widgets_init');

/**
 * Enqueue scripts and styles
 */
function catena_estates_scripts(): void {
    // Enqueue main stylesheet
    wp_enqueue_style(
        'catena-estates-style',
        get_stylesheet_uri(),
        [],
        CATENA_ESTATES_VERSION
    );

    // Enqueue Google Fonts
    wp_enqueue_style(
        'catena-estates-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap',
        [],
        null
    );

    // Enqueue main JavaScript
    wp_enqueue_script(
        'catena-estates-main',
        CATENA_ESTATES_URI . '/assets/js/main.js',
        ['jquery'],
        CATENA_ESTATES_VERSION,
        true
    );

    // Enqueue lazy loading script
    wp_enqueue_script(
        'catena-estates-lazy-load',
        CATENA_ESTATES_URI . '/assets/js/lazy-load.js',
        [],
        CATENA_ESTATES_VERSION,
        true
    );

    // Enqueue contact form script
    wp_enqueue_script(
        'catena-estates-contact-form',
        CATENA_ESTATES_URI . '/assets/js/contact-form.js',
        ['jquery'],
        CATENA_ESTATES_VERSION,
        true
    );

    // Localize script for AJAX
    wp_localize_script('catena-estates-contact-form', 'catenaEstatesAjax', [
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('catena_estates_contact_nonce'),
    ]);

    // Add Font Awesome for icons
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
        [],
        '6.4.0'
    );
}
add_action('wp_enqueue_scripts', 'catena_estates_scripts');

/**
 * Enqueue block editor styles
 */
function catena_estates_block_editor_styles(): void {
    wp_enqueue_style(
        'catena-estates-block-editor-styles',
        CATENA_ESTATES_URI . '/assets/css/editor-style.css',
        [],
        CATENA_ESTATES_VERSION
    );
}
add_action('enqueue_block_editor_assets', 'catena_estates_block_editor_styles');

/**
 * ACF Integration
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => 'Theme Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug'  => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect'   => false,
    ]);
}

/**
 * Include ACF field groups
 */
if (function_exists('acf_add_local_field_group')) {
    require_once CATENA_ESTATES_DIR . '/acf-fields/field-groups.php';
}

/**
 * Custom ACF functions
 */

/**
 * Get ACF field value with fallback
 */
function catena_estates_get_field(string $field_name, $fallback = '') {
    if (function_exists('get_field')) {
        $value = get_field($field_name, 'option');
        return $value ?: $fallback;
    }
    return $fallback;
}

/**
 * Get hero section data
 */
function catena_estates_get_hero_data(): array {
    return [
        'background_image' => catena_estates_get_field('hero_background_image'),
        'headline'         => catena_estates_get_field('hero_headline', 'Welcome to Catena Estates at Drax'),
        'subheading'       => catena_estates_get_field('hero_subheading', 'Here\'s Your Opportunity to Own a Piece of Jamaican Paradise.'),
        'cta_text'         => catena_estates_get_field('hero_cta_text', 'I\'m Interested'),
    ];
}

/**
 * Get contact information
 */
function catena_estates_get_contact_info(): array {
    return [
        'email'   => catena_estates_get_field('contact_email', 'infodraxhallltd@gmail.com'),
        'phone'   => catena_estates_get_field('contact_phone'),
        'address' => catena_estates_get_field('contact_address'),
    ];
}

/**
 * Get email template data
 */
function catena_estates_get_email_data(): array {
    return [
        'subject'  => catena_estates_get_field('email_subject', 'I\'m interested in viewing Catena Estates at Drax'),
        'template' => catena_estates_get_field('email_template'),
    ];
}

/**
 * Contact Form Handler
 */
function catena_estates_handle_contact_form(): void {
    // Verify nonce
    if (!wp_verify_nonce($_POST['nonce'] ?? '', 'catena_estates_contact_nonce')) {
        wp_die(__('Security check failed', 'catena-estates'));
    }

    // Sanitize input
    $name    = sanitize_text_field($_POST['name'] ?? '');
    $email   = sanitize_email($_POST['email'] ?? '');
    $phone   = sanitize_text_field($_POST['phone'] ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');
    $interests = isset($_POST['interests']) ? array_map('sanitize_text_field', $_POST['interests']) : [];

    // Validate required fields
    if (empty($name) || empty($email)) {
        wp_send_json_error(__('Name and email are required', 'catena-estates'));
    }

    // Validate email
    if (!is_email($email)) {
        wp_send_json_error(__('Please enter a valid email address', 'catena-estates'));
    }

    $contact_info = catena_estates_get_contact_info();
    $email_data = catena_estates_get_email_data();

    // Prepare email content
    $subject = $email_data['subject'];
    $body = sprintf(
        "New inquiry from Catena Estates website:\n\n" .
        "Name: %s\n" .
        "Email: %s\n" .
        "Phone: %s\n" .
        "Interests: %s\n\n" .
        "Message:\n%s",
        $name,
        $email,
        $phone,
        implode(', ', $interests),
        $message
    );

    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        "From: {$name} <{$email}>",
        "Reply-To: {$email}",
    ];

    // Send email
    $sent = wp_mail($contact_info['email'], $subject, $body, $headers);

    if ($sent) {
        wp_send_json_success(__('Thank you for your inquiry. We\'ll get back to you soon!', 'catena-estates'));
    } else {
        wp_send_json_error(__('Sorry, there was an error sending your message. Please try again.', 'catena-estates'));
    }
}
add_action('wp_ajax_catena_estates_contact', 'catena_estates_handle_contact_form');
add_action('wp_ajax_nopriv_catena_estates_contact', 'catena_estates_handle_contact_form');

/**
 * Performance Optimizations
 */

/**
 * Add preload for critical resources
 */
function catena_estates_add_preload(): void {
    if (is_front_page()) {
        // Preload hero background image
        $hero_image = catena_estates_get_field('hero_background_image');
        if ($hero_image) {
            echo '<link rel="preload" href="' . esc_url($hero_image) . '" as="image" type="image/jpeg">';
        }

        // Removed stylesheet preload to avoid console warning and double-load
    }
}
add_action('wp_head', 'catena_estates_add_preload', 1);

/**
 * Add resource hints
 */
function catena_estates_add_resource_hints(array $hints, string $relation_type): array {
    if ('dns-prefetch' === $relation_type) {
        $hints[] = '//fonts.googleapis.com';
        $hints[] = '//cdnjs.cloudflare.com';
    }
    return $hints;
}
add_filter('wp_resource_hints', 'catena_estates_add_resource_hints', 10, 2);

/**
 * Optimize scripts loading
 */
function catena_estates_optimize_scripts(): void {
    // Defer non-critical scripts
    if (!is_admin()) {
        // Remove jQuery migrate in frontend
        wp_deregister_script('jquery-migrate');

        // Add defer attribute to scripts
        add_filter('script_loader_tag', function(string $tag, string $handle): string {
            $defer_scripts = ['catena-estates-lazy-load'];
            if (in_array($handle, $defer_scripts, true)) {
                return str_replace(' src', ' defer src', $tag);
            }
            return $tag;
        }, 10, 2);
    }
}
add_action('wp_enqueue_scripts', 'catena_estates_optimize_scripts', 999);

/**
 * Add lazy loading attributes to images
 */
function catena_estates_lazy_load_images(string $content): string {
    if (!is_admin() && is_singular()) {
        $content = preg_replace_callback(
            '/<img([^>]+?)>/i',
            function(array $matches): string {
                $img = $matches[1];

                // Skip if already has loading attribute
                if (strpos($img, 'loading=') !== false) {
                    return $matches[0];
                }

                // Add loading="lazy" if not in first paragraph
                if (strpos($img, 'class=') !== false) {
                    $img = preg_replace('/class=["\']([^"\']*)["\']/', 'class="$1 lazy"', $img);
                } else {
                    $img .= ' class="lazy"';
                }

                $img .= ' loading="lazy"';

                return "<img{$img}>";
            },
            $content
        );
    }

    return $content;
}
add_filter('the_content', 'catena_estates_lazy_load_images');

/**
 * SEO and Meta Tags
 */

/**
 * Add custom meta tags
 */
function catena_estates_add_meta_tags(): void {
    if (is_front_page()) {
        $meta_title = catena_estates_get_field('meta_title');
        $meta_description = catena_estates_get_field('meta_description');
        $json_ld = catena_estates_get_field('json_ld_schema');

        if ($meta_title) {
            echo '<meta name="title" content="' . esc_attr($meta_title) . '">' . "\n";
        }

        if ($meta_description) {
            echo '<meta name="description" content="' . esc_attr($meta_description) . '">' . "\n";
        }

        // Open Graph tags
        if ($meta_title) {
            echo '<meta property="og:title" content="' . esc_attr($meta_title) . '">' . "\n";
        }
        if ($meta_description) {
            echo '<meta property="og:description" content="' . esc_attr($meta_description) . '">' . "\n";
        }
        echo '<meta property="og:type" content="website">' . "\n";
        echo '<meta property="og:url" content="' . esc_url(home_url('/')) . '">' . "\n";

        // Twitter Card tags
        echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
        if ($meta_title) {
            echo '<meta name="twitter:title" content="' . esc_attr($meta_title) . '">' . "\n";
        }
        if ($meta_description) {
            echo '<meta name="twitter:description" content="' . esc_attr($meta_description) . '">' . "\n";
        }

        // JSON-LD structured data
        if ($json_ld) {
            echo '<script type="application/ld+json">' . $json_ld . '</script>' . "\n";
        }
    }
}
add_action('wp_head', 'catena_estates_add_meta_tags');

/**
 * Security Enhancements
 */

/**
 * Remove WordPress version from head
 */
function catena_estates_remove_wp_version(): string {
    return '';
}
add_filter('the_generator', 'catena_estates_remove_wp_version');

/**
 * Add security headers
 */
function catena_estates_add_security_headers(): void {
    if (!is_admin()) {
        header('X-Content-Type-Options: nosniff');
        header('X-Frame-Options: SAMEORIGIN');
        header('X-XSS-Protection: 1; mode=block');
        header('Referrer-Policy: strict-origin-when-cross-origin');
    }
}
add_action('send_headers', 'catena_estates_add_security_headers');

/**
 * Custom login logo
 */
function catena_estates_custom_login_logo(): void {
    $logo_url = get_theme_mod('custom_logo') ? wp_get_attachment_image_url(get_theme_mod('custom_logo'), 'full') : '';
    if ($logo_url) {
        echo '<style type="text/css">
            .login h1 a {
                background-image: url(' . esc_url($logo_url) . ') !important;
                background-size: contain;
                width: 100%;
                height: 80px;
            }
        </style>';
    }
}
add_action('login_head', 'catena_estates_custom_login_logo');

/**
 * Custom login URL
 */
function catena_estates_custom_login_url(): string {
    return home_url('/');
}
add_filter('login_headerurl', 'catena_estates_custom_login_url');

/**
 * Custom login title
 */
function catena_estates_custom_login_title(): string {
    return get_bloginfo('name');
}
add_filter('login_headertitle', 'catena_estates_custom_login_title');

/**
 * Utility Functions
 */

/**
 * Get asset URL with version
 */
function catena_estates_asset_url(string $path): string {
    return CATENA_ESTATES_URI . '/' . ltrim($path, '/') . '?ver=' . CATENA_ESTATES_VERSION;
}

/**
 * Debug function for development
 */
if (WP_DEBUG) {
    function catena_estates_debug($data): void {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
    }
}

/**
 * Include additional theme files
 */
$includes = [
    'includes/custom-post-types.php',
    'includes/shortcodes.php',
    'includes/customizer.php',
];

foreach ($includes as $include) {
    $file_path = CATENA_ESTATES_DIR . '/' . $include;
    if (file_exists($file_path)) {
        require_once $file_path;
    }
}
