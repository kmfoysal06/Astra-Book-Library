<?php
/**
 * Trait Singleton Template
 * @package Book Library
 */

 namespace ASTRA_BOOK_LIBRARY\Inc\Traits;
    trait Singletone{
        public function __construct(){}
    public function __clone(){}
    final public static function get_instance(){
        static $instance = [];
        $called_class = get_called_class();
        if(!isset($instance[$called_class])){
            $instance[$called_class] = new $called_class;
            do_action(sprintf("regen_luxury_boutique_hotels_theme_singleton_init%s",$called_class));
        }
        return $instance[$called_class];

    }
 }