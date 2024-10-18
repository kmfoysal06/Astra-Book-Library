<?php 
/**
 * Featured Books Template
 * @package Book Library
 */
$featured_posts = new \WP_Query([
	'posts_per_page' => 10,
	'post_type' => 'astra_library_book',
	'tax_query' => [
		[
            'taxonomy' => 'astra_library_book_category',
            'field' => 'slug',
            'terms' => 'featured-books'
        ]
	]
]);

if($featured_posts->found_posts <= 3){
    $slider_container_class = "astra-book-library-slider";
}else{
    $slider_container_class = "astra-book-library-slider astra-book-library-slick-slider";
}

if($featured_posts->have_posts()): ?>
<h3 class="featured">Featured</h3>
    <div class="<?php echo $slider_container_class ?>">
<?php 
while($featured_posts->have_posts()):$featured_posts->the_post();
    if(has_post_thumbnail()){
        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID());
    }else{
        $thumbnail_url = ASTRA_BOOK_LIBRARY_DIR_URI . '/assets/build/img/book-cover-placeholder.png';
    }
    ?>

    <div class="single-book">
        <a href="<?php echo get_the_permalink(); ?>">
            <img src="<?php echo $thumbnail_url; ?>" alt="" width="200px">
            <p><?php the_title(); ?></p>
        </a>
    </div>
    <?php
endwhile; 
?>
</div>
<?php
endif;

wp_reset_postdata();
?>

<a href="/astra_library_book" class="hero-btn">See All Books</a>
