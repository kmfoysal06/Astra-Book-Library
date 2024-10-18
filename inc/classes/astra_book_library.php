<?php
/**
 * Bootstraps The Theme
 * @package Book Library
 */

namespace ASTRA_BOOK_LIBRARY\Inc\Classes; 
use ASTRA_BOOK_LIBRARY\Inc\Traits\Singletone;
class Astra_Book_Library{
    use Singletone;
    public function __construct(){
        /**
         * Load Classes
         */
        Assets::get_instance();
        Menus::get_instance();
        Books::get_instance();
        Customizer::get_instance();
        $this->setup_hooks();
    }

    protected function setup_hooks(){
        /**
         * Actions.
         */
        add_action('after_setup_theme', [$this,'astra_book_library_after_setup_theme']);
        
    }

    public function astra_book_library_after_setup_theme() {
        // Add theme support
        add_theme_support('post-thumbnails');
        add_theme_support('title-tag');
        add_theme_support('automatic-feed-links');
        add_theme_support('html5', array(
            'style',
            'script',
            'navigation-widgets'
        ));
        add_theme_support('custom-logo', array(
            'height'      => 240,
            'width'       => 1080,
            'flex-width'  => true,
            'flex-height' => true,
        ));
        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support('responsive-embeds');
        add_theme_support('wp-block-styles');
        add_theme_support('align-wide');
        add_theme_support( 'editor-styles' );
    }
}