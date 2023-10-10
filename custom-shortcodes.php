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


function post_grid($atts = [], $content = null, $tag = '')
{
    $gradient = $atts['gradient'];
    $projects_string = $atts['projects'];
    $projects = explode(",", $projects_string);
    $parent = $atts['parent'];
    $col = $atts['col'];
    $col_sm = $atts['col_sm'];
    $col_md = $atts['col_md'];
    $col_lg = $atts['col_lg'];
    $col_xl = $atts['col_xl'];
    $border = $atts['border'];
    $corner = $atts['corner'];

    if (!isset($col)) {
        $col = '12';
    }
    if (!isset($col_sm)) {
        $col_sm = $col;
    }
    if (!isset($col_md)) {
        $col_md = $col_sm;
    }
    if (!isset($col_lg)) {
        $col_lg = $col_md;
    }
    if (!isset($col_xl)) {
        $col_xl = $col_lg;
    }
    if (!isset($border)) {
        $border = '1';
    }
    if (!isset($corner)) {
        $corner = '0';
    }


    $item_to_return = "";


    $item_to_return .= " <div class = \"row gx-md-2\" data-masonry='{\"percentPosition\": true }'>";
    foreach ($projects as $project) {
        if (isset($parent)) {
            $id = get_page_by_path("{$parent}/{$project}")->ID;
        } else {
            $id = get_page_by_path("{$project}")->ID;
        }

        $brief = get_post_meta($id, "brief", true);
        $permalink = get_permalink($id);
        $post_thumbnail_url = get_the_post_thumbnail_url($id, 'thumbnail-grid');
        $title = get_the_title($id);

        $item_to_return .= "<div class=\" col col-$col col-sm-$col_sm col-md-$col_md col-lg-$col_lg col-xl-$col_xl border-2 rounded-0 p-2\">";
        $item_to_return .= "<div class=\"card border-$border \">";
        $item_to_return .= "<a href = \"{$permalink}\" class=\"text-decoration-none\">";

        $item_to_return .= "<img src=\"{$post_thumbnail_url}\" class=\"card-img-top img-fluid\" alt=\"...\">";
        $item_to_return .= "<div class=\"card-body\">";
        $item_to_return .= " <h3 class=\"card-title mb-0\"> {$title} </h3>";
        $item_to_return .= "<p class=\"card-text\"> {$brief} </p>";
        $item_to_return .= "<span  class=\"btn btn-primary $gradient border-0\">See more</span>";
        $item_to_return .= "</a>";
        $item_to_return .= "</div>";
        $item_to_return .= "</div>";
        $item_to_return .= "</div>";
    }
    $item_to_return .= "</div>";
    $uri = get_stylesheet_directory_uri();
    $item_to_return .= "<script src=\"$uri/js/masonry.pkgd.js\"></script>";

    echo $item_to_return;
}

add_shortcode('happy_upload_dir', 'uploads_folder');
add_shortcode('happy_media_path', 'media_path');
add_shortcode('happy_featured_url', 'return_featured_url');
add_shortcode('happy_url_from_id', 'url_from_id');
add_shortcode('happy_post_grid', 'post_grid');