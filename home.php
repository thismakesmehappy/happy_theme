<?php
/*
Template Name: Blog Homepage
Template Post Type: post, page
*/
?>


<?php get_header(); ?>

    <div class="container">

        <?php

        $args = array('fields' => 'ids');
        $posts = get_posts($args);
        $gradient = "orange-to-purple";


        the_title("<h1 class=\"entry-title display\"><span class = \"blue-text {$gradient} gradient-text\">", '</span></h1>');
        ?>
        <div class="entry-content">
            <?php the_content(esc_html__('Continue reading &rarr;', 'my-custom-theme')); ?>
        </div><!-- .entry-content -->

        <div class="row gx-md-2" data-masonry='{"percentPosition": true }'>
            <?php
            foreach ($posts as $post_id) {


                $title = get_the_title($post_id);
                $brief = "Hello Dolly";
                $permalink = get_permalink($post_id);
                $post_thumbnail_url = get_the_post_thumbnail_url($post_id, 'thumbnail-grid');

                echo "<div class=\" col col-12 col-md-6 col-xl-4 border-5 rounded-2 p-2\">";
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
        <script src="js/masonry.pkgd.js"
                integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D"
                crossorigin="anonymous" async></script>


    </div>

<?php get_footer(); ?>