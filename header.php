<?php
/**
 *  Header Template
 * @package Book Library
 **/
if(!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php 
        if ( function_exists( 'wp_body_open' ) ) {
            wp_body_open();
        }else { 
            do_action( 'wp_body_open' ); 
        }
    ?>
    <a class="skip-link screen-reader-text" href="#astra-book-library-content">
        <?php _e( 'Skip to content', 'simplecharm' ); ?></a>
    <header role="banner">
        <div class="astra-book-library-header">
            <nav class="astra-book-library-nav">
            <a href="/" class="logo"><?php bloginfo('site_name'); ?></a>

            <div class="hamburger">
              <span class="line"></span>
              <span class="line"></span>
              <span class="line"></span>
            </div>

            <?php
                get_template_part("template-parts/components/header/navbar");
            ?>
        </div>
    </header>
    <br>
    <br>
    <main role="main" id="astra-book-library-content" tabindex="-1">