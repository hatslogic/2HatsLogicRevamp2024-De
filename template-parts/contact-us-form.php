<?php 
$contact_form_image = get_field('contact_us_image', 'option');
$contact_form_image_mobile = get_field('contact_us_mobile', 'option');
$form_selector = get_field('contact_form_selector', 'option');
$contact_form_title = get_field('contact_form_title', 'option');
$contact_form_desc = get_field('contact_form_description', 'option');
?>
<section id="contact" class="contact bg-dark-primary c-white relative" id="contact">
<?php if($contact_form_image): ?>
    <picture class="h-100 w-50 absolute top-0 sm:w-100 sm:relative">
        <source media="(min-width: 1400px)" srcset="<?php echo webp($contact_form_image['sizes']['img_1650x1334']); ?>" type="image/webp">
        <source media="(min-width: 1400px)" srcset="<?php echo $contact_form_image['sizes']['img_1650x1334']; ?>" type="<?php echo $contact_form_image['mime_type']; ?>">
        <source media="(min-width: 1024px)" srcset="<?php echo webp($contact_form_image['sizes']['img_1200x862']); ?>" type="image/webp">
        <source media="(min-width: 1024px)" srcset="<?php echo $contact_form_image['sizes']['img_1200x862']; ?>" type="<?php echo $contact_form_image['mime_type']; ?>">
        <source media="(min-width: 991px)" srcset="<?php echo webp($contact_form_image['sizes']['img_1075x716']); ?>" type="image/webp">
        <source media="(min-width: 991px)" srcset="<?php echo $contact_form_image['sizes']['img_1075x716']; ?>" type="<?php echo $contact_form_image['mime_type']; ?>">
        <img src="<?php echo ($contact_form_image_mobile['sizes']['img_580x580']) ? $contact_form_image_mobile['sizes']['img_580x580'] : $contact_form_image['sizes']['img_580x580']; ?>" loading="lazy" class="h-100 cover" alt="contact" width="<?php echo $contact_form_image['sizes']['img_580x580-width']; ?>" height="<?php echo $contact_form_image['sizes']['img_580x580-height']; ?>">
    </picture>
   <?php endif; ?>
                <div class="flex align-center relative z-1">
                    <div class="col w-50 sm:hidden"></div>
                    <?php if($form_selector): ?>
                    <div class="col w-50 sm:w-100 p-80 sm:px-30 sm:py-60">
                        <div class="form-wrap">
                            <?php if ($contact_form_title || $contact_form_desc): ?>
                            <div class="title">
                                 <h2><?php echo $contact_form_title; ?></h2>

                                <p><?php echo  $contact_form_desc; ?></p>
                            </div>
                            <?php endif; ?>
                            <?php if ($form_selector): ?>
                            <div class="content">
                               <?php echo do_shortcode('[contact-form-7 id="' . $form_selector->ID . '"]'); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </section>