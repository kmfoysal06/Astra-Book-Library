<?php
/**
 *  Home Page
 * @package Book Library
 *  */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
get_header();
?>
<section id="hero-content">
    <div class="hero-content-inner">
        <div class="hero-image">
            <img src="<?php echo ASTRA_BOOK_LIBRARY_DIR_URI; ?>/assets/build/img/hero_image.png" alt="" width="400px">
        </div>
        <div class="hero-contents">
            <h2>Welcome to My Book Library</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, voluptatem ipsa! Autem deserunt iusto rerum, maxime quasi dolorum sapiente eum numquam at modi exercitationem explicabo quisquam officiis ipsum quod, totam enim nesciunt eaque cumque consectetur ab odit! Nobis, laborum, commodi.</p>
        </div>
    </div>
     <h3 class="featured">Featured</h3>
        <div class="astra-book-library-slider">
            <div class="single-book">
                <img src="https://stmatthews.ph/wp-content/uploads/2018/08/Web_The-Little-Hero-Cover.jpg" alt="" width="200px">
                <p>The Little Hero</p>
            </div>
            <div class="single-book">
                <img src="https://stmatthews.ph/wp-content/uploads/2018/08/Web_The-Little-Hero-Cover.jpg" alt="" width="200px">
                <p>The Little Hero</p>
            </div>
            <div class="single-book">
                <img src="https://stmatthews.ph/wp-content/uploads/2018/08/Web_The-Little-Hero-Cover.jpg" alt="" width="200px">
                <p>The Little Hero</p>
            </div>
            <div class="single-book">
                <img src="https://stmatthews.ph/wp-content/uploads/2018/08/Web_The-Little-Hero-Cover.jpg" alt="" width="200px">
                <p>The Little Hero</p>
            </div>
        </div>
        <a href="#" class="hero-btn">See All Books</a>
</section>

<?php get_footer(); ?>