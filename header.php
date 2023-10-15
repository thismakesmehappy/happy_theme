<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="container-fluid blue-to-purple" id="top-top">
    <header id="top-header"
            class="site-header d-flex align-items-center flex-md-row flex-column justify-content-between">
        <a href="<?php echo esc_url(home_url('/')); ?>">
            <p class="site-title w-md-100 text-decoration-none">
                <?php bloginfo('name'); ?>

            </p>
            <p class="site-description">
                <?php bloginfo('description'); ?>
            </p>
        </a>
        <div id="top-nav">
        <span class="text-md-start text-center">
    <?php wp_nav_menu(array(
        'theme_location' => 'menu-1',
    )); ?>
</span>
        </div>

    </header><!-- .site-header -->
</div>
<div id="secondary-nav"
     class="gradient-text border-gradient purple-to-blue border-purple-to-blue sticky-top js-scroll text-center">
    <div class="stack-vertical m-0 p-0">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'menu-1',
        )); ?>
    </div>
</div>