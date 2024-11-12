<?php
$get_a_quote_image = get_field('get_a_quote_image', 'option');
$get_a_quote_image_name = get_field('get_a_quote_image_name', 'option');
$get_a_quote_image_position = get_field('get_a_quote_image_position', 'option');
$get_a_quote_image_mobile = get_field('get_a_quote_image_mobile', 'option');
$form_shortcode = get_field('get_a_quote_form_shortcode', 'option');
$get_dir = get_template_directory_uri();
?>

<div id="get-a-quote" class="modal fixed get-a-quote bg-overlay inset-0 z-14 h-100 w-100 transition">
    <div class="container h-100 xs:p-0">
        <div class="flex align-center h-100">
            <div class="flex xs:wrap w-100 h-90 xs:h-100 align-center md:align-start relative bg-white z-1 xs:scroll-y">
                <a href="<?php echo home_url(); ?>" class="w-100 max-w-px-106 max-h-px-48 hidden md:visible brand absolute left-20 top-20" aria-label="<?php echo get_bloginfo('name'); ?>">
					<img src="<?php echo $get_dir; ?>/dist/assets/img/brand/logo-wide.svg"
						alt="<?php echo get_bloginfo('name'); ?>" class="w-100 w-100 max-w-px-106 max-h-px-48" width="106" height="48">
				</a>
                <button class="btn btn-secondary absolute xs:fixed z-1 top-20 right-20 close" onclick="closeModal('get-a-quote')">
                    <i class="icomoon icon-close"></i>
                </button>
                <div class="col w-50 h-100 xs:w-100 xs:h-50 md:hidden relative">
                    <?php if ($get_a_quote_image && $get_a_quote_image_mobile) { ?>
                    
                    <?php
                        $mobile_aspectratio = [430, 430];
                        if ($get_a_quote_image_mobile) {
                            $mobile_aspectratio = [430, 430, $get_a_quote_image_mobile['ID']];
                        }
                        ?>

                    <?php
                        $cropOptions = [
                            '(max-width: 768px)' => $mobile_aspectratio,
                            '(min-width: 769px)' => [800, 800],
                        ];
                        $attributes = ['picturetag_class' => 'h-100 w-100 sm:w-100', 'class' => 'h-100 cover', 'loading' => 'lazy'];
                        ?>
                    <?php echo hatslogic_get_attachment_picture($get_a_quote_image['ID'], $cropOptions, $attributes); ?>

                    <?php } ?>

                    <?php if ($get_a_quote_image_name && $get_a_quote_image_position) { ?>
                    <div class="absolute p-20 c-white  bottom-0 left-0 w-100 shadow-name">
                        <h4 class="mb-5"><?php echo $get_a_quote_image_name; ?></h4> 
                        <span><?php echo $get_a_quote_image_position; ?></span>
                    </div>
                    <?php } ?>


                </div>
                <div class="col w-50 h-100 xs:h-auto md:w-100 md:h-auto p-60 md:px-20 md:pt-140 flex align-center md:block">
                    <div class="form-wrap">
                    <?php echo do_shortcode('[contact-form-7 id="'.$form_shortcode->ID.'"]'); ?>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>