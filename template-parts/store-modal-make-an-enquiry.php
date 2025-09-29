<?php
$make_an_enquiry_popup = get_field('make_an_enquiry_popup', 'option');
$get_dir = get_template_directory_uri();
?>
<div id="make-an-enquiry" class="modal fixed free-consultation bg-overlay inset-0 z-14 h-100 w-100 transition">
    <div class="container h-100 xs:p-0">
        <div class="flex align-center h-100">
            <div class="flex xs:wrap w-100 h-90 xs:h-100 align-center md:align-start relative bg-white z-1 xs:scroll-y">
                <a href="<?php echo home_url(); ?>" class="w-100 max-w-px-106 max-h-px-48 hidden md:visible brand absolute left-20 top-20" aria-label="2hatslogic">
                    <img src="<?php echo $get_dir; ?>/dist/assets/img/brand/logo-wide.svg" class="w-100 max-w-px-106 max-h-px-48" alt="<?php echo get_bloginfo('name'); ?>" width="106" height="48">
                </a>
                <button class="btn btn-secondary absolute xs:fixed z-1 top-20 right-20 close" onclick="closeModal('make-an-enquiry')">
                    <i class="icomoon icon-close"></i>
                </button>
                <div class="col w-50 h-100 xs:w-100 xs:h-50 md:hidden relative">

                    <?php if ($make_an_enquiry_popup['cover_image'] && $make_an_enquiry_popup['mobile_cover_image']) { ?>                   
                        <?php
                        $mobile_aspectratio = [430, 430];
                        if ($make_an_enquiry_popup['mobile_cover_image']) {
                            $mobile_aspectratio = [430, 430, $make_an_enquiry_popup['mobile_cover_image']['ID']];
                        }
                        ?>

                        <?php
                        $cropOptions = [
                            '(max-width: 768px)' => $mobile_aspectratio,
                            '(min-width: 769px)' => [768, 768],
                        ];
                        $attributes = ['picturetag_class' => 'h-100 w-100 sm:w-100', 'class' => 'h-100 cover', 'loading' => 'lazy'];
                        ?>
                        <?php echo hatslogic_get_attachment_picture($make_an_enquiry_popup['cover_image']['ID'], $cropOptions, $attributes); ?>
                    <?php } ?>
                </div>
                <div class="col w-50 h-100 xs:h-auto md:w-100 md:h-auto p-60 md:px-20 md:pt-140 flex align-center md:block">
                    <div class="form-wrap">
                        <?php if ($make_an_enquiry_popup['form']) : ?>
                            <?php $form = $make_an_enquiry_popup['form']; ?>
                            <?php echo do_shortcode('[contact-form-7 id="'.$form->ID.'"]'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>