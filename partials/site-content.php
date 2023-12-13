<div class="site-content">
    <?php
    if (have_posts()):

        while (have_posts()):


            the_post();

            // Get gradient for page if set
            $title = get_the_title();
            $gradient_color = $args['gradient'] ?? do_shortcode("[happy_gradient title=$title]");
            $h2_class = "blue-text gradient-text $gradient_color d-inline-block";
            ?>

            <article <?php post_class(); ?>>

                <header class="entry-header">
                    <div class="row">

                        <?php
                        // Set featured image if set
                        if ($args['has_featured_image'] ?? true) {
                            the_post_thumbnail('full', array('class' => 'img-fluid mb-3'));
                        }


                        // Set title
                        if ($args['has_title'] ?? true) {
                            the_title("<h1 class=\"entry-title display blue-text gradient-text {$gradient_color} d-inline-block \">", '</h1>');
                        }
                        ?>

                        <!-- Set subtitle if defined -->
                        <?php
                        $subtitle = get_post_meta($post->ID, "subtitle", true);
                        if (isset($subtitle) && $subtitle != ""): ?>
                            <h2 class="blue-text <?= $gradient_color ?> gradient-text d-inline-block\"><?= $subtitle ?></h2>
                        <?php endif; ?>

                        <!-- Set roles if defined -->
                        <?php
                        $role = get_post_meta($post->ID, "role", true);
                        $additional_role = get_post_meta($post->ID, "additional", false);
                        if (isset($role) && $role != ""): ?>
                        <div class="roles border-bottom-gradient border-<?= $gradient_color ?> gradient-text <?= $gradient_color ?> d-inline-block w-100  mb-4">
                            <ul>
                                <li>Role: <?php echo $role ?></li>
                                <?php foreach ($additional_role as $additional): ?>
                                    <li><?= $additional ?></li>
                                <?php endforeach; ?>
                            </ul>

                            <div class="separator-left w-25">
                            </div>
                            <?php endif; ?>


                        </div>
                </header>
                <div class="entry-content">
                    <?php
                    $event_brief = get_post_meta($post->ID, 'event_brief', true);
                    $challenges = get_post_meta($post->ID, 'challenges', true);
                    $goals = get_post_meta($post->ID, 'goals', true);
                    $outcome = get_post_meta($post->ID, 'outcome', true);
                    if (isset($event_brief) && $event_brief != ""): ?>
                        <!-- intro -->
                        <div class="row">
                            <div class="col col-12 brief mb-2">
                                <?= $event_brief ?>
                            </div>
                            <?php if (isset($challenges) && $challenges != ""): ?>
                                <div class="col col-12 col-md-4">
                                    <h2 class="<?= $h2_class ?>">Challenges</h2>
                                    <?= $challenges ?>
                                </div>
                            <?php endif; ?>
                            <?php if (isset($goals) && $goals != ""): ?>
                                <div class="col col-12 col-md-4">
                                    <h2 class="<?= $h2_class ?>">Goals</h2>
                                    <?= $goals ?>
                                </div>
                            <?php endif; ?>
                            <?php if (isset($outcome) && $outcome != ""): ?>
                                <div class="col col-12 col-md-4">
                                    <h2 class="<?= $h2_class ?>">Outcome</h2>
                                    <?= $outcome ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- end intro -->
                    <?php endif; ?>

                    <?php
                    $content = apply_filters('the_content', get_the_content());
                    //                    $content = str_replace("<h2>", "<h2 class=\"blue-text gradient-text $gradient_color d-inline-block\">", $content);
                    $content = preg_replace("<h2(.*)>", "h2 class=\"{$h2_class}\"$1", $content);
                    $content = str_replace("<button>", "<button class=\"btn btn-gradient btn-gradient-$gradient_color $gradient_color text-white\">", $content);
                    $content = str_replace("btn-page-gradient", "btn btn-gradient btn-gradient-$gradient_color $gradient_color text-white", $content);
                    $content = str_replace("page-gradient", "$gradient_color", $content);
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