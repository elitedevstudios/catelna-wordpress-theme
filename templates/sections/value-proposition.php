<?php
/**
 * Value Proposition Section Template
 *
 * @package CatenaEstates
 */

$value_prop_content = catena_estates_get_field('value_prop_content');
$value_prop_image = catena_estates_get_field('value_prop_image');
?>

<section id="value-proposition" class="section">
    <div class="full-width-image" style="background-image: url('<?php echo esc_url($value_prop_image); ?>');">
        <div class="container">
            <div class="section-content">
                <?php echo wp_kses_post($value_prop_content); ?>
            </div>
        </div>
    </div>
</section>
