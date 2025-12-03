# AGENTS.md

> A guide for AI coding agents working on the **Catena Estates at Drax** WordPress theme.

## Project Overview

**Catena Estates at Drax** is a premium, single-page WordPress theme for a luxury 135-unit residential development in St. Ann, Jamaica. The theme emphasizes image-driven design, accessibility (WCAG 2.2 AA), and performance (<2s load time).

- **CMS:** WordPress 6.x
- **Theme Type:** Fully custom PHP (no page builders)
- **Content Management:** ACF (Advanced Custom Fields) - Free version
- **Contact:** AJAX form + mailto fallback
- **Author:** Christopher Smikle

---

## Dev Environment Setup

### Local Development
```bash
# Using Local by Flywheel (recommended)
# Site path: /Users/christophersmikle/Local Sites/catena-winsurf/

# Theme directory
cd app/public/wp-content/themes/drax-realestate-theme
```

### Requirements
- **PHP:** 8.0+ (strict typing enabled)
- **WordPress:** 6.x (tested up to 6.6)
- **Node.js:** For asset compilation (if using build tools)

### Required Plugins
- [ACF (non-Pro)](https://wordpress.org/plugins/advanced-custom-fields/)
- [SEOPress](https://wordpress.org/plugins/wp-seopress/)
- [Seraphinite Accelerator](https://wordpress.org/plugins/seraphinite-accelerator/)
- [Wordfence Security](https://wordpress.org/plugins/wordfence/)
- [Site Kit by Google](https://wordpress.org/plugins/google-site-kit/)

---

## Project Structure

```
drax-realestate-theme/
├── .cursor/
│   └── commands/             # Cursor IDE command files
├── acf-fields/
│   └── field-groups.php      # ACF field definitions (auto-registered)
├── assets/
│   ├── css/
│   │   └── editor-style.css  # Gutenberg editor styles
│   ├── fonts/                # Custom fonts
│   ├── images/               # Theme images/icons
│   └── js/
│       ├── main.js           # Core theme JS (smooth scroll, nav)
│       ├── lazy-load.js      # Image lazy loading
│       └── contact-form.js   # AJAX form handler
├── includes/
│   └── helpers.php           # Utility functions (ACF helpers, icons, mailto)
├── languages/                # i18n translation files
├── templates/
│   ├── partials/             # Reusable template parts
│   └── sections/             # Single-page sections
│       ├── hero.php
│       ├── introduction.php
│       ├── value-proposition.php
│       ├── unit-info.php
│       ├── features.php
│       ├── legacy.php
│       ├── contact-form.php
│       ├── closing-cta.php
│       ├── location-map.php
│       ├── modern-design.php
│       └── parallax-break.php
├── 404.php                   # Error page
├── footer.php                # Site footer
├── functions.php             # Theme setup, hooks, AJAX handlers
├── header.php                # Site header + nav
├── index.php                 # Main template (loads all sections)
├── search.php                # Search results
├── style.css                 # Main stylesheet + theme metadata
├── screenshot.png            # Theme screenshot (WordPress admin)
├── README.md                 # Human-readable documentation
└── AGENTS.md                 # This file (AI agent instructions)
```

---

## Code Style Guidelines

### PHP Standards
- **Strict typing required:** `declare(strict_types=1);`
- Follow [WordPress PHP Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/)
- Use PHP 7.4+ features (typed properties, arrow functions)
- Prefix all functions with `catena_estates_`
- Use hooks (actions/filters) over direct modifications

### CSS Standards (CRITICAL)
- **BEM naming:** `.block__element--modifier`
- **Logical properties required:** Use `margin-inline-start` not `margin-left`
- **Container queries preferred** over media queries for components
- **CSS custom properties** defined in `:root` (see `style.css`)
- Use `oklch()` or `oklab()` for color variations
- Use `clamp()` for fluid typography

### JavaScript
- Vanilla JS preferred (no jQuery dependency)
- Use ES6+ features
- Defer non-critical scripts
- Handle AJAX via `wp_ajax_` hooks

---

## Key Conventions

### ACF Field Access
```php
// Always use options page context
$value = get_field('field_name', 'option');

// With fallback
$headline = get_field('hero_headline', 'option') ?: 'Default Headline';
```

### Template Section Pattern
```php
<?php
// templates/sections/example.php
$field = get_field('example_field', 'option');
if (!$field) return;
?>
<section id="example" class="section section--example">
    <div class="section__container">
        <?php echo esc_html($field); ?>
    </div>
</section>
```

### Security Requirements
- **Escape all output:** `esc_html()`, `esc_attr()`, `esc_url()`, `wp_kses_post()`
- **Sanitize all input:** `sanitize_text_field()`, `sanitize_email()`
- **Verify nonces:** All AJAX/form submissions must use `wp_verify_nonce()`
- **Prepared statements:** Use `$wpdb->prepare()` for queries

### Asset Enqueuing
```php
// Always use wp_enqueue_* functions
wp_enqueue_style('catena-estates-style', get_stylesheet_uri(), [], CATENA_ESTATES_VERSION);
wp_enqueue_script('catena-estates-main', CATENA_ESTATES_URI . '/assets/js/main.js', [], CATENA_ESTATES_VERSION, true);
```

---

## Content Architecture

### Editable via ACF (Theme Settings page)
- Hero text + background image
- CTA labels + mailto links
- SEO title + meta description
- JSON-LD structured data snippets
- Contact information
- Feature lists (repeater fields)

### Hardcoded in Theme
- Unit designs (Vista/Siesta layouts)
- Features & Perks visual layout
- Developer legacy section structure
- Footer content
- Contact email: `infodraxhallltd@gmail.com`

---

## Testing Requirements

### Before Committing
- [ ] Mobile + desktop responsive views tested
- [ ] All mailto links functional
- [ ] Meta tags visible in page source
- [ ] Structured data validated (Google Rich Results Test)
- [ ] Page load <2s broadband, <3s 4G
- [ ] Accessibility: alt text, keyboard nav, color contrast (WCAG AA)

### Validation Commands
```bash
# PHP syntax check
php -l functions.php

# WordPress coding standards (if PHPCS installed)
phpcs --standard=WordPress functions.php

# HTML validation
# Use W3C validator on rendered output
```

---

## Performance Guidelines

- **Images:** Always use lazy loading (`loading="lazy"`)
- **Fonts:** Preload critical fonts, use `font-display: swap`
- **Scripts:** Defer non-critical JS, load in footer
- **CSS:** Avoid `@import`, use `<link>` tags
- **Animations:** Use `transform`/`opacity` only (GPU-accelerated)
- Target: **<2s load on broadband, <3s on 4G**

---

## Accessibility Requirements

- WCAG 2.2 AA compliance mandatory
- All images require meaningful `alt` text
- Focus indicators on all interactive elements
- Skip-to-content link in header
- Support `prefers-reduced-motion`
- Support `prefers-color-scheme` for dark mode
- Never remove focus outlines without alternative

---

## Common Tasks

### Adding a New Section
1. Create `templates/sections/new-section.php`
2. Add ACF fields in `acf-fields/field-groups.php`
3. Include section in `index.php` in correct order
4. Add corresponding CSS in `style.css`

### Modifying ACF Fields
- Edit `acf-fields/field-groups.php`
- Fields auto-register on theme activation
- Access via WordPress Admin → Theme Settings

### Updating Contact Email
- Hardcoded in `functions.php` (AJAX handler)
- Also in `templates/sections/contact-form.php`
- Search for: `infodraxhallltd@gmail.com`

---

## Design System Tokens

```css
/* Primary Colors */
--color-sand: #F5F5DC;        /* Cream background */
--color-ocean: #859d9a;       /* Sage green primary */
--color-luxury: #FFD700;      /* Gold accent */
--color-charcoal: #36454F;    /* Text color */

/* Typography */
/* Serif headers, clean sans-serif body */
/* Use clamp() for fluid sizing */
```

---

## Security Considerations

- Never expose WordPress version
- Validate/sanitize all user input
- Use nonces for all form submissions
- Escape all dynamic output
- Keep plugins updated weekly
- Monitor Wordfence alerts

---

## Phase 2 Features (Future)

- Contact form with CRM integration
- Email API integration
- Image/video gallery
- Virtual tour embed
- A/B testing for CTAs

---

## Support Resources

- [WordPress Codex](https://developer.wordpress.org/)
- [ACF Documentation](https://www.advancedcustomfields.com/resources/)
- [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/)
