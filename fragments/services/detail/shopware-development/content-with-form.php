<?php extract($section); ?>

<?php $review_rating = get_field('reviews', 'options'); ?>
<?php $bg_class = $bg_enabled ? 'bg-light-grey pt-100 pb-100 xs:pt-80 xs:pb-80' : 'bg-white'; ?>
<section class="hero pt-60 relative <?php echo $bg_class; ?>">
    <div class="container relative z-1">
        <div class="flex align-start justify-between md:wrap">
            <div class="col w-50 md:w-100">

                <?php if ($headline['heading'] || $description) { ?>
                <div class="service-header">
                    <div class="headline">
                        <?php if ($headline['heading']) { ?>
                        <h1 class="h1-sml"><?php echo $headline['heading']; ?></h1>
                        <?php } ?>
                        <?php if ($headline['sub_heading']) { ?>
                        <h2 class="h3 mt-15 xs:fs-20"><?php echo $headline['sub_heading']; ?></h2>
                        <?php } ?>
                        <p class="mt-30"><?php echo $description; ?></p>
                    </div>
                    <?php if ($cta || $modal) { ?>
                    <div class="btn-group flex align-center mt-60 md:mt-40 md:wrap md:column md:align-start">
                        <?php if ($action == 'modal') { ?>
                        <button onclick="openModal('<?php echo $modal['value']; ?>')"
                            class="btn btn-moonstone"><?php echo $modal['label']; ?></button>
                            <?php } ?>

                            <?php if ($action == 'link') { ?>
                            <a href="<?php echo $cta['url']; ?>"
                                class="btn btn-moonstone"><?php echo $cta['title']; ?></a>
                            <?php } ?>

                        <!-- rating -->
                        <?php if ($rating): ?>
                            <div class="rating flex align-center row ml-60 md:ml-0 md:mt-40 sm:column sm:align-start">

                                <?php if ($rating): ?>
                                    <div id="rating" class="logo-wrap grid grid-4 gap-30 ml-10 sm:ml-0 sm:mt-10 sm:flex sm:wrap sm:justify-start">
                                        <?php foreach ($rating['items'] as $item): ?>
                                            <a href="javascript:void(0)" aria-label="<?php echo $item['logo']['alt']; ?>"
                                                 rel="noopener" class="rating-item flex align-center justify-center nowrap">
                                                <img src="<?php echo $item['logo']['url']; ?>" alt="<?php echo $item['logo']['alt']; ?>" fetchpriority="high" class="md:max-w-px-80" width="120" height="60">
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        <?php endif; ?>    
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
                <?php if ($review['review']) { ?>
                <div class="review-wrap bg-light-grey p-20 mt-40">

                    <div class="avatar-wrap flex align-center">
                        <?php if ($review['avatar']) { ?>
                        <div
                            class="img-wrap radius-50 bg-light-grey w-px-50 h-px-50 max-w-px-50 min-w-px-50 over overflow-hidden">
                            <?php
                            $cropOptions = [
                                '(max-width: 768px)' => [34, 34],
                                '(min-width: 769px)' => [90, 90],
                            ];
                            $attributes = ['class' => 'transition', 'loading' => 'eager', 'fetchPriority' => 'high', 'picturetag_class' => 'loader'];
                            echo hatslogic_get_attachment_picture($review['avatar']['ID'], $cropOptions, $attributes);
                            ?>
                        </div>
                        <?php } ?>
                        <div class="author ml-15">
                            <div class="author-name fs-16 font-bold"><?php echo $review['name']; ?></div>
                        </div>
                    </div>
                    <div class="review-block flex gap-20 md:mt-10 w-100 xs:wrap xs:w-100">
                        <p class="fs-16 c-primary"><?php echo $review['review']; ?></p>
                    </div>
                    <?php if ($review_rating['rating'] || $review_rating['score']) { ?>
                    <div class="google-rating flex justify-between align-center xs:wrap mt-15 xs:mt-10">
                        <div class="rating-score flex align-center gap-20">
                            <?php if ($review_rating['platform']) { ?>
                            <img src="<?php echo $review_rating['platform']['url']; ?>" class="w-px-100"
                                alt="<?php echo $review_rating['platform']['alt']; ?>" class="w-px-80" width="80" height="16">
                            <?php } else { ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/rating/google-logo.svg"
                                alt="google" class="w-px-80" alt="google" width="80" height="16">
                            <?php } ?>
                            <?php if ($review_rating['rating']) { ?>
                            <img src="<?php echo $review_rating['rating']['url']; ?>"
                                alt="<?php echo $review_rating['rating']['alt']; ?>" class="w-px-90" width="90" height="18">
                            <?php } else { ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/rating/star.svg"
                                alt="star" class="w-px-90" width="90" height="18">
                            <?php } ?>
                        </div>
                        <div class="label fs-16 xs:mt-5">
                            <?php echo esc_html($review_rating['score']); ?> based on
                            <?php if (!empty($review_rating['link_to_review'])) { ?>
                            <a href="<?php echo esc_url($review_rating['link_to_review']['url']); ?>" target="_blank"
                                class="c-primary">
                                <?php } ?>
                                <?php echo esc_html($review_rating['total']); ?> reviews
                                <?php if (!empty($review_rating['link_to_review'])) { ?>
                            </a>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
                
            </div>
            <?php if ($consultant['name'] || $form_selector) { ?>
            <div class="col w-40 md:w-100 md:mt-40">
                <div class="consultation-wrap bg-white p-50 xs:p-30 shadow-rating">
                    <h3 class="uppercase h4"><?php echo $form_title; ?></h3>

                    <p><?php echo $form_description; ?></p>
                    <div class="avatar-wrap flex align-center mt-30">
                        <?php if ($consultant['image']) { ?>
                        <div
                            class="img-wrap bg-light-grey w-px-75 h-px-75 max-w-px-75 min-w-px-75 xs:w-px-50 xs:h-px-50 xs:max-w-px-50 xs:min-w-px-50">
                            <?php
                            $cropOptions = [
                                '(max-width: 768px)' => [34, 34],
                                '(min-width: 769px)' => [90, 90],
                            ];
                            $attributes = ['class' => 'transition', 'loading' => 'eager', 'fetchPriority' => 'high'];
                            echo hatslogic_get_attachment_picture($consultant['image']['ID'], $cropOptions, $attributes);
                            ?>
                        </div>
                        <?php } ?>
                        <?php if ($consultant['name'] || $consultant['desig']) { ?>
                        <div class="author ml-30">
                            <div class="author-name fs-18 font-bold"><?php echo $consultant['name']; ?></div>
                            <span
                                class="designation font-regular fs-15 lh-1-35 mt-8 inline-block"><?php echo $consultant['desig']; ?></span>

                        </div>
                        <?php } ?>
                    </div>
                    <?php if ($form_selector) { ?>
                    <div class="form-wrap mt-20">
                        <?php echo do_shortcode('[contact-form-7 id="'.$form_selector->ID.'"]'); ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="bg-shape h-100 pb-0 absolute z-0 right-0 top-0 w-50 md:hidden">
        <picture class="shape absolute -top-10">
            <source srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/service-bg.webp 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/service-bg.webp 2x" media="(min-width: 768px)" type="image/webp">
            <source srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/service-bg.webp 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/service-bg.webp 2x" media="(max-width: 767px)" type="image/webp">
            <source srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/service-bg.jpg 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/service-bg.jpg 2x" media="(min-width: 768px)" type="image/jpg">
            <source srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/service-bg.jpg 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/service-bg.jpg 2x" media="(max-width: 767px)" type="image/jpg">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/service-bg.jpg" alt="shopware" width="100" height="100">
        </picture>
    </div>
</section> 