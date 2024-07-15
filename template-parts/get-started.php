<?php
$get_started_image = get_field('get_started_image', 'option');
$get_started_image_mobile = get_field('get_started_image_mobile', 'option');
$form_selector = get_field('get_started_form_shortcode', 'option');
?>
<section id="get-started" class="get-started bg-dark-primary c-white relative" id="get-started">
    
    <?php if ($get_started_image) { ?>
        
        <?php
            $mobile_aspectratio = [430, 430];
        if ($get_started_image_mobile) {
            $mobile_aspectratio = [430, 430, $get_started_image_mobile['ID']];
        }
        ?>
        <?php
            $cropOptions = [
                '(max-width: 768px)' => $mobile_aspectratio,
                '(min-width: 769px)' => [952, 696],
            ];
        $attributes = ['picturetag_class' => 'h-100 w-50 absolute top-0 sm:w-100 sm:relative', 'class' => 'h-100 cover', 'loading' => 'lazy'];
        ?>
            <?php echo hatslogic_get_attachment_picture($get_started_image['ID'], $cropOptions, $attributes); ?>
   <?php } ?>

    <?php if ($form_selector) { ?>
    <div class="flex align-center relative z-1">
        <div class="col w-50 sm:hidden"></div>
        <div class="col w-50 sm:w-100 p-80 sm:px-20 sm:py-60">
            <div class="form-wrap">
            <?php echo do_shortcode('[contact-form-7 id="'.$form_selector->ID.'"]'); ?>
            </div>
        </div>
    </div>
    <?php } ?>
</section>

