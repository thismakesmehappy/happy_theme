<div class="site-content">
    <?php
    $is_monty = false;
    if (have_posts()):

        while (have_posts()):

            the_post();
            ?>
            <article <?php post_class(); ?>>
                <div class="row">
                    <div class="col col-12 col-md-9">

                <header class="entry-header">
                        <!-- display title -->
                        <?php

                        $gradient_color = 'orange-to-purple';
                        the_title("<h1 class=\"entry-title display\"><span class = \"blue-text {$gradient_color} gradient-text\">", '</span></h1>');

                        ?>
                        <!-- display categories -->
                        <p>
                            <strong>
                                <?php
                                $categories = get_the_category();
                                echo "A few thoughts on ";
                                foreach ($categories as $category) {
                                    if ($category->name != 'Monty Monty') {
	                                    echo "<span class='badge rounded-pill {$gradient_color}'>$category->name</span> ";
                                    } else {
	                                    $is_monty = true;
                                    }
                                }



                                ?>
                            </strong>
                        </p>
                        <!-- display featured image -->
                        <?php
                        if ($args['has_featured_image']) {
                            the_post_thumbnail('my-custom-image-size', array('class' => 'img-fluid'));
                        }
                        else {
                            echo "<div class=\"separator $gradient_color my-3\"> </div>";
                        }
                        ?>


                </header>
                <div class="entry-content">
                    <?php the_content(esc_html__('Continue reading &rarr;', 'my-custom-theme')); ?>
                </div><!-- .entry-content -->

                    </div>
                    <div class="col col-12 col-md-3">
	                    <?php get_template_part('partials/blog-sidebar',null , array(
		                    'gradient' => $gradient_color
	                    ) )?>
                    </div>
                </div>
            </article><!-- #post-## -->

            <?php
        endwhile;

    else:
        ?>

        <?php get_template_part('content-none') ?>
    <?php
    endif;
    ?>
</div><!-- .site-content -->

<?php
    if ($is_monty) {
	    echo "<script src='https://code.jquery.com/jquery-3.5.0.js'></script>
<script>";
        echo "$('#menu-item-453').addClass('current_page_item');";
        echo "</script>";
    }
?>


