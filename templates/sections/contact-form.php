<?php
/**
 * Contact Form Section Template
 *
 * @package CatenaEstates
 */
?>

<section id="contact-form" class="contact-form-section">
    <div class="container">
        <div class="contact-form-container">
            <h3><?php esc_html_e('Contact Us', 'catena-estates'); ?></h3>
            <p><?php esc_html_e('Ready to learn more about Catena Estates at Drax? Fill out the form below and we\'ll get back to you soon.', 'catena-estates'); ?></p>

            <form id="catena-contact-form" class="contact-form" method="post">
                <div class="form-group">
                    <label for="contact-name"><?php esc_html_e('Name *', 'catena-estates'); ?></label>
                    <input type="text" id="contact-name" name="name" required aria-required="true">
                </div>

                <div class="form-group">
                    <label for="contact-email"><?php esc_html_e('Email *', 'catena-estates'); ?></label>
                    <input type="email" id="contact-email" name="email" required aria-required="true">
                </div>

                <div class="form-group">
                    <label for="contact-phone"><?php esc_html_e('Phone', 'catena-estates'); ?></label>
                    <input type="tel" id="contact-phone" name="phone">
                </div>

                <div class="checkbox-group">
                    <label>
                        <input type="checkbox" name="interests[]" value="schedule_visit">
                        <?php esc_html_e('Schedule a site visit', 'catena-estates'); ?>
                    </label>
                    <label>
                        <input type="checkbox" name="interests[]" value="receive_info">
                        <?php esc_html_e('Receive more information', 'catena-estates'); ?>
                    </label>
                    <label>
                        <input type="checkbox" name="interests[]" value="speak_representative">
                        <?php esc_html_e('Speak with a representative', 'catena-estates'); ?>
                    </label>
                </div>

                <div class="form-group">
                    <label for="contact-message"><?php esc_html_e('Message', 'catena-estates'); ?></label>
                    <textarea id="contact-message" name="message" rows="4" placeholder="<?php esc_attr_e('Tell us about your interest in Catena Estates...', 'catena-estates'); ?>"></textarea>
                </div>

                <input type="hidden" name="action" value="catena_estates_contact">
                <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('catena_estates_contact_nonce'); ?>">

                <button type="submit" class="form-submit">
                    <span class="submit-text"><?php esc_html_e('Send Message', 'catena-estates'); ?></span>
                    <span class="loading-text" style="display: none;">
                        <i class="fas fa-spinner fa-spin" aria-hidden="true"></i>
                        <?php esc_html_e('Sending...', 'catena-estates'); ?>
                    </span>
                </button>
            </form>

            <div id="form-messages" class="form-messages" style="display: none;"></div>
        </div>
    </div>
</section>
