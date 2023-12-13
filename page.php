<?php
$has_featured_image = $args["has_featured_image"] ?? true;
$has_title = $args["has_title"] ?? true;
?>
<?php get_header(); ?>
<?php get_template_part('partials/navigation') ?>
<?php get_template_part('partials/standard-content', null, array(
    'has_featured_image' => $args["has_featured_image"] ?? true,
    'has_title' => $args["has_title"] ?? true
));
?>
<?php get_template_part('partials/footer-info') ?>
<?php get_footer(); ?>