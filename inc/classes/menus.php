<?php
/**
 * Enqueue All Assets
 * @package Book Library
 */
namespace ASTRA_BOOK_LIBRARY\Inc\Classes; 
use ASTRA_BOOK_LIBRARY\Inc\Traits\Singletone;
class Menus{
    use Singletone;
    public function __construct(){
        $this->setup_hooks();
    }

    public function setup_hooks(){
        /**
         * Actions.
         */
         add_action("init",[$this,"register_menus"]);        
    }

    public function register_menus(){
    	register_nav_menus(array(
            'astra_book_library_menu' => esc_html__('Primary Header Menu', 'book-library-astra-kmfoysal06'),
         ));
        register_nav_menus(array(
            'astra_book_library_menu__footer_primary' => esc_html__('Primary Footer Menu', 'book-library-astra-kmfoysal06'),
         ));
    }

    public function get_menu_location($location){
        $locations = get_nav_menu_locations();
        $menu_id = isset($locations[$location])?$locations[$location]:'';
        return $menu_id;
    }

    public function get_child_menus($menus,$parent_id){
        $child_menu = [];
        if(!empty($menus) && is_array($menus) ){
            foreach($menus as $menu){
                if(intval($menu->menu_item_parent) == $parent_id){
                    array_push($child_menu,$menu);
                }
            }
        }
        return $child_menu;
    }

    public function wp_nav_menu($location, $handle){
        $menu_id = $this->get_menu_location($location);
        $menu = wp_get_nav_menu_items( $menu_id );
         if(!empty($menu) && is_array($menu)){ ?>
            <div class="astra-book-library-menu-<?php echo $handle; ?>-container nav__link hide">
            <?php
                foreach($menu as $menu_item){
                    if(!$menu_item->menu_item_parent){
                        $child_items = $this->get_child_menus($menu,$menu_item->ID);
                        $has_children = !empty($child_items) && is_array($child_items);
                        $has_sub_menu_class = !empty($has_children) ? 'has_children':'';
                        if(!$has_children){
                            ?>
                                <a class="astra-book-library-nav-<?php echo $handle; ?>-link" href="<?php echo $menu_item->url; ?>"><?php echo $menu_item->title; ?></a>
                            <?php
                        }else{
                            ?>
                            <a class="astra-book-library-nav-<?php echo $handle; ?>-link" href="<?php echo $menu_item->url; ?>">
                                <?php echo $menu_item->title; ?>
                            </a>
                            <ul class="astra-book-library-nav-<?php echo $handle; ?>-dropdown">
                            <?php foreach($child_items as $child_item){?>
                                <li><a class="astra-book-library-nav-<?php echo $handle; ?>-dropdown-item" href="<?php echo $child_item->url; ?>"><?php echo $child_item->title; ?></a></li>
                                <?php } ?>
                            </ul>
                            <?php
                        }
                        
                    }
                }
            ?>
          </div>
        <?php }
    }
}