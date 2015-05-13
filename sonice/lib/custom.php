<?php
/**
 * Custom functions
 */

@ini_set( ‘upload_max_size’ , ’1024M’ );
@ini_set( ‘post_max_size’, ’1024M’);
@ini_set( ‘max_execution_time’, ’1000′ );

add_filter('show_admin_bar', '__return_false');


function register_my_menu() {
  register_nav_menu('footer-menu',__( 'Footer Menu' ));
}
add_action( 'init', 'register_my_menu' );


add_theme_support( 'post-thumbnails' );
add_image_size( 'thumbnail-small', 200, 9999);
add_image_size( 'thumbnail-large', 400, 9999);
add_image_size( 'medium-small', 600, 9999);
add_image_size( 'medium-large', 800, 9999);
add_image_size( 'large', 1000, 9999);
add_image_size( 'huge', 2000, 9999);


add_filter( 'wp_image_editors', 'change_graphic_lib' );

function change_graphic_lib($array) {
  return array( 'WP_Image_Editor_GD', 'WP_Image_Editor_Imagick' );
}