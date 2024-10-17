<?php
/**
 *  Books Archive Template
 * @package Book Library
 *  */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
get_header();

$saved_value = get_post_meta(get_the_ID(),'__astra_library_book_info',true);

$book_description = isset($saved_value['book_description']) ? $saved_value['book_description'] : 'No Description';
$book_author = isset($saved_value['book_author']) ? $saved_value['book_author'] : 'Unknown Author';
$book_publisher = isset($saved_value['book_publisher']) ? $saved_value['book_publisher'] : 'Unknown Publisher';
$book_publish_date = isset($saved_value['book_publish_date']) ? $saved_value['book_publish_date'] : 'Unknown Publish Date';


?>
<div class="container">
	<h1>All Books</h1>
<div class="book-grid">
<?php
if(have_posts()):while(have_posts()):the_post();
?>
<a href="<?php echo get_the_permalink(); ?>">
<div class="book-card">
    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
    <div class="book-details">
        <h2><?php the_title(); ?></h2>
        <p><strong>Description:</strong> <?php echo $book_description; ?></p>
        <p><strong>Author:</strong> <?php echo $book_author; ?></p>
        <p><strong>Publisher:</strong> <?php echo $book_publisher; ?></p>
        <p><strong>Publish Date:</strong> <?php echo $book_publish_date; ?></p>
    </div>
</div>
</a>

<?php endwhile; endif;?>
</div>
</div>
<?php get_footer(); ?>