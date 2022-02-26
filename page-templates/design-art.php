<?php
/*
Template Name: Art and Design
Template Post Type: post, page
*/
?>

<?php get_header(); ?>

<div class="container">
    
<?php 
$has_featured_image = True;
$has_title = True;
$gradient = "orange-to-pink";

$info = array();
$brief = get_post_meta($post->ID, "brief", true);
$client =  get_post_meta($post->ID, "client", true);
$collaborators =  get_post_meta($post->ID, "collborators", true);
$key_outcome = get_post_meta($post->ID, "key_outcome", true);
$additional =  get_post_meta($post->ID, "additional", true);


if ($brief != "") {
    $info['Brief'] = $brief;
}
if ($client != "") {
    $info['Client'] = $client;
}

if ($collaborators != "") {
    $info['Collaborators'] = $collaborators;
}

if ($key_outcome != "") {
    $info['Key Outcomes'] = $key_outcome;
}

if ($additional != "") {
    $info['empty_additional'] = $additional;
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