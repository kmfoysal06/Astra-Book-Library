<?php 
/**
 * Footer Naviagation Menu Template
 * @package Book Library
 */
$nav = ASTRA_BOOK_LIBRARY\Inc\Classes\Menus::get_instance();

?>
<nav class="astra-book-library-navbar-footer">
  <div class="astra-book-library-navbar-footer-inner">
    <div class="astra-book-library-navbar-footer-menu">
    <?php 
		$nav->wp_nav_menu("astra_book_library_menu__footer_primary",'footer-primary');
     ?>
    </div>
  </div>
</nav>