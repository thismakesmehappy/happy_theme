<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-6MW159145X"></script>
        <script>
            const currentUrl = window.location.href;
            if (currentUrl !== undefined && currentUrl !== null && currentUrl.includes(".onl")) {
                window.dataLayer = window.dataLayer || [];

                function gtag() {
                    dataLayer.push(arguments);
                }

                gtag('js', new Date());

                gtag('config', 'G-6MW159145X');
            }
        </script>
        <!-- end Google tag -->

        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="profile" href="https://gmpg.org/xfn/11">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
