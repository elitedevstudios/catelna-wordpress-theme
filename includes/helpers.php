<?php
/**
 * Theme Helper Functions
 *
 * Additional utility functions used throughout the theme.
 * Note: Core helper functions are defined in functions.php
 *
 * @package CatenaEstates
 * @since 1.0.0
 */

declare(strict_types=1);

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Render an SVG icon from the sprite
 *
 * @param string $icon_name The icon name (without # prefix).
 * @param array  $args      Optional arguments (class, width, height, aria-label).
 * @return string SVG markup.
 */
if (!function_exists('catena_estates_icon')) {
    function catena_estates_icon(string $icon_name, array $args = []): string {
        $defaults = [
            'class'      => '',
            'width'      => 24,
            'height'     => 24,
            'aria-label' => '',
        ];
        
        $args = wp_parse_args($args, $defaults);
        
        $class = !empty($args['class']) ? ' class="' . esc_attr($args['class']) . '"' : '';
        $aria  = !empty($args['aria-label']) 
            ? ' aria-label="' . esc_attr($args['aria-label']) . '" role="img"' 
            : ' aria-hidden="true"';
        
        return sprintf(
            '<svg%s width="%d" height="%d"%s><use href="#%s"></use></svg>',
            $class,
            absint($args['width']),
            absint($args['height']),
            $aria,
            esc_attr($icon_name)
        );
    }
}

/**
 * Generate mailto link with pre-filled subject and body
 *
 * @param string $email   Email address.
 * @param string $subject Email subject.
 * @param string $body    Email body.
 * @return string Mailto URL.
 */
if (!function_exists('catena_estates_mailto_link')) {
    function catena_estates_mailto_link(string $email, string $subject = '', string $body = ''): string {
        $params = [];
        
        if (!empty($subject)) {
            $params['subject'] = $subject;
        }
        
        if (!empty($body)) {
            $params['body'] = $body;
        }
        
        $query = !empty($params) ? '?' . http_build_query($params) : '';
        
        return 'mailto:' . sanitize_email($email) . $query;
    }
}

/**
 * Check if current page is the front page
 *
 * @return bool True if front page.
 */
if (!function_exists('catena_estates_is_front_page')) {
    function catena_estates_is_front_page(): bool {
        return is_front_page() || is_home();
    }
}

/**
 * Get theme asset URL
 *
 * @param string $path Relative path to asset.
 * @return string Full URL to asset.
 */
if (!function_exists('catena_estates_asset_url')) {
    function catena_estates_asset_url(string $path): string {
        return CATENA_ESTATES_URI . '/assets/' . ltrim($path, '/');
    }
}

/**
 * Get theme asset path
 *
 * @param string $path Relative path to asset.
 * @return string Full path to asset.
 */
if (!function_exists('catena_estates_asset_path')) {
    function catena_estates_asset_path(string $path): string {
        return CATENA_ESTATES_DIR . '/assets/' . ltrim($path, '/');
    }
}

/**
 * Output responsive image with lazy loading
 *
 * @param int|string $image      Image ID or URL.
 * @param string     $size       Image size.
 * @param array      $attributes Additional attributes.
 * @return void
 */
if (!function_exists('catena_estates_responsive_image')) {
    function catena_estates_responsive_image($image, string $size = 'large', array $attributes = []): void {
        $defaults = [
            'loading' => 'lazy',
            'decoding' => 'async',
        ];
        
        $attributes = wp_parse_args($attributes, $defaults);
        
        if (is_numeric($image)) {
            echo wp_get_attachment_image($image, $size, false, $attributes);
        } elseif (is_string($image) && !empty($image)) {
            $attr_string = '';
            foreach ($attributes as $key => $value) {
                $attr_string .= sprintf(' %s="%s"', esc_attr($key), esc_attr($value));
            }
            printf('<img src="%s"%s />', esc_url($image), $attr_string);
        }
    }
}

/**
 * Sanitize phone number for tel: links
 *
 * @param string $phone Phone number.
 * @return string Sanitized phone number.
 */
if (!function_exists('catena_estates_sanitize_phone')) {
    function catena_estates_sanitize_phone(string $phone): string {
        return preg_replace('/[^0-9+]/', '', $phone);
    }
}
