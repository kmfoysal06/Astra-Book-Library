<?php
/**
 *  All Function and Hook Registrations Here
 * @package Book Library
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
if (!defined("ASTRA_BOOK_LIBRARY_DIR_PATH")) {
    define("ASTRA_BOOK_LIBRARY_DIR_PATH", untrailingslashit(get_stylesheet_directory()));
}
if (!defined("ASTRA_BOOK_LIBRARY_DIR_URI")) {
    define("ASTRA_BOOK_LIBRARY_DIR_URI", untrailingslashit(get_stylesheet_directory_uri()));
}
require_once ASTRA_BOOK_LIBRARY_DIR_PATH . '/inc/helpers/autoload.php';
require_once ASTRA_BOOK_LIBRARY_DIR_PATH . '/inc/helpers/template-tags.php';

function astra_book_library_get_instance(){
    return ASTRA_BOOK_LIBRARY\Inc\Classes\Astra_Book_Library::get_instance();
}
astra_book_library_get_instance();