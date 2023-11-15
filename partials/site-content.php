<div class="site-content">
    <?php
    if (have_posts()):

        while (have_posts()):


            the_post();
            ?>

            <article <?php post_class(); ?>>

                <header class="entry-header">
                    <div class="row">

                        <?php
                        // Set featured image if set
                        if ($args['has_featured_image'] ?? true) {
                            the_post_thumbnail('full', array('class' => 'img-fluid mb-3'));
                        }

                        // Get gradient for page if set
                        $title = get_the_title();
                        $gradient_color = $args['gradient'] ?? do_shortcode("[happy_gradient title=$title]");

                        // Set title
                        if ($args['has_title'] ?? true) {
                            the_title("<h1 class=\"entry-title display blue-text gradient-text {$gradient_color} d-inline-block \">", '</h1>');
                        }

                        // Set subtitle if defined
                        $subtitle = get_post_meta($post->ID, "subtitle", true);
                        if (isset($subtitle) && $subtitle != "") {
                            echo "<h2 class=\"blue-text {$gradient_color} gradient-text d-inline-block\">$subtitle</h2>";
                        }

                        // Set roles if defined
                        $role = get_post_meta($post->ID, "role", true);
                        $additional_role = get_post_meta($post->ID, "additional", false);
                        if (isset($role) && $role != "") {
                            echo "<div class=\"roles border-bottom-gradient border-$gradient_color gradient-text $gradient_color d-inline-block w-100  mb-4 \">";
                            echo "<ul>";
                            echo "<li>Role: $role</li>";
                            foreach ($additional_role as $additional) {
                                echo "<li>$additional</li>";
                            }
                            echo "</ul>";
                            echo "<div class=\"separator-left w-25  \" />";
                            echo "</div>";
                        }

                        ?>


                    </div>
                </header>
                <div class="entry-content">

                    <?php
                    $content = apply_filters('the_content', get_the_content());
                    $content = str_replace("<h2>", "<h2 class=\"blue-text gradient-text $gradient_color d-inline-block\">", $content);
                    $content = str_replace("<button>", "<button class=\"btn btn-primary $gradient_color text-white border-0\">", $content);
                    echo $content; ?>
                </div><!-- .entry-content -->

            </article><!-- #post-## -->

            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()):
                comments_template();
            endif;
        endwhile;

    else:
        ?>
        <?php get_template_part('content-none') ?>
    <?php
    endif;
    ?>
    <div id="work" class="separator purple-to-blue my-4"></div>
    <?php echo do_shortcode('[insert page="portfolio-tiles" display="content"]'); ?>
</div><!-- .site-content -->