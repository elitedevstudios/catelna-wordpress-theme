# Catena Estates at Drax WordPress Theme

A premium, single-page WordPress theme for Catena Estates at Drax, a luxury residential development in St. Ann, Jamaica. This theme showcases the 135-unit estate with ocean views, modern amenities, and gated security.

## Features

### 🎨 Design & UX
- **Single-page layout** with smooth scrolling navigation
- **Image-driven design** with luxury aesthetics
- **Mobile-first responsive design** optimized for all devices
- **Accessibility-ready** with WCAG 2.2 AA compliance
- **Premium typography** with serif headers and clean body text

### 🚀 Performance
- **Lazy loading** for images to improve page speed
- **Optimized assets** with proper caching headers
- **Minimal HTTP requests** with combined and minified assets
- **Fast loading times** (<2s broadband, <3s 4G)

### 📧 Contact Integration
- **AJAX contact form** with email integration
- **Pre-filled email templates** for mailto links
- **Form validation** with client-side and server-side checks
- **Email sent to**: infodraxhallltd@gmail.com

### 🛠️ Technical Features
- **ACF integration** with standard naming conventions
- **SEO optimized** with meta tags and structured data
- **Security hardened** with proper sanitization and nonces
- **WordPress standards compliant** following coding best practices

## Installation

1. **Upload the theme**
   - Download the theme files
   - Upload to `/wp-content/themes/catena-estates/` directory
   - Or install via WordPress admin: Appearance → Themes → Add New

2. **Activate the theme**
   - Go to Appearance → Themes
   - Find "Catena Estates at Drax" and click "Activate"

3. **Install required plugins**
   - **ACF (Advanced Custom Fields)** - Free version required
   - **SEOPress** - For SEO management
   - **Seraphinite Accelerator** - For performance optimization
   - **Wordfence Security** - For security
   - **Site Kit by Google** - For analytics

4. **Configure ACF fields**
   - ACF fields are automatically registered
   - Go to WordPress Admin → Theme Settings
   - Populate all content sections with your data

## Theme Structure

```
catena-estates/
├── assets/
│   ├── css/
│   │   ├── editor-style.css     # Gutenberg editor styles
│   │   └── (compiled CSS goes here)
│   ├── js/
│   │   ├── main.js              # Main theme JavaScript
│   │   ├── lazy-load.js         # Lazy loading functionality
│   │   └── contact-form.js      # Contact form handler
│   └── images/                  # Theme images and icons
├── includes/                    # PHP includes (custom post types, etc.)
├── templates/
│   └── sections/                # Single-page section templates
│       ├── hero.php
│       ├── introduction.php
│       ├── value-proposition.php
│       ├── unit-info.php
│       ├── features.php
│       ├── legacy.php
│       ├── contact-form.php
│       └── closing-cta.php
├── acf-fields/                  # ACF field definitions
├── languages/                   # Translation files
├── 404.php                      # 404 error page
├── footer.php                   # Site footer
├── functions.php                # Theme functions
├── header.php                   # Site header
├── index.php                    # Main template
├── search.php                   # Search results
├── style.css                    # Main stylesheet
└── README.md                    # This file
```

## ACF Field Groups

The theme uses the following ACF field groups (all accessible via Theme Settings):

### Hero Section
- Background Image
- Headline
- Subheading
- CTA Button Text

### Introduction Section
- Content (WYSIWYG)
- Supporting Image

### Value Proposition Section
- Content (WYSIWYG)
- Full-width Image

### Unit Information Section
- Content (WYSIWYG)
- Vista Design Image
- Siesta Design Image

### Features & Perks Section
- Section Title
- Features List (Repeater with icon and text)
- Feature Images (Gallery)

### Developer Legacy Section
- Section Title
- Legacy Content (WYSIWYG)
- Portfolio CTA Text
- Portfolio URL
- Past Projects (Repeater)

### Closing CTA Section
- Section Title
- Content (WYSIWYG)
- Primary CTA Text
- Secondary CTA Text

### Contact Information
- Email Address
- Phone Number
- Address
- Email Subject Line
- Email Template

### SEO Settings
- Meta Title
- Meta Description
- JSON-LD Schema

## Content Population

### Required Images
- Hero background (large, high-resolution)
- Introduction supporting image
- Value proposition full-width image
- Vista and Siesta unit design images
- Feature gallery images (3-8 images)
- Legacy project images

### Default Content
The theme includes sensible defaults for all content fields. Replace with your specific content for Catena Estates at Drax.

## Contact Form

The contact form includes:
- Name (required)
- Email (required)
- Phone (optional)
- Interest checkboxes (site visit, more info, speak to representative)
- Message (optional)

Form submissions are sent via AJAX to `infodraxhallltd@gmail.com` with proper validation and error handling.

## Performance Optimization

### Implemented Optimizations
- **Lazy loading** for all images
- **Font preloading** for critical fonts
- **Resource hints** for external domains
- **Deferred JavaScript** loading
- **Optimized asset loading** with proper dependencies

### Recommended Hosting
- PHP 7.4+
- HTTPS enabled
- CDN integration recommended

## Security Features

- **Input sanitization** on all form submissions
- **Nonce verification** for AJAX requests
- **Security headers** added via functions.php
- **WordPress version** removed from head
- **Secure external links** with proper attributes

## Browser Support

- Chrome/Edge 88+
- Firefox 85+
- Safari 14+
- Mobile browsers (iOS Safari, Chrome Mobile)

## Accessibility

- **WCAG 2.2 AA compliant**
- **Keyboard navigation** support
- **Screen reader** compatibility
- **High contrast** support
- **Focus indicators** on interactive elements
- **Skip to content** link

## Development

### Build Process
```bash
# Install dependencies (if using build tools)
npm install

# Compile assets (if applicable)
npm run build

# Watch for changes (if applicable)
npm run watch
```

### Customization
- Modify ACF field groups in `acf-fields/field-groups.php`
- Add custom CSS in `assets/css/custom.css`
- Extend functionality in `includes/custom-functions.php`

## Support

For support or customizations:
- Check the WordPress Codex
- Review ACF documentation
- Contact the theme developer

## Changelog

### Version 1.0.0
- Initial release
- Single-page layout implementation
- ACF integration
- Contact form with AJAX
- Performance optimizations
- Responsive design
- Accessibility compliance

## License

This theme is licensed under GPL v2 or later.

## Credits

- **Font Awesome** - Icons (via CDN)
- **Google Fonts** - Typography (Inter, Georgia)
- **WordPress** - CMS platform
- **ACF** - Content management
