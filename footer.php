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
<script>

    const secondaryNav = document.getElementById("secondary-nav");
    const topHeader = document.getElementById("top-header");

    const isItemInView = (element) => {
        const elementBottom = element.getBoundingClientRect().bottom;
        const elementTop = element.getBoundingClientRect().top;
        const windowSize = window.innerHeight;
        return elementBottom >= 0 && elementTop <= windowSize;
    };
    const displayScrollElement = (element) => {
        element.classList.add("scrolled");
    }

    const hideScrollElement = (element) => {
        element.classList.remove("scrolled");
    }

    const hideWhenTriggerInView = (triggerElement, animateElement) => {
        if (!isItemInView(topHeader)) {
            displayScrollElement(secondaryNav);
        } else {
            hideScrollElement(secondaryNav);
        }
    }

    const watchScroll = () => {
        window.addEventListener('scroll', () => {
            hideWhenTriggerInView(topHeader, secondaryNav);
        })
    };

    watchScroll();

    const verticalStacking = () => {
        const verticalStack = document.querySelectorAll(".stack-vertical a");
        verticalStack.forEach(item => {
            const inner = item.innerHTML;
            const newInner = "<div>" + inner.split("").join("</br>") + "</div>";
            item.innerHTML = newInner;
        });
    }

    verticalStacking();

</script>


</html>