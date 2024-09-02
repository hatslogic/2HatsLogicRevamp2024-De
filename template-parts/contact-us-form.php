<?php
$contact_form_image = get_field('contact_us_image', 'option');
$contact_form_image_mobile = get_field('contact_us_mobile', 'option');
$form_selector = get_field('contact_form_selector', 'option');
$contact_form_title = get_field('contact_form_title', 'option');
$contact_form_desc = get_field('contact_form_description', 'option');
?>
<section id="contact" class="contact bg-dark-primary c-white relative" id="contact">
<?php if ($contact_form_image) { ?>
<?php
    $cropOptions = [
        '(max-width: 768px)' => [375, 262],
        '(min-width: 769px)' => [952, 742],
    ];
    $attributes = ['class' => 'transition', 'loading' => 'lazy', 'picturetag_class' => 'h-100 w-50 absolute top-0 sm:w-100 sm:relative'];
    ?>
<?php echo hatslogic_get_attachment_picture($contact_form_image['ID'], $cropOptions, $attributes); ?>
   <?php } ?>
                <div class="flex align-center relative z-1">
                    <div class="col w-50 sm:hidden"></div>
                    <?php if ($form_selector) { ?>
                    <div class="col w-50 sm:w-100 p-80 sm:px-20 sm:py-60 min-h-px-600 md:min-h-px-200">
                        <div class="form-wrap">
                            <?php if ($contact_form_title || $contact_form_desc) { ?>
                            <div class="title">
                                 <h2><?php echo $contact_form_title; ?></h2>

                                <p><?php echo $contact_form_desc; ?></p>
                            </div>
                            <?php } ?>
                            <?php if ($form_selector) { ?>
                            <div class="content">
                               <?php echo do_shortcode('[contact-form-7 id="'.$form_selector->ID.'"]'); ?>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </section>