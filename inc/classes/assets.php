<?php
/**
 * Enqueue All Assets
 * @package Book Library
 */
namespace ASTRA_BOOK_LIBRARY\Inc\Classes; 
use ASTRA_BOOK_LIBRARY\Inc\Traits\Singletone;
class Assets{
    use Singletone;
    public function __construct(){
        $this->setup_hooks();
    }

    public function setup_hooks(){
        /**
         * Actions.
         */
        add_action("wp_enqueue_scripts",[$this,"register_styles"]);
        add_action("wp_enqueue_scripts",[$this,"register_scripts"]);
        add_action("admin_enqueue_scripts", [$this, "register_admin_styles"]);
        add_action("admin_enqueue_scripts", [$this, "register_admin_scripts"]);
    }

    public function register_styles(){
    /**
     * Register Main Style
     */
    wp_register_style('astra_book_library_style', get_stylesheet_uri(), array(), filemtime(ASTRA_BOOK_LIBRARY_DIR_PATH.'/style.css'), 'all');
    wp_register_style('astra_book_library_compiled_style', ASTRA_BOOK_LIBRARY_DIR_URI . '/assets/build/css/main.css', array(), filemtime(ASTRA_BOOK_LIBRARY_DIR_PATH . '/assets/build/css/main.css'), 'all');
    wp_register_style('astra_book_library_archive_page', ASTRA_BOOK_LIBRARY_DIR_URI . '/assets/build/css/archive.css', array(), filemtime(ASTRA_BOOK_LIBRARY_DIR_PATH . '/assets/build/css/archive.css'), 'all');
    wp_register_style('astra_book_library_fontawesome_style', ASTRA_BOOK_LIBRARY_DIR_URI . '/assets/build/fontawesome/css/all.min.css', array(), filemtime(ASTRA_BOOK_LIBRARY_DIR_PATH . '/assets/build/fontawesome/css/all.min.css'), 'all');

    wp_register_style('astra_book_library_slider_css', ASTRA_BOOK_LIBRARY_DIR_URI . '/assets/build/css/slider.css', array(), filemtime(ASTRA_BOOK_LIBRARY_DIR_PATH . '/assets/build/css/slider.css'), 'all');
    /**
     * Enqueue Styles
     */
    wp_enqueue_style('astra_book_library_style');
    wp_enqueue_style('astra_book_library_compiled_style');
    
    if(is_home()){
        wp_enqueue_style('astra_book_library_slider_css');
        wp_enqueue_style('astra_book_library_fontawesome_style');
    }
    if(is_archive()){
        wp_enqueue_style('astra_book_library_archive_page');
    }
}
    public function register_scripts(){
    /**
     * Register Search Functionality Script
     */
    wp_register_script('astra_book_library_compiled', ASTRA_BOOK_LIBRARY_DIR_URI . '/assets/build/js/main.js', array(), filemtime(ASTRA_BOOK_LIBRARY_DIR_PATH . '/assets/build/js/main.js'), true);
    wp_register_script('astra_book_library_slider', ASTRA_BOOK_LIBRARY_DIR_URI . '/assets/build/js/slider.js', array('jquery'), filemtime(ASTRA_BOOK_LIBRARY_DIR_PATH . '/assets/build/js/slider.js'), true);

    wp_enqueue_script('astra_book_library_compiled');

    if(is_home()){
        wp_enqueue_script('astra_book_library_slider');
    }

    }

    public function register_admin_styles(){
        wp_register_style('astra_book_library_admin_style', ASTRA_BOOK_LIBRARY_DIR_URI . '/assets/build/css/admin.css', array(), filemtime(ASTRA_BOOK_LIBRARY_DIR_PATH . '/assets/build/css/admin.css'), 'all');
        wp_enqueue_style('astra_book_library_admin_style');
    }

    public function register_admin_scripts(){
        wp_register_script('astra_book_library_admin_script', ASTRA_BOOK_LIBRARY_DIR_URI . '/assets/build/js/admin.js', array(), filemtime(ASTRA_BOOK_LIBRARY_DIR_PATH . '/assets/build/js/admin.js'), true);
        wp_enqueue_script('astra_book_library_admin_script');
    }
}