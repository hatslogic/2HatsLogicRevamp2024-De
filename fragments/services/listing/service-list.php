<?php extract($section); ?>
<section class="service-list pt-100 pb-100 xs:pt-80 xs:pb-80 relative">
    <div class="container relative z-1">
        <?php if ($hero['title']|| $hero['description']): ?>
        <div class="title"> <span class="headline c-primary font-bold"><?php echo $hero['sub_title'] ?></span>

            <h1 class="h1-sml"><?php echo $hero['title'] ?></h1>

            <p><?php echo $hero['description']; ?>
            </p>
        </div>
        <?php endif; ?>
        <?php if ($items): ?>
        <div class="content mt-60 md:mt-50 xs:mt-30">
            <div class="grid grid-3 md:grid-2 xs:grid-1 gap-100 md:gap-40 xs:gap-20">

                <?php foreach ($items as $key => $item): 
                        setup_postdata($item); 
                        $formatted_key = sprintf("%02d", $key + 1); 
                        $desc = get_the_excerpt($item->ID);
                    ?>
                <div class="col">
                    <div class="item">
                        <span class="fs-100 opacity-20 font-thin -ml-6 xs:fs-80"><?php echo $formatted_key; ?></span>
                        <h4 class="h4 mt-15"><?php echo get_the_title($item->ID); ?></h4>
                        <p><?php echo truncate_text($desc, 120); ?></p>
                        <a href="<?php echo get_permalink($item->ID); ?>" class="link link-primary">Read More <i
                                class="icomoon icon-chevron_right"></i></a>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>

            </div>
        </div>
        <?php endif; ?>
    </div>
    <div class="bg-shape absolute z-0 right-0 top-0 w-60  h-px-500 md:w-80">
        <picture class="shape w-100 absolute -top-10">
            <source srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/service-main-bg.webp 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/service-main-bg2x.webp 2x" media="(min-width: 768px)" type="image/webp">
            <source srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/service-main-bg-mobile.webp 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/service-main-bg-mobile.webp 2x" media="(max-width: 767px)" type="image/webp">
            <source srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/service-main-bg.jpg 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/service-main-bg2x.jpg 2x" media="(min-width: 768px)" type="image/jpg">
            <source srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/service-main-bg-mobile.jpg 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/service-main-bg-mobile.jpg 2x" media="(max-width: 767px)" type="image/jpg">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/service-main-bg.jpg" alt="service" width="100" height="100">
        </picture>
    </div>
</section>
