<?php
/*
Template Name: No Title
Template Post Type: post, page
*/
?>
<?php get_header(); ?>

<?php get_template_part('partials/navigation') ?>
<?php get_template_part('partials/standard-content', null, array(
    'has_featured_image' => False,
    'has_title' => False
)); ?>


<?php get_template_part('partials/footer-info') ?>

<?php get_footer(); ?>