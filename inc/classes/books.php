<?php
/**
 * Books Management
 * @package Book Library
 */

namespace ASTRA_BOOK_LIBRARY\Inc\Classes; 
use ASTRA_BOOK_LIBRARY\Inc\Traits\Singletone;
class Books{
    use Singletone;
    public function __construct(){
        $this->setup_hooks();
    }

    protected function setup_hooks(){
        /**
         * Actions.
         */
        add_action('init', [$this,'register_book_post_type']);
        add_action('init', [$this,'book_category']);
        add_action('init', [$this, 'featured_category']);
        add_action('add_meta_boxes', [$this,'add_fields']);
        add_action('save_post', [$this, 'process_book_save'], 10, 3);
    }

    public function register_book_post_type(){
        register_post_type('astra_library_book',[
            'labels' => [
                'name' => __("Books", "book-library-astra-kmfoysal06"),
                'singular_name' => __("Book", "book-library-astra-kmfoysal06"),
                'add_new' => __("Add New Book", 'book-library-astra-kmfoysal06'),
                'edit_item' => __("Edit Book Information", 'book-library-astra-kmfoysal06'),
                'search_items' => __("Search Books", 'book-library-astra-kmfoysal06'),
                'not_found' => __("No Book Found", 'book-library-astra-kmfoysal06'),
                'not_found_in_trash' => __("No Book Found in Trash", 'book-library-astra-kmfoysal06'),
                'all_items' => __("All Books", 'book-library-astra-kmfoysal06'),
                'featured_image' => __("Book Cover", 'book-library-astra-kmfoysal06'),
                'set_featured_image' => __("Set Book Cover", 'book-library-astra-kmfoysal06'),
                'remove_featured_image' => __("Remove Book Cover", 'book-library-astra-kmfoysal06'),
                'use_featured_image' => __("Use Book Cover", 'book-library-astra-kmfoysal06'),
            ],
            'public' => true,
            'has_archive' => true,
            'supports' => ['title', 'thumbnail'],
            'menu_icon' => 'dashicons-book-alt'
        ]);
    }

    public function add_fields(){
        add_meta_box(
            'book_informations',
            'Book Informations',
            [$this, 'field_html'],
            'astra_library_book'
        );
    }
    public function field_html(){

        ob_start();
        wp_nonce_field(basename(__FILE__), 'astra_library_book_kmfoysal06__nonce');
        $nonce_field = ob_get_clean();
        $saved_value = get_post_meta(get_the_ID(),'__astra_library_book_info',true);

        $book_description = isset($saved_value['book_description']) ? $saved_value['book_description'] : '';
        $book_author = isset($saved_value['book_author']) ? $saved_value['book_author'] : '';
        $book_publisher = isset($saved_value['book_publisher']) ? $saved_value['book_publisher'] : '';
        $book_publish_date = isset($saved_value['book_publish_date']) ? $saved_value['book_publish_date'] : '';

        $html = '';
        $html .= $nonce_field;
        $html .= '
        <div class="book-meta">
            <div class="book-description">
            <label for="book_description">Book Description</label>
            <textarea name="bookinfo[book_description]" id="book_description" class="book_description" cols="40" rows="5">'.esc_html($book_description).'</textarea>
            </div>

            <div class="book-author">
            <label for="book_author">Book Aurhor</label>
            <input type="text" name="bookinfo[book_author]" id="book_author" class="book_author" value="'.esc_attr($book_author).'">
            </div>

            <div class="book-publisher">
            <label for="book_publisher">Book Publisher</label>
            <input type="text" name="bookinfo[book_publisher]" id="book_publisher" class="book_publisher" value="'.esc_attr($book_publisher).'">
            </div>

            <div class="book-publish-date">
            <label for="book_publish_date">Book Publish Date</label>
            <input type="date" name="bookinfo[book_publish_date]" id="book_publish_date" class="book_publish_date" value="'.esc_attr($book_publish_date).'">
            </div>
        </div>
        ';

        echo $html;
    }

    public function process_book_save($post_id, $post, $update){
        // Check if this is a valid post object and the post type is 'cpr'
        if ('astra_library_book' !== $post->post_type) {
            return;
        }

        // Nonce verification
        $nonce = isset($_POST['astra_library_book_kmfoysal06__nonce']) ? sanitize_text_field($_POST['astra_library_book_kmfoysal06__nonce']) : '';
        if (!wp_verify_nonce($nonce, basename(__FILE__))) {
            return;
        }

        // Avoid autosave and revision issues
        if (wp_is_post_revision($post_id) || defined('DOING_AUTOSAVE') && DOING_AUTOSAVE || wp_is_post_autosave($post_id)) {
            return;
        }

        // Check permissions
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
         
        $book_description = isset($_POST["bookinfo"]['book_description']) ? sanitize_text_field($_POST["bookinfo"]['book_description']) : '';
        $book_author = isset($_POST["bookinfo"]['book_author']) ? sanitize_textarea_field($_POST["bookinfo"]['book_author']) : '';
        $book_publisher = isset($_POST["bookinfo"]['book_publisher']) ? sanitize_text_field($_POST["bookinfo"]['book_publisher']) : '';
        $book_publish_date = isset($_POST["bookinfo"]['book_publish_date']) ? sanitize_text_field($_POST["bookinfo"]['book_publish_date']) : '';

        $book_informations = [
            'book_description' => $book_description,
            'book_author' => $book_author,
            'book_publisher' => $book_publisher,
            'book_publish_date' => $book_publish_date
        ];

        // Update post meta
        update_post_meta($post_id, '__astra_library_book_info', $book_informations);
    }
    public function book_category(){
    register_taxonomy('astra_library_book_category', ['astra_library_book'], [
        'label' => __("Book Category"),
    ]);
}
    public function featured_category() {
        $category_name = 'Featured Books';
        $category_slug = 'featured-books';

        $category = get_term_by('slug', $category_slug, 'astra_library_book_category');

        if (!$category) {
            wp_insert_term(
                $category_name,
                'astra_library_book_category',
                array(
                    'slug' => $category_slug
                )
            );
        }
    }
}