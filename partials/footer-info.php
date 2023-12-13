<?php $title = get_the_title();
$gradient_color = $args['gradient'] ?? do_shortcode("[happy_gradient title=$title]"); ?>
<div class="container-fluid " id="site-footer">
    <div class="separator purple-to-blue my-4"></div>
    <div class="d-flex row p-5 p-sm-3 p-md-0">
        <div class="px-3 pb-3 pt-3 col col-12 col-md-8 col-xl-6 m-x-auto border-gradient border-purple-to-blue purple-text d-inline-block mt-2 parent parent-<?php echo $gradient_color ?>"
             id="footer-info">
            <p class="highlight">Like what you see? Let's Get in touch! </p>
            <p><?php bloginfo('admin_email'); ?></p>
            <p>267 231 0223</p>
            <?php
            $contact_form = do_shortcode('[contact-form-7 id="d40a3e9" title="Contact form"]');
            if (!str_contains($contact_form, "Error:")) {
                echo $contact_form;
            }
            ?>
            <div id="rosie" class="d-none">
                <img src="<?php echo do_shortcode("[happy_media_path]") ?>/jocelyn.png"
                     class="w-50 align-self-center" />
            </div>
        </div>
    </div>
</div>
