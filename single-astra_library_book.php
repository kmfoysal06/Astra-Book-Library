<?php
/**
 * Single Page Template for Books
 */
get_header();
if(have_posts()):the_post();

$saved_value = get_post_meta(get_the_ID(),'__astra_library_book_info',true);

$book_description = isset($saved_value['book_description']) ? $saved_value['book_description'] : 'No Description';
$book_author = isset($saved_value['book_author']) ? $saved_value['book_author'] : 'Unknown Author';
$book_publisher = isset($saved_value['book_publisher']) ? $saved_value['book_publisher'] : 'Unknown Publisher';
$book_publish_date = isset($saved_value['book_publish_date']) ? $saved_value['book_publish_date'] : 'Unknown Publish Date';


?>
<div class="container">
	<div class="single-book-container">
		<div class="book-image">
			<img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
		</div>
		<div class="book-information">
			<h2><?php the_title(); ?></h2>
			<p><?php echo $book_description; ?></p>
			<p><strong>Author: </strong><?php echo $book_author; ?></p>
			<p><strong>Publisher: </strong><?php echo $book_publisher; ?></p>
			<p><strong>Publish Date: </strong><?php echo $book_publish_date	; ?></p>
		</div>
	</div>
</div>
<?php

endif;
get_footer();