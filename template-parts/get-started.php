<?php
$get_started_image = get_field('get_started_image','option');
$get_started_image_mobile = get_field('get_started_image_mobile','option');
$form_selector =  get_field('form_shortcode','option');    
?>
<section id="get-started" class="get-started bg-dark-primary c-white relative" id="get-started">
    
    <?php if($get_started_image): ?>
    <picture class="h-100 w-50 absolute top-0 sm:w-100 sm:relative">
        <source media="(min-width: 1400px)" srcset="<?php echo webp($get_started_image['sizes']['img_1650x1334']); ?>" type="image/webp">
        <source media="(min-width: 1400px)" srcset="<?php echo $get_started_image['sizes']['img_1650x1334']; ?>" type="<?php echo $get_started_image['mime_type']; ?>">
        <source media="(min-width: 1024px)" srcset="<?php echo webp($get_started_image['sizes']['img_1200x862']); ?>" type="image/webp">
        <source media="(min-width: 1024px)" srcset="<?php echo $get_started_image['sizes']['img_1200x862']; ?>" type="<?php echo $get_started_image['mime_type']; ?>">
        <source media="(min-width: 991px)" srcset="<?php echo webp($get_started_image['sizes']['img_1075x716']); ?>" type="image/webp">
        <source media="(min-width: 991px)" srcset="<?php echo $get_started_image['sizes']['img_1075x716']; ?>" type="<?php echo $get_started_image['mime_type']; ?>">
        <img src="<?php echo ($get_started_image_mobile['sizes']['img_780x780']) ? $get_started_image_mobile['sizes']['img_780x780'] : $get_started_image['sizes']['img_780x780']; ?>" loading="lazy" class="h-100 cover" alt="get-started" width="<?php echo $get_started_image['sizes']['img_580x580-width']; ?>" height="<?php echo $get_started_image['sizes']['img_580x580-height']; ?>">
    </picture>
   <?php endif; ?>

    <?php if($form_selector): ?>
    <div class="flex align-center relative z-1">
        <div class="col w-50 sm:hidden"></div>
        <div class="col w-50 sm:w-100 p-80 sm:px-20 sm:py-60">
            <div class="form-wrap">
            <?php echo do_shortcode('[contact-form-7 id="' . $form_selector->ID . '"]'); ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</section>

