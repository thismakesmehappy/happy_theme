<?php
/*
Template Name: Design Thinking
Template Post Type: post, page
*/
?>

<?php get_header(); ?>

<div class="container">
    
<?php 
$has_featured_image = True;
$has_title = True;
$gradient = "blue-to-orange";

$info = array();

$brief = get_post_meta($post->ID, "brief", true);
$goal =  get_post_meta($post->ID, "tech", true);
$organization =  get_post_meta($post->ID, "learn", true);
$outcomes = get_post_meta($post->ID, "more_time", true);



if ($organization != "") {
    $info['Organization'] = $organization;
}
if ($brief != "") {
    $info['Brief'] = $brief;
}
if ($goal != "") {
    $info['Goal'] = $goal;
}
if ($more_time != "") {
    $info['With More Time'] = $brief;
}
if ($repo != "") {
    $info['repo']['url'] = $repo;
    if ($is_private != "") {
        $info['repo']['is_private'] = true;
    } else {
        $info['repo']['is_private'] = false;
    }
}

get_template_part('partials/site-content', null , array(
                                    'has_featured_image' => false, 
                                    'has_title' => true,
                                    'gradient' => $gradient,
                                    'has_split' => true,
                                    'info' => $info

                                    ) );
?>


</div>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

<script>
$("#featured-image").css("background-image", "url(' <?php echo get_the_post_thumbnail_url(); ?> ')");
</script>
<?php get_footer(); ?>