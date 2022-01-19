<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
    
    <link rel="stylesheet" href="https://use.typekit.net/liw6wlj.css">

  </head>

  <body <?php body_class(); ?>>
<div class="container-fluid blue-to-purple">
  <header class="site-header">
	<p class="site-title">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php bloginfo( 'name' ); ?>
		</a>
	</p>
	<p class="site-description">
        <?php //bloginfo( 'description' ); ?>
    </p>
    <?php wp_nav_menu( array(
    'theme_location' => 'menu-1',
) );?>

    
</header><!-- .site-header -->
    </div>
<div class="container">
<div class="site-content">
	<?php
	if ( have_posts() ) :
	
		while ( have_posts() ) :
	
			the_post();
			?>
	
			<article <?php post_class(); ?>>
			
				<header class="entry-header">
                    <?php the_post_thumbnail( 'my-custom-image-size' );?>
					<?php the_title( '<h1 class="entry-title display blue-text">', '</h1>' ); ?>
				</header><!-- .entry-header -->
			
				<div class="entry-content">
					<?php the_content( esc_html__( 'Continue reading &rarr;', 'my-custom-theme' ) ); ?>
				</div><!-- .entry-content -->
			
			</article><!-- #post-## -->
			
			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
	
		endwhile;
	
	else :
		?>
		<article class="no-results">
			
			<header class="entry-header">
				<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'my-custom-theme' ); ?></h1>
			</header><!-- .entry-header -->
		
			<div class="entry-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'my-custom-theme' ); ?></p>
			</div><!-- .entry-content -->
		
		</article><!-- .no-results -->
	<?php
	endif;
	?>
</div><!-- .site-content -->

<?php wp_footer(); ?>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	</body>
</div>
</html>