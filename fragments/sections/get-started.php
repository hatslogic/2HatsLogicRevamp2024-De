<?php extract($section); ?>

<section class="get-started bg-dark-primary c-white" id="get-started">
    <div class="container pt-100 pb-100 sm:pt-80 sm:pb-80">
        <div class="flex align-center">
            <div class="col w-45 sm:hidden">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/background/newsletter.svg"
                    alt="newsletter" loading="lazy" width="494px" height="328px">
            </div>
            <div class="col w-55 sm:w-100">
                <div class="form">
                    <?php // echo do_shortcode('[gravityform id="3" title="true" description="true" ajax="true"]'); ?>
                    <?php echo do_shortcode('[contact-form-7 id="d49d276" title="Get a free 1 Hour Consultation Now!Get a free 1 Hour Consultation Now!"]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>