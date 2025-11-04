<?php
/**
 * Parallax Break Section (visual separator, no text)
 *
 * @package CatenaEstates
 */
?>

<?php
// Fixed parallax background image (interior render)
$images_dir_uri = get_template_directory_uri() . '/assets/images/';
$bg_url  = esc_url($images_dir_uri . 'Catena Render Interior 14.13.46@2x.jpg');
?>

<section id="parallax-break" class="section parallax-break" aria-hidden="true" style="background-image: url('<?php echo $bg_url; ?>');">
    <div class="parallax-overlay"></div>
</section>


