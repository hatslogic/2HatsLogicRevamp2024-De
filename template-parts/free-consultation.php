<?php
$free_consultation_image = get_field('free_consultation_image', 'option');
$free_consultation_image_mobile = get_field('free_consultation_image_mobile', 'option');
$form_shortcode = get_field('form_shortcode', 'option');
?>

<div id="free-consultation" class="modal fixed free-consultation bg-overlay inset-0 z-10 h-100 transition">
    <div class="container h-100 xs:p-0">
        <div class="flex align-center h-100">
            <div class="flex xs:wrap w-100 h-90 xs:h-100 align-center relative bg-white z-1 xs:scroll-y">
                <button class="btn btn-secondary absolute xs:fixed top-0 right-0 close" onclick="closeModal('free-consultation')">
                    <i class="icomoon icon-close"></i>
                </button>
                <div class="col w-50 h-100 xs:w-100 xs:h-40 md:hidden xs:visible">
                    <?php if($free_consultation_image && $free_consultation_image_mobile): ?>
                    <picture class="h-100 w-100 sm:w-100">
                        <source media="(min-width: 768px)" srcset="<?php echo $free_consultation_image['sizes']['img_652x874']; ?>" type="image/webp">
                        <source media="(min-width: 768px)" srcset="<?php echo $free_consultation_image['sizes']['img_652x874']; ?>" type="<?php echo $free_consultation_image['mime_type']; ?>">
                        <source media="(max-width: 768px)" srcset="<?php echo $free_consultation_image_mobile['sizes']['img_652x874']; ?>" type="image/webp">
                        <source media="(max-width: 768px)" srcset="<?php echo $free_consultation_image_mobile['sizes']['img_652x874']; ?>" type="<?php echo $free_consultation_image_mobile['mime_type']; ?>">
                        <img src="<?php echo $free_consultation_image['sizes']['img_652x874']; ?>" loading="lazy" class="h-100 cover" alt="get-started" width="800px" height="540px">
                    </picture>
                    <?php endif; ?>
                </div>
                <div class="col w-50 h-100 xs:h-auto md:w-100 p-60 xs:px-30 xs:py-60 flex align-center">
                    <div class="form-wrap">
                        <?php echo do_shortcode($form_shortcode); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>