<div class="container-fluid " id="site-footer">
    <div class="separator purple-to-blue my-3"></div>
    <div class="d-flex ">
        <div class="p-3 m-x-auto border-gradient border-purple-to-blue purple-text d-inline-block" id="footer-info">
            <p class="highlight">Like what you see? Let's Get in touch! </p>
            <p><?php bloginfo('admin_email'); ?></p>
            <p>267 231 0223</p>
            <?php
            $contact_form = do_shortcode('[contact-form-7 id="18f459a" title="Untitled"]');
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

<script>
    watchScroll();
    verticalStacking();
</script>


</html>