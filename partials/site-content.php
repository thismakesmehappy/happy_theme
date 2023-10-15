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
                        if ($args['has_featured_image'] || !isset($args['has_featured_image'])) {
                            the_post_thumbnail('my-custom-image-size', array('class' => 'img-fluid'));
                        }

                        // Get gradient for page if set
                        $temp_gradient_color = get_post_meta($post->ID, "gradient", true);
                        if (isset($args['gradient'])) {
                            $gradient_color = $args['gradient'];
                        } else if ($temp_gradient_color != "") {
                            $gradient_color = $temp_gradient_color;
                        } else {
                            $gradient_color = 'blue-to-blue';
                        }

                        // Set title
                        if ($args['has_title'] || !isset($args['has_title'])) {
                            the_title("<h1 class=\"entry-title display\"><span class = \"blue-text {$gradient_color} gradient-text\">", '</span></h1>');
                        }

                        // Set subtitle if defined
                        $subtitle = get_post_meta($post->ID, "subtitle", true);
                        if (isset($subtitle) && $subtitle != "") {
                            echo "<h2 class=\"blue-text {$gradient_color} gradient-text\">$subtitle</h2>";
                        }

                        // Set roles if defined
                        $role = get_post_meta($post->ID, "role", true);
                        $additional_role = get_post_meta($post->ID, "additional", false);
                        if (isset($role) && $role != "") {
                            echo "<div class=\"roles border-gradient border-$gradient_color gradient-text $gradient_color col col-12 col-md-6 col-xlg-4 p-3\">";
                            echo "<ul>";
                            echo "<li>Role: $role</li>";
                            foreach ($additional_role as $additional) {
                                echo "<li>$additional</li>";
                            }
                            echo "</ul>";
                            echo "</div>";
                        }


                        ?>


                    </div>
                </header>
                <div class="entry-content">
                    <?php the_content(esc_html__('Continue reading &rarr;', 'my-custom-theme')); ?>
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
    <div id="work" class="separator purple-to-blue my-3"></div>
    <?php echo do_shortcode('[insert page="portfolio-tiles" display="content"]'); ?>
</div><!-- .site-content -->