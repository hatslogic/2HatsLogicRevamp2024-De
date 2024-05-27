<?php extract($section); ?>

<section class="hero overflow-hidden py-60 relative">
    <div class="container relative z-1">
        <div class="flex align-center md:wrap">
            <div class="col w-60 md:w-100">
                <div class="service-rating flex align-center gap-20 xs:wrap xs:gap-10">
                    <div class="logo flex gap-10">
                        <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/rating/google-logo.svg"
                            class="w-px-100" alt="google" width="100" height="100">
                        <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/rating/star.svg"
                            alt="star" class="w-px-80" width="100" height="100">
                    </div>
                    <div class="label fs-20 xs:fs-14 xs:w-100">4.6 based on <span class="c-primary">70 reviews</span>

                    </div>
                </div>
                <div class="service-header mt-30">
                    <div class="service-logo max-w-px-150 max-h-px-60 mt-20 mb-20">
                        <img src="<?php echo $logo['url']; ?>" alt="shopware" width="100" height="100">
                    </div>
                    <div class="title">
                        <h1 class="h1-sml"><?php echo $title; ?></h1>

                        <p class="mt-30"><?php echo $description; ?></p>
                    </div>
                    <div class="btn-group mt-40"> <a href="<?php echo $cta['url']; ?>"
                            class="btn btn-pigment"><?php echo $cta['title']; ?></a>

                    </div>
                </div>
            </div>
            <?php if ($consultant['name'] || $form_selector): ?>
                <div class="col w-40 md:w-100 md:mt-40">
                    <div class="consultation-wrap b-1 bc-hash solid bg-white p-50 xs:p-30">
                        <h3 class="uppercase h4"><?php echo $form_title; ?></h3>

                        <p><?php echo $form_description; ?></p>
                        <div class="avatar-wrap flex mt-30">
                            <?php if ($consultant['image']): ?>
                                <div
                                    class="img-wrap w-px-75 h-px-75 max-w-px-75 min-w-px-75 xs:w-px-50 xs:h-px-50 xs:max-w-px-50 xs:min-w-px-50">
                                    <img src="<?php echo $consultant['image']['url']; ?>" alt="consultant" width="75"
                                        height="75">
                                </div>
                            <?php endif; ?>
                            <?php if ($consultant['name'] || $consultant['desig']): ?>
                                <div class="author ml-30">
                                    <div class="author-name font-bold"><?php echo $consultant['name'] ?></div><span
                                        class="designation font-light fs-15 lh-1-25 mt-5 inline-block"><?php echo $consultant['desig']; ?></span>

                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if ($form_selector): ?>
                            <div class="form-wrap mt-20">
                                <?php echo do_shortcode('[contact-form-7 id="' . $form_selector->ID . '"]'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="background-shape absolute z-0 right-0 top-0 w-60 h-px-500 md:w-80">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/laravel-bg.jpg"
            srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/laravel-bg.jpg, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/laravel-bg2x.jpg 2x"
            class="shape w-100 absolute top-0" alt="shopware" width="100" height="100">
    </div>
</section>
