<header class="entry-header">
					<div class = "row">

					<?php 
					if ($args['has_title'] || !isset($args['has_title'])) {
						if (isset($args['gradient'])) {
							$gradient_color = $args['gradient'];
						} else {
							$gradient_color = 'blue-to-blue';
						}
					the_title( "<h1 class=\"entry-title display blue-text {$gradient_color} gradient-text\">", '</h1>' ); 
					}
                    

					?>
                    <?php 
					if ( $args['has_featured_image'] || !isset($args['has_featured_image'])) { 
						the_post_thumbnail( 'my-custom-image-size', array( 'class' => 'img-fluid' )  );
					}?>
					

					
				</div>
</header><!-- .entry-header -->