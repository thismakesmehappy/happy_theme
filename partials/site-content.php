<div class="site-content">
	<?php
if (have_posts()):

    while (have_posts()):

        the_post();
        ?>

					<article <?php post_class();?>>

					<header class="entry-header">
							<div class = "row">

							<?php
        if ($args['has_title'] || !isset($args['has_title'])) {
			$temp_gradient_color = get_post_meta($post->ID, "gradient", true);
            if (isset($args['gradient'])) {
                $gradient_color = $args['gradient'];
			} else if ($temp_gradient_color != "") {
				$gradient_color = $temp_gradient_color;
            } else {
                $gradient_color = 'blue-to-blue';
            }
            the_title("<h1 class=\"entry-title display\"><span class = \"blue-text {$gradient_color} gradient-text\">", '</span></h1>');
        }

        ?>
		                    <?php
        if ($args['has_featured_image'] || !isset($args['has_featured_image'])) {
            the_post_thumbnail('my-custom-image-size', array('class' => 'img-fluid'));
        }?>

		<?php
		if (isset($args['has_split']) && $args['has_split']) {
			get_template_part('partials/split', null, array(
											'gradient' => $args['gradient'], 
											'info' => $args['info'],
											) );
		}
		?>



						</div>
					</header>
						<div class="entry-content">
							<?php the_content(esc_html__('Continue reading &rarr;', 'my-custom-theme'));?>
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
		<?php get_template_part('content-none')?>
	<?php
endif;
?>
</div><!-- .site-content -->