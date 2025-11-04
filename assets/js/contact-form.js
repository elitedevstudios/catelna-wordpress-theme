/**
 * Catena Estates Theme - Contact Form Handler
 *
 * @package CatenaEstates
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        initContactForm();
    });

    /**
     * Initialize contact form functionality
     */
    function initContactForm() {
        var $form = $('#catena-contact-form');
        var $submitBtn = $form.find('.form-submit');
        var $submitText = $submitBtn.find('.submit-text');
        var $loadingText = $submitBtn.find('.loading-text');
        var $messages = $('#form-messages');

        $form.on('submit', function(e) {
            e.preventDefault();

            // Clear previous messages
            $messages.removeClass('success error').hide();

            // Validate form
            if (!validateForm($form)) {
                return false;
            }

            // Disable form and show loading
            setFormState($form, 'loading');

            // Prepare form data
            var formData = new FormData(this);

            // Send AJAX request
            $.ajax({
                url: catenaEstatesAjax.ajaxurl,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        showMessage('success', response.data);
                        $form[0].reset();
                    } else {
                        showMessage('error', response.data || 'An error occurred. Please try again.');
                    }
                },
                error: function(xhr, status, error) {
                    showMessage('error', 'Connection error. Please check your internet connection and try again.');
                },
                complete: function() {
                    setFormState($form, 'normal');
                }
            });
        });

        /**
         * Validate form fields
         */
        function validateForm($form) {
            var isValid = true;
            var $requiredFields = $form.find('[required]');

            $requiredFields.each(function() {
                var $field = $(this);
                var fieldType = $field.attr('type');
                var value = $field.val().trim();

                // Remove existing errors
                $field.removeClass('error').next('.field-error').remove();

                // Check required fields
                if (!value) {
                    showFieldError($field, 'This field is required.');
                    isValid = false;
                    return;
                }

                // Email validation
                if (fieldType === 'email') {
                    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(value)) {
                        showFieldError($field, 'Please enter a valid email address.');
                        isValid = false;
                    }
                }
            });

            return isValid;
        }

        /**
         * Show field error message
         */
        function showFieldError($field, message) {
            $field.addClass('error');
            $field.after('<span class="field-error">' + message + '</span>');
        }

        /**
         * Set form state (normal/loading/disabled)
         */
        function setFormState($form, state) {
            var $inputs = $form.find('input, textarea, button');

            switch (state) {
                case 'loading':
                    $inputs.prop('disabled', true);
                    $submitBtn.prop('disabled', true);
                    $submitText.hide();
                    $loadingText.show();
                    break;
                case 'normal':
                default:
                    $inputs.prop('disabled', false);
                    $submitBtn.prop('disabled', false);
                    $submitText.show();
                    $loadingText.hide();
                    break;
            }
        }

        /**
         * Show success/error message
         */
        function showMessage(type, message) {
            $messages.removeClass('success error').addClass(type).html(message).show();

            // Auto-hide success messages after 5 seconds
            if (type === 'success') {
                setTimeout(function() {
                    $messages.fadeOut();
                }, 5000);
            }

            // Scroll to messages
            $('html, body').animate({
                scrollTop: $messages.offset().top - 150
            }, 500);
        }
    }

})(jQuery);
