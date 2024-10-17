<?php 
/**
 * Header Naviagation Menu Template
 * @package Book Library
 */
$nav = ASTRA_BOOK_LIBRARY\Inc\Classes\Menus::get_instance();

?>
<nav class="astra-book-library-navbar">
  <div class="astra-book-library-navbar-inner">
        <?php 
	        if(has_custom_logo()){
	            the_custom_logo();
	        }
        ?>
    <div class="astra-book-library-navbar-menu">
    <?php 
		$nav->wp_nav_menu("astra_book_library_menu",'');
     ?>
    </div>
  </div>
</nav>