<?php
$offer_modal_image = get_field('offer_modal_image', 'option');
$offer_modal_image_mobile = get_field('offer_modal_image_mobile', 'option');
$form_shortcode = get_field('offer_modal_form_shortcode', 'option');
$form_title = get_field('offer_modal_form_title', 'option');
$form_description = get_field('offer_modal_form_description', 'option');
$get_dir = get_template_directory_uri();
?>

<div id="offer-modal" class="modal fixed get-a-quote bg-overlay inset-0 z-14 h-100 w-100 transition">
    <div class="container h-100 xs:p-0">
        <div class="flex align-center h-100">
            <div class="flex xs:wrap w-100 h-90 xs:h-100 align-center md:align-start relative bg-white z-1 xs:scroll-y">
                <a href="<?php echo home_url(); ?>" class="w-100 max-w-px-106 max-h-px-48 hidden md:visible brand absolute left-20 top-20" aria-label="<?php echo get_bloginfo('name'); ?>">
					<img src="<?php echo $get_dir; ?>/dist/assets/img/brand/logo-wide.svg"
						alt="<?php echo get_bloginfo('name'); ?>" class="w-100 w-100 max-w-px-106 max-h-px-48" width="106" height="48">
				</a>
                <button class="btn btn-secondary absolute xs:fixed z-1 top-20 right-20 close" onclick="closeModal('offer-modal')">
                    <i class="icomoon icon-close"></i>
                </button>
                <div class="col w-50 h-100 xs:w-100 xs:h-50 md:hidden">
                    <?php if ($offer_modal_image && $offer_modal_image_mobile) { ?>
                    
                    <?php
                        $mobile_aspectratio = [430, 466];
                        if ($offer_modal_image_mobile) {
                            $mobile_aspectratio = [430, 466, $offer_modal_image_mobile['ID']];
                        }
                        ?>

                    <?php
                        $cropOptions = [
                            '(max-width: 768px)' => $mobile_aspectratio,
                            '(min-width: 769px)' => [576, 701],
                        ];
                        $attributes = ['picturetag_class' => 'h-100 w-100 sm:w-100', 'class' => 'h-100 cover', 'loading' => 'lazy'];
                        ?>
                    <?php echo hatslogic_get_attachment_picture($offer_modal_image['ID'], $cropOptions, $attributes); ?>

                    <?php } ?>
                </div>
                <div class="col w-50 h-100 xs:h-auto md:w-100 md:h-auto p-60 md:px-20 md:pt-140 flex align-center md:block overflow-auto">
                    <div class="form-wrap">
                    
                    <div class=title>
                        <h2 class="h3"><?php echo $form_title;?></h2>
                        <p class="min-w-100"><?php echo $form_description;?></p>
                    </div>
                    <div class=content>
                    <?php echo do_shortcode('[contact-form-7 id="'.$form_shortcode->ID.'"]'); ?>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>