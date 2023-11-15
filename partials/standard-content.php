<?php get_header(); ?>

<div class="container">
    <div class="p-4 p-sm-2 p-md-0">
        <?php

        get_template_part('partials/site-content', null, array(
            'has_featured_image' => $args['has_featured_image'] ?? true,
            'has_title' => $args['has_title'] ?? true
        ));
        ?>
    </div>
</div>