<?php
/**
 *  Home Page
 * @package Book Library
 *  */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
get_header();

$hero_image = wp_get_attachment_url( get_theme_mod( 'astra_book_library_home_image' ) );

?>
<section id="hero-content">
    <div class="hero-content-inner">
        <div class="hero-image">
            <img src="<?php echo ASTRA_BOOK_LIBRARY_DIR_URI; ?>/assets/build/img/hero_image.png" alt="" width="400px">
        </div>
        <div class="hero-contents">
            <h2>Welcome to My Book Library</h2>
            <p><?php echo (empty(get_theme_mod('astra_book_library_home_paragraph')) ? 'This is A Default Text for This You Can Change This from Your Customizer as A Admin' : get_theme_mod('astra_book_library_home_paragraph')); ?></p>
        </div>
    </div>
    <?php get_template_part('template-parts/components/home/featured-books'); ?>
</section>

<?php get_footer(); ?>