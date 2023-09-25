<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="container-fluid blue-to-purple">
    <header class="site-header d-flex align-items-center flex-md-row flex-column justify-content-between">
        <a href="<?php echo esc_url(home_url('/')); ?>">
            <p class="site-title w-md-100">
                <?php bloginfo('name'); ?>

            </p>
            <p class="site-description">
                <?php bloginfo('description'); ?>
            </p>
        </a>
        <span class="text-md-start text-center">
    <?php wp_nav_menu(array(
        'theme_location' => 'menu-1',
    )); ?>
</span>

    </header><!-- .site-header -->
</div>
