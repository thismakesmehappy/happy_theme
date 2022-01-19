<?php

// Register menu
register_nav_menus( array(
    'menu-1' => __( 'Primary Menu', 'my-custom-theme' ),
));

// Support sidebar
function my_custom_theme_sidebar() {
    register_sidebar( array(
        'name' => __( 'Primary Sidebar', 'my-custom-theme' ),
        'id'   => 'sidebar-1',
    ) );
}
add_action( 'widgets_init', 'my_custom_theme_sidebar' );

// Suport featured image
add_theme_support( 'post-thumbnails' );

// Custom image size
add_image_size( 'my-custom-image-size', 1200 );

function my_custom_theme_enqueue() {
    wp_enqueue_style( 'my-custom-theme', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'my_custom_theme_enqueue' );