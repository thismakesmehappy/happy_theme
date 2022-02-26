<?php

// Register menu
register_nav_menus(array(
    'menu-1' => __('Primary Menu', 'my-custom-theme'),
));

// Support sidebar
function my_custom_theme_sidebar()
{
    register_sidebar(array(
        'name' => __('Primary Sidebar', 'my-custom-theme'),
        'id' => 'sidebar-1',
    ));
}
add_action('widgets_init', 'my_custom_theme_sidebar');

// Suport featured image
add_theme_support('post-thumbnails');

// Support excerpt
add_post_type_support( 'page', 'excerpt' );
add_post_type_support( 'post', 'excerpt' );

// Custom image size
add_image_size('my-custom-image-size', 1200);
add_image_size('thumbnail-grid', 400, 250);

// Enqueue custom styles and scripts if we have any
function my_custom_theme_enqueue()
{
    wp_enqueue_style('typekit', 'https://use.typekit.net/liw6wlj.css');
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css');
    wp_enqueue_style('my-custom-theme', get_stylesheet_uri());

    
    wp_enqueue_script('popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js');
    wp_enqueue_script('bootstrap-jp', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js');


    if (is_page('home')) {
        wp_enqueue_style('home-style', get_template_directory_uri() . '/css/home.css');
        //wp_enqueue_style('glider-style', 'https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css');
        //wp_enqueue_script('glider-script', 'https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js');
        //wp_enqueue_script( 'glider-start', get_template_directory_uri() . '/js/glider-home.js' );

    }
}
add_action('wp_enqueue_scripts', 'my_custom_theme_enqueue');

// Handle title tags
add_theme_support('title-tag');

// Add custom shortcodes
include 'custom-shortcodes.php';

// Disable automatic line return
//remove_filter('the_content', 'wpautop');


// Disable removal of p tags
remove_filter( 'the_content', 'shortcode_unautop' );

remove_filter ('the_content', 'wpautop');

function prevent_deleting_pTags($init){
    $init['wpautop'] = false;

    return $init;
}
