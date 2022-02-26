<?php
/*
Template Name: Design Thinking Grid
Template Post Type: post, page
*/
?>

<?php get_header(); ?>

<div class="container">
<?php 
$has_featured_image = True;
$has_title = True;
$gradient = "blue-to-orange";
$projects = array(
            'dt-test',
            'dt-test',
            'dt-test',
            'dt-test',
            'dt-test',
            'dt-test',
            'dt-test'
            );
$parent = "design-thinking-creative-leadership";


get_template_part('partials/site-content', null , array(
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