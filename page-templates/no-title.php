<?php
/*
Template Name: No Title
Template Post Type: post, page
*/
?>

<?php get_header(); ?>

<div class="container">
<?php 
$has_featured_image = False;
$has_title = False;

get_template_part('partials/site-content', null , array(
                                    'has_featured_image' => False, 
                                    'has_title' => False
                                    ) );
?>
</div>

<?php get_footer(); ?>