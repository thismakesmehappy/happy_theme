<?php

$gradients = array(
    "blue-to-green",
    "blue-to-orange",
    "blue-to-pink",
    "blue-to-purple",
    "green-to-blue",
    "green-to-orange",
    "green-to-pink",
    "green-to-purple",
    "orange-to-blue",
    "orange-to-green",
    "orange-to-pink",
    "orange-to-purple",
    "pink-to-blue",
    "pink-to-green",
    "pink-to-orange",
    "pink-to-purple",
    "purple-to-blue",
    "purple-to-green",
    "purple-to-orange",
    "purple-to-pink",
);

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
    $gradient = $atts['gradient'] ?? get_gradient_from_title(get_the_title());
    $projects_string = $atts['projects'];
    $projects = explode(",", $projects_string);
    $parent = $atts['parent'];
    $col = $atts['col'] ?? 12;
    $col_sm = $atts['col_sm'] ?? $col;
    $col_md = $atts['col_md'] ?? $col_sm;
    $col_lg = $atts['col_lg'] ?? $col_md;
    $col_xl = $atts['col_xl'] ?? $col_lg;
    $border = $atts['border'] ?? 1;

    $item_to_return = "";


    $item_to_return .= " <div class = \"row gx-md-2 page-grid\" >";
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

    return $item_to_return;
}

function get_gradient_from_title($atts = array()): string
{
    $title = $atts['title'];
    return get_gradient_from_string($title);
}

function get_gradient_from_string($text = ""): string
{
    global $gradients;
    $number_of_gradients = sizeof($gradients);
    $hashed = (sqrt(crc32($text)) * 2) % $number_of_gradients;
    return $gradients[$hashed];
}

function get_quote_content($atts = array()): array
{
    $slug = $atts['slug'] ?? false;
    if (!$slug) {
        return array('is_valid' => false,
            'message' => 'must include a page name');
    }

    $page = get_page_by_path($slug);
    if ($page) {
        $page_id = $page->ID;
    } else {
        return array('is_valid' => false,
            'message' => 'invalid slug');
    }
    $page_content = get_post($page_id, OBJECT, 'db');
    $page_content = $page_content->post_content;
    $page_content_clean = str_replace('\"', '"', $page_content);
    $page_content_clean = str_replace("\'", "'", $page_content_clean);

    $page_content_json = json_decode($page_content_clean, true);
    return array('is_valid' => true,
        'page_content' => $page_content_json);
}

function quote_loop($outer_open, $outer_close, $quote_open, $quote_close, $atts = array())
{
    $quote_content = get_quote_content($atts);
    if (!$quote_content['is_valid']) {
        return $quote_content['message'];
    }
    $page_content = $quote_content['page_content'];

    if ($page_content === null) {
        return "bye";
    }
    $content = $outer_open;
    $is_active = 'active';
    foreach ($page_content as $quote) {
        $content .= "<!-- begin quote -->";
        $quote_content = $quote['q'];
        $quote_attrib = $quote['a'];
        $gradient = get_gradient_from_string($quote_content);
        $quote_open_with_gradient = str_replace("gradient ", $gradient . " ", $quote_open);
        $quote_open_replace = str_replace("active", $is_active, $quote_open_with_gradient);
        $is_active = "";
        $content .= $quote_open_replace;
        $content .= "<div class='quote'><span class='quote-mark'>&ldquo;</span>$quote_content<span class='quote-mark'>&rdquo;</span></div>";
        $content .= "<div class='attribution'>$quote_attrib</div>";
        $content .= $quote_close;
        $content .= "<!-- end quote -->";
    }
    $content .= $outer_close;

    return $content;
}

function quote_grid($atts = array()): string
{
    $col = $atts['col'] ?? 12;
    $col_sm = $atts['col_sm'] ?? $col;
    $col_md = $atts['col_md'] ?? $col_sm;
    $col_lg = $atts['col_lg'] ?? $col_md;
    $col_xl = $atts['col_xl'] ?? $col_lg;

    $outer_open = '<div class="row grid" data-masonry=\'{"percentPosition": true }\'>';
    $quote_open = "<div class=\"col col-$col col-sm-$col_sm col-md-$col_md col-lg-$col_lg col-xl-$col_xl gradient-text gradient mb-4\">";
    $quote_close = '</div>';
    $outer_close = '</div>';

    return quote_loop($outer_open, $outer_close, $quote_open, $quote_close, $atts);
}

function quote_slider($atts = array()): string
{
    $interval = $atts['interval'] ?? 7500;
    $outer_open = "<div id=\"carousel-slides\" class=\"carousel slide display text-center d-flex mt-4\" data-bs-ride=\"carousel\" data-bs-interval=\"$interval\" data-bs-pause=\"hover\">";
    $outer_open .= '<div class="carousel-inner">';
    $quote_open = '<div class="carousel-item active">';
    $quote_open .= '<div class="blockquote gradient-text gradient col col-10 align-self-center">';
    $quote_close = '</div>';
    $quote_close .= '</div>';
    $outer_close = '<button class="carousel-control-prev align-self-left" type="button" data-bs-target="#carousel-slides" data-bs-slide="prev">';
    $outer_close .= '<span class="gradient-text orange-to-pink" aria-hidden="true"></span>&lt;';
    $outer_close .= '<span class="visually-hidden">Previous</span>';
    $outer_close .= '</button>';
    $outer_close .= '<button class="carousel-control-next" type="button" data-bs-target="#carousel-slides" data-bs-slide="next">';
    $outer_close .= '<span class="gradient-text green-to-purple" aria-hidden="true">&gt;</span>';
    $outer_close .= '<span class="visually-hidden">Next</span>';
    $outer_close .= '</button>';
    $outer_close .= '</div>';
    $outer_close .= '</div>';

    return quote_loop($outer_open, $outer_close, $quote_open, $quote_close, $atts);
}

add_shortcode('happy_upload_dir', 'uploads_folder');
add_shortcode('happy_media_path', 'media_path');
add_shortcode('happy_featured_url', 'return_featured_url');
add_shortcode('happy_url_from_id', 'url_from_id');
add_shortcode('happy_post_grid', 'post_grid');
add_shortcode('happy_gradient', 'get_gradient_from_title');
add_shortcode('happy_quote_grid', 'quote_grid');
add_shortcode('happy_quote_slider', 'quote_slider');