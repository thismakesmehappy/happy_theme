<div class="container-fluid " id="site-footer">
    <div class="separator purple-to-blue my-4"></div>
    <div class="d-flex ">
        <div class="p-3 m-x-auto border-gradient border-purple-to-blue purple-text d-inline-block mt-2"
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
        </div>
    </div>
</div>

<?php wp_footer(); ?>

</body>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/secondaryNav.js" type="text/javascript">
</script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/makeHomeScroll.js" type="text/javascript">
</script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap/bootstrap.js" type="text/javascript"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-3.7.1.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>

<script>
    watchScroll();
    verticalStacking();
    makeHomeScroll();
</script>

</html>