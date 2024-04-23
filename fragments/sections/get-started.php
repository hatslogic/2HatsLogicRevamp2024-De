<?php extract($section); ?>

<section id="get-started" class="get-started bg-dark-primary c-white relative" id="get-started">
    <?php if($get_started_image): ?>
    <picture class="h-100 w-50 absolute top-0 sm:w-100 sm:relative">
        <source media="(min-width: 1536px)" srcset="<?php echo webp($get_started_image['sizes']['img_960x690']); ?>" type="image/webp">
        <source media="(min-width: 1536px)" srcset="<?php echo $get_started_image['sizes']['img_960x690']; ?>" type="<?php echo $get_started_image['mime_type']; ?>">
        <source media="(min-width: 1320px)" srcset="<?php echo webp($get_started_image['sizes']['img_712x652']); ?>" type="image/webp">
        <source media="(min-width: 1320px)" srcset="<?php echo $get_started_image['sizes']['img_712x652']; ?>" type="<?php echo $get_started_image['mime_type']; ?>">
        <source media="(min-width: 1024px)" srcset="<?php echo webp($get_started_image['sizes']['img_975x650']); ?>" type="image/webp">
        <source media="(min-width: 1024px)" srcset="<?php echo $get_started_image['sizes']['img_975x650']; ?>" type="<?php echo $get_started_image['mime_type']; ?>">
        <source media="(min-width: 991px)" srcset="<?php echo webp($get_started_image['sizes']['img_765x510']); ?>" type="image/webp">
        <source media="(min-width: 991px)" srcset="<?php echo $get_started_image['sizes']['img_765x510']; ?>" type="<?php echo $get_started_image['mime_type']; ?>">
        <img src="<?php echo $get_started_image['sizes']['img_580x580']; ?>" loading="lazy" class="h-100 cover" alt="get-started" width="<?php echo $get_started_image['sizes']['img_580x580-width']; ?>" height="<?php echo $get_started_image['sizes']['img_580x580-height']; ?>">
    </picture>
    <?php endif; ?>

    <?php if($form_shortcode): ?>
    <div class="flex align-center relative z-1">
        <div class="col w-50 sm:hidden"></div>
        <div class="col w-50 sm:w-100 p-80 sm:px-30 sm:py-60">
            <div class="form">
                <?php echo do_shortcode($form_shortcode); ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</section>