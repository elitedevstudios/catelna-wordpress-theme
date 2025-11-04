### Editable via ACF
- Hero text + image
- CTA labels + mailto links
- SEO title + meta description
- JSON-LD snippets

### Hardcoded in Theme
- Unit designs
- Features & Perks list
- Developer legacy
- Footer content
- Contact email

---

## 6) Technical Architecture

### Platform
- **CMS:** WordPress 6.x
- **Theme:** Fully custom PHP
- **Content Editing:** ACF (non-Pro)
- **Contact:** `mailto:` only

### Plugins
- [ACF (non-Pro)](https://wordpress.org/plugins/advanced-custom-fields/)
- [SEOPress](https://wordpress.org/plugins/wp-seopress/)
- [Seraphinite Accelerator](https://wordpress.org/plugins/seraphinite-accelerator/)
- [Wordfence Security](https://wordpress.org/plugins/wordfence/)
- [Site Kit by Google](https://wordpress.org/plugins/google-site-kit/)

### Hosting Assumptions
- PHP 8+ supported
- HTTPS enabled
- Domain ready before launch

---

## 7) UX & Design

- Image-driven, aspirational visual style
- Scroll-based narrative (section-based layout)
- Responsive: mobile-first, adaptive grids
- Typography: premium serif headers, clean body text
- Touch-friendly CTA buttons
- Same section order as original PRD

---

## 8) Analytics & SEO

### GA4 Tracking (via Site Kit)
- Pageviews
- CTA clicks (`mailto:` links)
- Devices
- Session time, bounce rate

### SEO (via SEOPress)
- Meta titles + descriptions
- Open Graph + Twitter cards
- Structured data (JSON-LD)
- Sitemap + robots.txt

---

## 9) QA, Testing & Launch

### Testing Requirements
- ✅ Mobile + desktop views
- ✅ Mailto links tested
- ✅ Metadata visible
- ✅ Structured data validated
- ✅ Page loads <2s broadband, <3s 4G
- ✅ Accessibility: alt text, tab nav, contrast

### Launch Tasks
- Theme upload + activate
- Populate ACF fields
- Configure SEO + analytics
- Point DNS to hosting

---

## 10) Post-Launch & Maintenance

- Weekly plugin updates
- Wordfence alert monitoring
- Image/media cleanup
- A/B test CTA text (Phase 2)
- Manual updates to hardcoded sections
- Optional Phase 2:
  - Contact form
  - CRM/email API
  - Image/video gallery
  - Virtual tour

---

**Status:** Ready for development kickoff  
**Next Review:** After theme scaffolding + ACF fields setup