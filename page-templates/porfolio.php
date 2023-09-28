<?php
/*
Template Name: Portfolio Page
Template Post Type: post, page
*/
?>

<?php
$post = get_post();
$subtitle = get_post_meta($post->ID, "subtitle", true);
$role = get_post_meta($post->ID, "role", true);
$additional = get_post_meta($post->ID, "additional");
$gradient_color = get_post_meta($post->ID, "gradient", true);
if (!isset($gradient_color) || strlen($gradient_color) == 0) {
    $gradient_color = "blue-to-purple";
}
?>
<?php get_header(); ?>
    <div class="container portfolio-container">

        <div class="container">
            <div id="header-img">
                <?php
                the_post_thumbnail('my-custom-image-size', array('class' => 'img-fluid'));
                ?>
            </div>
            <div id="header entry-title display">
                <?php
                the_title("<h1 class=\"display\"><span class = \"blue-text orange-to-blue gradient-text\">", '</span></h1>');
                if (isset($subtitle) && strlen($subtitle) != 0) {
                    echo "<h2> <span class = \"blue-text pink-to-purple gradient-text\">";
                    echo $subtitle;
                    echo "</span></h2>";
                }
                ?>

            </div>
            <?php
            if (isset($role) && strlen($role) > 0) {
                echo "<div class=\"border-gradient border-green-to-purple gradient-text green-to-purple d-inline-block\" id=\"role-box\"'>";
                echo "<p>Role: $role</p>";
                foreach ($additional as $other) {
                    echo "<p>$other</p>";
                }
                echo "</div>";
            }
            ?>
            <div class="entry-content">
                <?php the_content(esc_html__('Continue reading &rarr;', 'my-custom-theme')); ?>
            </div>
        </div>

    </div>

<?php get_footer(); ?>