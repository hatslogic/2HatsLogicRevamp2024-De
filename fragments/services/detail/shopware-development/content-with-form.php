<?php extract($section); ?>

<section class="hero py-60 relative">
    <div class="container relative z-1">
        <div class="flex align-center md:wrap">
            <div class="col w-60 md:w-100"> 
                <?php if ($rating || $score): ?>
                    <div class="service-rating flex align-center gap-20 xs:wrap xs:gap-10">
                    <?php if (!empty($rating['url'])): ?>    
                    <div class="logo flex gap-10">
                            <img src="<?php echo $platform['url'] ?>" class="w-px-100" alt="google" width="100"
                                height="100">
                            <img src="<?php echo $rating['url'] ?>" alt="star" class="w-px-80" width="100"
                                height="100">
                        </div>
                        <?php endif; ?>
                        <?php if (!empty($score)): ?>
                            <div class="label fs-20 xs:fs-14 xs:w-100">
                                <?php echo esc_html($score); ?>
                                <?php if (!empty($total)): ?>
                                    based on <span class="c-primary"><?php echo esc_html($total); ?> reviews</span>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                 </div>
                <?php endif; ?>
                <?php if ($headline['heading'] || $description): ?>
                    <div class="service-header mt-30">
                        <div class="title">
                            <h1 class="h1-sml"><?php echo $headline['heading']; ?></h1>

                            <h2 class="h3 mt-15 xs:fs-12"><?php echo $headline['sub_heading']; ?></h2>

                            <p class="mt-30"><?php echo $description; ?></p>
                        </div>
                        <?php if ($cta): ?>
                            <div class="btn-group mt-30"> 
                                <a href="<?php echo $cta['url']; ?>" class="btn btn-primary"><?php echo $cta['title']; ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if ($review['review']): ?>
                    <div class="review-block mt-40 xs:mt-30 flex gap-20 w-90 xs:wrap xs:w-100">
                        <div class="avatar-wrap flex mt-30 align-center w-px-300 md:w-100">
                            <?php if ($review['avatar']): ?>
                                <div
                                    class="img-wrap w-px-75 h-px-75 max-w-px-75 min-w-px-75 xs:w-px-50 xs:h-px-50 xs:max-w-px-50 xs:min-w-px-50 over overflow-hidden">
                                    <img src="<?php echo $review['avatar']['url']; ?>" alt="avatar" width="100" height="100">
                                </div>
                            <?php endif; ?>
                            <div class="author ml-20">
                                <div class="author-name fs-20 xs:fs-16 font-bold"><?php echo $review['name']; ?></div> <span
                                    class="rating-score font-light fs-15 lh-1-2 mt-5 inline-block">
                                    <img src="<?php echo $review['rating']['url'] ?>" alt="star" class="w-px-100 xs:w-px-75"
                                        width="100" height="100">
                                </span>

                            </div>
                        </div>
                        <div class="rewiew-wrap w-80 xs:w-100 xs:mt-10 px-20 py-0 bg-light-blue">
                            <p class="fs-20 xs:fs-16 c-primary"><?php echo $review['review']; ?></p>
                        </div>
                    </div>
                <?php endif; ?>
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
                                    <img src="<?php echo $consultant['image']['url']; ?>" alt="avatar" width="75" height="75">
                                </div>
                            <?php endif; ?>
                            <?php if ($consultant['name'] || $consultant['desig']): ?>
                                <div class="author ml-30">
                                    <div class="author-name font-bold"><?php echo $consultant['name'] ?></div>
                                    <span
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
    <div class="bg-shape absolute z-0 right-0 top-0 w-60 h-px-500 md:w-80">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shape-01.png"
            srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shape-01.png 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shape-012x.png 2x"
            class="shape w-100 absolute top-0" alt="shopware" width="100" height="100">
    </div>
</section>