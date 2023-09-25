<?php
$gradient = $args['gradient'];
$projects = $args['projects'];
$parent = $args['parent'];

?>

<div class="row gx-md-2" data-masonry='{"percentPosition": true }'>
    <?php
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

        echo "<div class=\" col col-12 col-md-4 col-xl-3 border-2 rounded-0 p-2\">";
        echo "<div class=\"card border-2 rounded-0 col \">";
        echo "<a href = \"{$permalink}\" class=\"text-decoration-none\">";

        echo "<img src=\"{$post_thumbnail_url}\" class=\"card-img-top img-fluid\" alt=\"...\">";
        echo "<div class=\"card-body\">";
        echo "<h3 class=\"card-title mb-0\"> {$title} </h3>";
        echo "<p class=\"card-text\"> {$brief} </p>";
        echo "<span  class=\"btn btn-primary $gradient border-0\">See more</span>";
        echo "</a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
    ?>

</div>
<script src="<?php get_stylesheet_directory_uri() ?>/js/masonry.pkgd.js"
        integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D"
        crossorigin="anonymous" async></script>