<?php 
$contact_form_image = get_field('contact_us_image', 'option');
$contact_form_image_mobile = get_field('contact_us_mobile', 'option');
$form_selector = get_field('contact_form_selector', 'option');
$contact_form_title = get_field('contact_form_title', 'option');
$contact_form_desc = get_field('contact_form_description', 'option');
?>
<section id="contact" class="contact bg-dark-primary c-white relative" id="contact">
<?php if($contact_form_image): ?>
    <?php $cropOptions = [
            "fallbackimage-size" => [580,580],
            "fallbackimage-class" => "h-100 cover",
            "picturetag-class" => "h-100 w-50 absolute top-0 sm:w-100 sm:relative"
    ];?>
        <?php display_responsive_image($contact_form_image['ID'],$cropOptions) ?>
   <?php endif; ?>
                <div class="flex align-center relative z-1">
                    <div class="col w-50 sm:hidden"></div>
                    <?php if($form_selector): ?>
                    <div class="col w-50 sm:w-100 p-80 sm:px-20 sm:py-60">
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