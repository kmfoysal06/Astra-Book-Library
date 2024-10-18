<?php
/**
 *  Books Archive Template
 * @package Book Library
 *  */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
get_header();

?>
<div class="container">
	<h1>All Books</h1>
<div class="book-grid">
<?php
if(have_posts()):while(have_posts()):the_post();

    $saved_value = get_post_meta(get_the_ID(),'__astra_library_book_info',true);
    $book_description = isset($saved_value['book_description']) ? $saved_value['book_description'] : 'No Description';
    $book_author = isset($saved_value['book_author']) ? $saved_value['book_author'] : 'Unknown Author';

    if(has_post_thumbnail()){
        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID());
    }else{
        $thumbnail_url = ASTRA_BOOK_LIBRARY_DIR_URI . '/assets/build/img/book-cover-placeholder.png';
    }

?>
<a href="<?php echo get_the_permalink(); ?>">
<div class="book-card">
    <img src="<?php echo $thumbnail_url; ?>" alt="">
    <div class="book-details">
        <h2><?php echo substr(get_the_title(),0,30); ?><?php if(strlen(get_the_title()) > 30) echo '..' ; ?></h2>
        <p><strong>Description:</strong> <?php echo $book_description; ?></p>
        <p><strong>Author:</strong> <?php echo $book_author; ?></p>
    </div>
</div>
</a>

<?php endwhile; endif;?>
</div>
</div>
<?php get_footer(); ?>