<?php

//ADD DASHICONS TO FRONTEND
add_action( 'wp_enqueue_scripts', 'websmx_mydashicons' );
function websmx_mydashicons() {
	wp_enqueue_style( 'dashicons' );
}

// ADD STYLES.CSS FILE
function websmx_myscripts() {
    wp_enqueue_style( 'mystyles', get_stylesheet_uri() );
    wp_enqueue_script( 'myscripts', get_template_directory_uri() . '/scripts.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'websmx_myscripts' );

// REGISTER MENUS
register_nav_menus( array(
	'mainmenu' => 'Main Menu',
	'footermenu' => 'Footer Menu',
) );

// ADD SUPPORT FOR SIDEBAR WIDGETS
if ( function_exists('register_sidebar') ) {
register_sidebar(array('name'=>'sidebar', 'id'=>'sidebar'));
}

// ADD SUPPORT FOR FEATURED IMAGES
add_theme_support( 'post-thumbnails');
if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'banner-lrg', 1280, 640, true ); 
    add_image_size( 'banner-sm', 480, 240, true );
}

//SIMPLE CUSTOM SHORTCODE
add_shortcode( 'pagetitle', 'mypagetitle' );
function mypagetitle( ){
   return get_the_title();
}

// GET CUSTOM FIELD
add_shortcode( 'field', 'getfield' );
function getfield($custom_field) {
  global $post;
  $custom_field = get_post_meta($post->ID, $custom_field, true);
  echo $custom_field;
}

?>
