<?php
/**
 * ACF Field Groups for Catena Estates Theme
 * Standard naming conventions for all field groups
 */

// Hero Section Fields
acf_add_local_field_group(array(
    'key' => 'group_hero_section',
    'title' => 'Hero Section',
    'fields' => array(
        array(
            'key' => 'field_hero_background_image',
            'label' => 'Background Image',
            'name' => 'hero_background_image',
            'type' => 'image',
            'instructions' => 'Large hero image showcasing mountain/ocean views',
            'required' => 1,
            'return_format' => 'url',
            'preview_size' => 'large',
            'library' => 'all',
        ),
        array(
            'key' => 'field_hero_headline',
            'label' => 'Headline',
            'name' => 'hero_headline',
            'type' => 'text',
            'instructions' => 'Main headline text',
            'default_value' => 'Welcome to Catena Estates at Drax',
            'required' => 1,
        ),
        array(
            'key' => 'field_hero_subheading',
            'label' => 'Subheading',
            'name' => 'hero_subheading',
            'type' => 'textarea',
            'instructions' => 'Supporting subheading text',
            'default_value' => 'Here\'s Your Opportunity to Own a Piece of Jamaican Paradise.',
            'required' => 1,
            'rows' => 3,
        ),
        array(
            'key' => 'field_hero_cta_text',
            'label' => 'CTA Button Text',
            'name' => 'hero_cta_text',
            'type' => 'text',
            'instructions' => 'Text for the primary CTA button',
            'default_value' => 'I\'m Interested',
            'required' => 1,
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'theme-general-settings',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => 'Hero section content and settings',
));

// Introduction Section Fields
acf_add_local_field_group(array(
    'key' => 'group_introduction_section',
    'title' => 'Introduction Section',
    'fields' => array(
        array(
            'key' => 'field_intro_content',
            'label' => 'Content',
            'name' => 'intro_content',
            'type' => 'wysiwyg',
            'instructions' => 'Introduction paragraph content',
            'default_value' => 'Catena Estates at Drax offers a unique opportunity to invest in one of the most exciting and sought after real estate projects on Jamaica\'s breathtaking North Coast, located in St. Ann.',
            'required' => 1,
            'tabs' => 'all',
            'toolbar' => 'basic',
            'media_upload' => 0,
        ),
        array(
            'key' => 'field_intro_image',
            'label' => 'Supporting Image',
            'name' => 'intro_image',
            'type' => 'image',
            'instructions' => 'Aerial or landscape view image',
            'required' => 1,
            'return_format' => 'url',
            'preview_size' => 'medium',
            'library' => 'all',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'theme-general-settings',
            ),
        ),
    ),
    'menu_order' => 1,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => 'Introduction section content',
));

// Value Proposition Section Fields
acf_add_local_field_group(array(
    'key' => 'group_value_proposition_section',
    'title' => 'Value Proposition Section',
    'fields' => array(
        array(
            'key' => 'field_value_prop_content',
            'label' => 'Content',
            'name' => 'value_prop_content',
            'type' => 'wysiwyg',
            'instructions' => 'Value proposition paragraph content',
            'default_value' => 'Set against a backdrop of majestic mountain and ocean views, cool Trade Wind breezes, and lush tropical beauty, Catena Estates at Drax offers the perfect blend of serenity, convenience, and prestige.',
            'required' => 1,
            'tabs' => 'all',
            'toolbar' => 'basic',
            'media_upload' => 0,
        ),
        array(
            'key' => 'field_value_prop_image',
            'label' => 'Full-width Image',
            'name' => 'value_prop_image',
            'type' => 'image',
            'instructions' => 'Large mountain/ocean panorama image',
            'required' => 1,
            'return_format' => 'url',
            'preview_size' => 'large',
            'library' => 'all',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'theme-general-settings',
            ),
        ),
    ),
    'menu_order' => 2,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => 'Value proposition section content',
));

// Unit Information Section Fields
acf_add_local_field_group(array(
    'key' => 'group_unit_info_section',
    'title' => 'Unit Information Section',
    'fields' => array(
        array(
            'key' => 'field_unit_info_content',
            'label' => 'Content',
            'name' => 'unit_info_content',
            'type' => 'wysiwyg',
            'instructions' => 'Unit information content',
            'default_value' => 'This exclusive community features 135 designed units, with 3 bedrooms and 3 bathrooms; thoughtfully planned for comfort, style, and Caribbean living.',
            'required' => 1,
            'tabs' => 'all',
            'toolbar' => 'basic',
            'media_upload' => 0,
        ),
        array(
            'key' => 'field_vista_design_image',
            'label' => 'Vista Design Image (2-storey)',
            'name' => 'vista_design_image',
            'type' => 'image',
            'instructions' => 'Image showing the Vista unit design',
            'required' => 1,
            'return_format' => 'url',
            'preview_size' => 'medium',
            'library' => 'all',
        ),
        array(
            'key' => 'field_siesta_design_image',
            'label' => 'Siesta Design Image (single-storey)',
            'name' => 'siesta_design_image',
            'type' => 'image',
            'instructions' => 'Image showing the Siesta unit design',
            'required' => 1,
            'return_format' => 'url',
            'preview_size' => 'medium',
            'library' => 'all',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'theme-general-settings',
            ),
        ),
    ),
    'menu_order' => 3,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => 'Unit information and design images',
));

// Features & Perks Section Fields
acf_add_local_field_group(array(
    'key' => 'group_features_section',
    'title' => 'Features & Perks Section',
    'fields' => array(
        array(
            'key' => 'field_features_title',
            'label' => 'Section Title',
            'name' => 'features_title',
            'type' => 'text',
            'instructions' => 'Title for the features section',
            'default_value' => 'Features & Perks',
            'required' => 1,
        ),
        array(
            'key' => 'field_features_list',
            'label' => 'Features List',
            'name' => 'features_list',
            'type' => 'repeater',
            'instructions' => 'Add each feature with icon and description',
            'required' => 1,
            'min' => 8,
            'max' => 12,
            'layout' => 'table',
            'button_label' => 'Add Feature',
            'sub_fields' => array(
                array(
                    'key' => 'field_feature_icon',
                    'label' => 'Icon Class',
                    'name' => 'icon',
                    'type' => 'text',
                    'instructions' => 'CSS class for the feature icon (e.g., fa-mountain, fa-umbrella-beach)',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_feature_text',
                    'label' => 'Feature Text',
                    'name' => 'text',
                    'type' => 'text',
                    'instructions' => 'Description of the feature',
                    'required' => 1,
                ),
            ),
        ),
        array(
            'key' => 'field_features_gallery',
            'label' => 'Feature Images',
            'name' => 'features_gallery',
            'type' => 'gallery',
            'instructions' => 'Images showing amenities, location map, etc.',
            'required' => 1,
            'min' => 3,
            'max' => 8,
            'insert' => 'append',
            'library' => 'all',
            'mime_types' => '',
            'return_format' => 'url',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'theme-general-settings',
            ),
        ),
    ),
    'menu_order' => 4,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => 'Features and perks content',
));

// Developer Legacy Section Fields
acf_add_local_field_group(array(
    'key' => 'group_legacy_section',
    'title' => 'Developer Legacy Section',
    'fields' => array(
        array(
            'key' => 'field_legacy_title',
            'label' => 'Section Title',
            'name' => 'legacy_title',
            'type' => 'text',
            'instructions' => 'Title for the legacy section',
            'default_value' => 'A Vision by Drax Hall Limited',
            'required' => 1,
        ),
        array(
            'key' => 'field_legacy_content',
            'label' => 'Legacy Content',
            'name' => 'legacy_content',
            'type' => 'wysiwyg',
            'instructions' => 'Developer legacy and history content',
            'default_value' => 'With over 30 years of trusted experience, Drax Hall Limited continues to shape the future of real estate in St. Ann...',
            'required' => 1,
            'tabs' => 'all',
            'toolbar' => 'basic',
            'media_upload' => 0,
        ),
        array(
            'key' => 'field_portfolio_cta_text',
            'label' => 'Portfolio CTA Text',
            'name' => 'portfolio_cta_text',
            'type' => 'text',
            'instructions' => 'Text for the portfolio link button',
            'default_value' => 'View Our Portfolio',
            'required' => 1,
        ),
        array(
            'key' => 'field_portfolio_url',
            'label' => 'Portfolio URL',
            'name' => 'portfolio_url',
            'type' => 'url',
            'instructions' => 'URL to the Drax Hall portfolio page',
            'default_value' => 'https://draxhallja.com/projects/',
            'required' => 1,
        ),
        array(
            'key' => 'field_legacy_projects',
            'label' => 'Past Projects',
            'name' => 'legacy_projects',
            'type' => 'repeater',
            'instructions' => 'Add past development projects',
            'required' => 1,
            'min' => 4,
            'max' => 10,
            'layout' => 'table',
            'button_label' => 'Add Project',
            'sub_fields' => array(
                array(
                    'key' => 'field_project_name',
                    'label' => 'Project Name',
                    'name' => 'name',
                    'type' => 'text',
                    'instructions' => 'Name of the development project',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_project_description',
                    'label' => 'Description',
                    'name' => 'description',
                    'type' => 'textarea',
                    'instructions' => 'Brief description of the project',
                    'required' => 1,
                    'rows' => 2,
                ),
                array(
                    'key' => 'field_project_image',
                    'label' => 'Project Image',
                    'name' => 'image',
                    'type' => 'image',
                    'instructions' => 'Image representing the project',
                    'required' => 1,
                    'return_format' => 'url',
                    'preview_size' => 'medium',
                    'library' => 'all',
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'theme-general-settings',
            ),
        ),
    ),
    'menu_order' => 5,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => 'Developer legacy and portfolio content',
));

// Closing CTA Section Fields
acf_add_local_field_group(array(
    'key' => 'group_closing_cta_section',
    'title' => 'Closing CTA Section',
    'fields' => array(
        array(
            'key' => 'field_closing_title',
            'label' => 'Section Title',
            'name' => 'closing_title',
            'type' => 'text',
            'instructions' => 'Title for the closing section',
            'default_value' => 'Make Catena At Drax Your New Home',
            'required' => 1,
        ),
        array(
            'key' => 'field_closing_content',
            'label' => 'Content',
            'name' => 'closing_content',
            'type' => 'wysiwyg',
            'instructions' => 'Closing section content',
            'default_value' => 'This is more than just real estate, it\'s a smart investment...',
            'required' => 1,
            'tabs' => 'all',
            'toolbar' => 'basic',
            'media_upload' => 0,
        ),
        array(
            'key' => 'field_closing_cta_primary_text',
            'label' => 'Primary CTA Text',
            'name' => 'closing_cta_primary_text',
            'type' => 'text',
            'instructions' => 'Text for the primary CTA button',
            'default_value' => 'Contact Us',
            'required' => 1,
        ),
        array(
            'key' => 'field_closing_cta_secondary_text',
            'label' => 'Secondary CTA Text',
            'name' => 'closing_cta_secondary_text',
            'type' => 'text',
            'instructions' => 'Text for the secondary CTA button',
            'default_value' => 'Schedule a Site Visit',
            'required' => 1,
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'theme-general-settings',
            ),
        ),
    ),
    'menu_order' => 6,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => 'Closing CTA section content',
));

// Contact Information Fields
acf_add_local_field_group(array(
    'key' => 'group_contact_information',
    'title' => 'Contact Information',
    'fields' => array(
        array(
            'key' => 'field_contact_email',
            'label' => 'Email Address',
            'name' => 'contact_email',
            'type' => 'email',
            'instructions' => 'Primary contact email for inquiries',
            'default_value' => 'infodraxhallltd@gmail.com',
            'required' => 1,
        ),
        array(
            'key' => 'field_contact_phone',
            'label' => 'Phone Number',
            'name' => 'contact_phone',
            'type' => 'text',
            'instructions' => 'Contact phone number',
            'required' => 1,
        ),
        array(
            'key' => 'field_contact_address',
            'label' => 'Address',
            'name' => 'contact_address',
            'type' => 'textarea',
            'instructions' => 'Physical address',
            'required' => 1,
            'rows' => 3,
        ),
        array(
            'key' => 'field_email_subject',
            'label' => 'Email Subject Line',
            'name' => 'email_subject',
            'type' => 'text',
            'instructions' => 'Default subject line for email inquiries',
            'default_value' => 'I\'m interested in viewing Catena Estates at Drax',
            'required' => 1,
        ),
        array(
            'key' => 'field_email_template',
            'label' => 'Email Template',
            'name' => 'email_template',
            'type' => 'textarea',
            'instructions' => 'Pre-filled email template for inquiries',
            'default_value' => 'Dear Drax Hall Team,

I am interested in learning more about Catena Estates at Drax and would like to:
[ ] Schedule a site visit
[ ] Receive more information
[ ] Speak with a representative

Name:
Phone:
Email:
Message:

Best regards',
            'required' => 1,
            'rows' => 12,
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'theme-general-settings',
            ),
        ),
    ),
    'menu_order' => 7,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => 'Contact information and email settings',
));

// SEO Settings
acf_add_local_field_group(array(
    'key' => 'group_seo_settings',
    'title' => 'SEO Settings',
    'fields' => array(
        array(
            'key' => 'field_meta_title',
            'label' => 'Meta Title',
            'name' => 'meta_title',
            'type' => 'text',
            'instructions' => 'Page title for SEO (50-60 characters)',
            'default_value' => 'Catena Estates at Drax | Luxury Living in St. Ann, Jamaica',
            'required' => 1,
            'maxlength' => 60,
        ),
        array(
            'key' => 'field_meta_description',
            'label' => 'Meta Description',
            'name' => 'meta_description',
            'type' => 'textarea',
            'instructions' => 'Page description for SEO (150-160 characters)',
            'default_value' => 'Discover Catena Estates at Drax: 135 luxury units with ocean views, modern amenities, and gated security on Jamaica\'s North Coast. By Drax Hall Limited.',
            'required' => 1,
            'rows' => 3,
            'maxlength' => 160,
        ),
        array(
            'key' => 'field_json_ld_schema',
            'label' => 'JSON-LD Schema',
            'name' => 'json_ld_schema',
            'type' => 'textarea',
            'instructions' => 'Custom JSON-LD structured data for rich snippets',
            'rows' => 10,
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'theme-general-settings',
            ),
        ),
    ),
    'menu_order' => 8,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => 'SEO meta tags and structured data',
));
