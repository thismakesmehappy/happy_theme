<?php
$gradient_color = $args['gradient'];
?>
<div class="row">

    <div class="col border-gradient border-<?php echo $gradient_color; ?>">
        <div>
			<?php

			echo "<p>";
			previous_post_link( '<div class="m-0 mb-2"></spa></spaM><em>previous post: </em>%link</div>' );
			next_post_link( '<div class="m-0 mb-2"><em>next post: </em>%link<br></div>' );

			?>
            <div class="separator <?php echo $gradient_color; ?> my-3"></div>
            <h3 class="gradient-text <?php echo $gradient_color; ?>">Latest Posts</h3>
            <ul>
				<?php

				$args  = array( 'fields' => 'ids', 'numberposts' => 10 );
				$posts = get_posts( $args );

				foreach ( $posts as $post_id ) {
					$title     = get_the_title( $post_id );
					$permalink = get_permalink( $post_id );
					echo "<li><a href=\"$permalink\">{$title}</a></li>";
				}
				?>
            </ul>
        </div>
    </div>
</div>