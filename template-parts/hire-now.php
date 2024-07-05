<?php
$hire_now_image = get_field('hire_now_image', 'option');
$hire_now_image_mobile = get_field('hire_now_image_mobile', 'option');
$form_shortcode = get_field('hire_now_form_shortcode', 'option');
?>

<div id="hire-now" class="modal fixed hire-now bg-overlay inset-0 z-14 h-100 w-100 transition">
    <div class="container h-100 xs:p-0">
        <div class="flex align-center h-100">
            <div class="flex xs:wrap w-100 h-90 xs:h-100 align-center relative bg-white z-1 xs:scroll-y">
                <button class="btn btn-secondary absolute xs:fixed z-1 top-0 right-0 close" onclick="closeModal('hire-now')">
                    <i class="icomoon icon-close"></i>
                </button>
                <div class="col w-50 h-100 xs:w-100 xs:h-50 md:hidden xs:visible">
                    <?php if($hire_now_image && $hire_now_image_mobile): ?>
                    <?php $cropOptions = [
                    "fallbackimage-size" => [800,540],
                    "fallbackimage-class" => "h-100 cover",
                    "picturetag-class" => "h-100 w-100 sm:w-100"
                    ];
                    if($hire_now_image_mobile){

                        $cropOptions["mobile-settings"] = [
                            "image" => $hire_now_image_mobile['ID']
                        ];
                    }
                    ?>
                    <?php display_responsive_image($hire_now_image['ID'],$cropOptions) ?>
                    <?php endif; ?>
                </div>
                <div class="col w-50 h-100 xs:h-auto md:w-100 md:h-auto p-60 md:px-20 xs:py-60 flex align-center">
                    <div class="form-wrap">
                    <?php echo do_shortcode('[contact-form-7 id="' . $form_shortcode->ID . '"]'); ?>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>