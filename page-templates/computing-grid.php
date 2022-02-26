<?php
/*
Template Name: Computing Grid
Template Post Type: post, page
*/
?>

<?php get_header(); ?>

<div class="container">
<?php 
$has_featured_image = True;
$has_title = True;
$gradient = "purple-to-green";
$projects = array(
            'rush-hour',
            'rush-hour',
            'rush-hour',
            'rush-hour',
            'rush-hour',
            'rush-hour',
            'rush-hour'
            );
$parent = "computing";


get_template_part('site-content', null , array(
                                    'has_featured_image' => false, 
                                    'has_title' => true,
                                    'gradient' => $gradient
                                    ) );


get_template_part('partials/grid-all', null, array(
                                    'gradient' => $gradient,
                                    'projects' => $projects,
                                    'parent' => $parent
                                ) );
?>


</div>


<?php get_footer(); ?>