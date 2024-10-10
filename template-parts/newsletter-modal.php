<?php
$form_heading = get_field('newsletter_modal_heading', 'option');
$form_description = get_field('newsletter_modal_description', 'option');
$form_shortcode = get_field('newsletter_form_shortcode', 'option');
$get_dir = get_template_directory_uri();
?>
<div id="newsletter-subscription" class="modal fixed newsletter-subscription bg-overlay inset-0 z-14 h-100 w-100 transition">
    <div class="container max-w-px-640 h-100 xs:p-0">
        <div class="flex align-center h-100">
            <div class="flex xs:wrap w-100 h-auto xs:h-100 align-center md:align-start relative bg-white z-1 xs:scroll-y"> <a href="#" class="w-100 max-w-px-106 max-h-px-48 hidden md:visible brand absolute left-20 top-20" aria-label="2hatslogic">
                    <img src="<?php echo $get_dir;?>/dist/assets/img/brand/logo-wide.svg" class="w-100 max-w-px-106 max-h-px-48" alt="2hatslogic" width="106" height="48">
                </a>

                <button class="btn btn-secondary absolute xs:fixed z-1 top-20 right-20 close" onclick="closeModal('newsletter-subscription')"> <i class="icomoon icon-close"></i>

                </button>
                <div class="col w-100 h-100 xs:h-auto md:h-auto px-80 py-45 md:px-20 md:pt-140 flex align-center md:block">
                    <div class="form-wrap w-100">
                        <div class="text-center">
                            <div class="w-100 flex justify-center mb-35">
                                <img src="<?php echo $get_dir;?>/dist/assets/img/newsletter-mail.svg" alt="2hatslogic" width="67" height="67" class="w-100 max-w-px-67 max-h-px-67">
                            </div>
                             <h2 class="h3 fs-30 c-black"><?php echo $form_heading;?></h2>

                            <p class="fs-16 c-grey"><?php echo $form_description;?></p>
                        </div>
                        <div class="content">
                            <div class="form form-lined mt-25">
                                <?php echo $form_shortcode;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
window.addEventListener('message', event => {
   if(event.data.type === 'hsFormCallback' && event.data.eventName === 'onFormSubmitted') {
       
       setCookie("modalClosed", "true", 7);
   }
});
</script>    