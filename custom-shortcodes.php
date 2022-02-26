<?php

function uploads_folder()
{
    $folder = wp_get_upload_dir();
    $path = $folder['url'];
    return $path;
}


function media_path($atts = array())
{
    extract(shortcode_atts(array(
        'file' => '',
    ), $atts));
    $folder = wp_get_upload_dir();
    $path = $folder['url'] . '/' . $file;
    return $path;
}

function url_from_id($atts = array())
{
    extract(shortcode_atts(array(
        'id' => '',
    ), $atts));
    return get_permalink($id);
}

function return_featured_url()
{
    return "'" . get_the_post_thumbnail_url() . "'";
}

add_shortcode('happy_upload_dir', 'uploads_folder');
add_shortcode('happy_media_path', 'media_path');
add_shortcode('happy_featured_url', 'return_featured_url');
add_shortcode('happy_url_from_id', 'url_from_id');