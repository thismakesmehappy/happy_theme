<?php
/*
Template Name: Computing
Template Post Type: post, page
*/
?>

<?php get_header(); ?>

<div class="container">
    
<?php 
$has_featured_image = True;
$has_title = True;
$gradient = "purple-to-green";

$info = array();

$brief = get_post_meta($post->ID, "brief", true);
$tech =  get_post_meta($post->ID, "tech", true);
$learning =  get_post_meta($post->ID, "learn", true);
$more_time = get_post_meta($post->ID, "more_time", true);
$repo = get_post_meta($post->ID, "code_url", true);
$is_private = get_post_meta($post->ID, "code_private", true);


if ($brief != "") {
    $info['Brief'] = $brief;
}
if ($tech != "") {
    $info['Tech'] = $tech;
}
if ($learning != "") {
    $info['Learning Highlights'] = $learning;
}
if ($more_time != "") {
    $info['With More Time'] = $more_time;
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