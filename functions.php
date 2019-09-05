<?php

require_once get_stylesheet_directory() . '/includes/ogResort.php';

// Ajouter une option ACF
if (function_exists('acf_add_options_page')) {
    $parent = acf_add_options_page(array(
        'page_title' => 'Orangea Resort',
        'menu_title' => 'Orangea Resort',
        'capability' => 'delete_users',
        'autoload' => true,
        'redirect' => false
    ));
}


add_action('init', function () {
    add_action('wp_enqueue_scripts', function () {
        wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.css', '', '4.3.1' );
        wp_enqueue_style( 'owlCarousel', get_stylesheet_directory_uri() . '/assets/owlcarousel/assets/owl.carousel.min.css', '', '2.0.0' );
        wp_enqueue_style( 'owlCarousel-default', get_stylesheet_directory_uri() . '/assets/owlcarousel/assets/owl.theme.default.min.css', '', '2.0.0' );
        wp_enqueue_style( 'custom-orangea-resort', get_stylesheet_directory_uri() . '/assets/css/custom.css', '', '1.0.2' );
        wp_enqueue_style( 'style' );

        wp_enqueue_script( 'owlCarousel', get_stylesheet_directory_uri() . '/assets/owlcarousel/owl.carousel.min.js', ['jquery'], '2.0.0', true );

        /*** Vendors ***/
        wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/assets/vendors/bootstrap.min.js', ['jquery'], '4.3.1', true );
        wp_enqueue_script( 'highlight', get_stylesheet_directory_uri() . '/assets/vendors/highlight.js', ['jquery'], '1.0.0', true );
        wp_enqueue_script( 'app', get_stylesheet_directory_uri() . '/assets/js/app.js', ['jquery'], '1.0.1', true );
        wp_enqueue_script( 'underscore' );
    });


    /**
     * + wp-configs.php 
     * define('ALLOW_UNFILTERED_UPLOADS', true);
     */
    add_filter( 'upload_mimes', function ($mimes) {
        // New allowed mime types.
        $mimes['svg']  = 'image/svg+xml';
        $mimes['svgz'] = 'image/svg+xml';
        $mimes['doc']  = 'application/msword';
        
        // Optional. Remove a mime type.
        unset( $mimes['exe'] );
        return $mimes;
    } );

});


add_action('after_setup_theme', function () {
    load_theme_textdomain('twentyfifteen');
    load_theme_textdomain(get_stylesheet_directory() . '/languages');
  
    /**
     * This function will not resize your existing featured images.
     * To regenerate existing images in the new size,
     * use the Regenerate Thumbnails plugin.
     */
    set_post_thumbnail_size(50, 50, array('center', 'center')); // 50 pixels wide by 50 pixels tall, crop from the center
  
    // Register menu location
    register_nav_menus(array(
      'menu-principal' => 'Menu Principal',
    ));
  });



