<?php
/**
 * Customize Controlls
 * @package Book Library
 */

namespace ASTRA_BOOK_LIBRARY\Inc\Classes; 
use ASTRA_BOOK_LIBRARY\Inc\Traits\Singletone;
class Customizer{
    use Singletone;
    public function __construct(){
        /**
         * Load Classes
         */
        $this->setup_hooks();
    }

    protected function setup_hooks(){
        /**
         * Actions.
         */
        add_action('customize_register', [$this,'customize_register']);
        
    }

    public function customize_register($wp_customize) {
        $wp_customize->add_section('astra_book_library_home', array(
            'title'    => __("Home Page Customizer", "book-library-astra-kmfoysal06"),
            'priority' => 30,
        ));
    
        $wp_customize->add_setting('astra_book_library_home_paragraph', array(
            'default'           => __("Welcome to My Library, your personal hub for discovering the most popular tech and science books. Here, I provide detailed information on books covering cutting-edge topics like artificial intelligence, space exploration, biotechnology, and more. Each book in My Library includes essential details such as the author, publisher, publication date, and a brief overview to help you choose the perfect read.", "book-library-astra-kmfoysal06"),
            'sanitize_callback' => 'wp_kses_post',
        ));
    
        $wp_customize->add_control('home_page_text', array(
            'label'    => __('Home Page Texts', 'book-library-astra-kmfoysal06'),
            'section'  => 'astra_book_library_home',
            'settings' => 'astra_book_library_home_paragraph',
            'type'     => 'textarea',
        ));
    }
}