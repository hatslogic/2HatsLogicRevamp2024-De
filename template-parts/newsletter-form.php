<?php
$newsletter_image = get_field('newsletter_image', 'option');
$newsletter_image_mobile = get_field('newsletter_mobile', 'option');
$form_selector = get_field('form_selector', 'option');
?>

<section id="get-started" class="get-started bg-dark-primary c-white relative" id="get-started">
    <?php if ($newsletter_image && $newsletter_image_mobile): ?>
        <picture class="h-100 w-50 absolute top-0 sm:w-100 sm:relative">
            <source media="(min-width: 768px)" srcset="<?php echo $newsletter_image['sizes']['img_1650x1334']; ?>" type="image/webp">
            <source media="(min-width: 768px)" srcset="<?php echo $newsletter_image['sizes']['img_1650x1334']; ?>" type="<?php echo $newsletter_image['mime_type']; ?>">
            <source media="(min-width: 768px)" srcset="<?php echo $newsletter_image_mobile['sizes']['img_652x874']; ?>" type="image/webp">
            <source media="(max-width: 768px)" srcset="<?php echo $newsletter_image_mobile['sizes']['img_652x874']; ?>" type="<?php echo $newsletter_image_mobile['mime_type']; ?>">
            <img src="<?php echo $newsletter_image['sizes']['img_1650x1334']; ?>" loading="lazy" class="h-100 cover" alt="newsletter" width="800px" height="540px">
        </picture>
    <?php endif; ?>
    <div class="flex align-center relative z-1">
        <div class="col w-50 sm:hidden"></div>
        <div class="col w-50 sm:w-100 p-80 sm:px-20 sm:py-60">
            <?php if ($form_selector): ?>
                <div class="form-wrap">
                    <div class="content">
                        <?php echo do_shortcode('[contact-form-7 id="' . $form_selector->ID . '"]'); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>