<?php
$get_dir = get_template_directory_uri();
$modal_id = get_query_var('cta_modal_id', 'popup-cta-contact-' . uniqid());
$title = get_query_var('cta_title', 'Ready to Get Started?');
$content = get_query_var('cta_content', 'Get in touch with our experts and let\'s discuss your project.');
$contact_form_id = get_query_var('cta_contact_form_id', '');
?>

<div id="<?php echo esc_attr($modal_id); ?>" class="modal fixed contact-us bg-overlay inset-0 z-14 h-100 w-100 transition">
    <div class="container max-w-px-640 h-100 xs:p-0">
        <div class="flex align-center h-100">
            <div class="flex xs:wrap w-100 h-auto xs:h-100 align-center md:align-start relative bg-white z-1 xs:scroll-y">
                <button class="btn btn-secondary absolute xs:fixed z-1 top-20 right-20 close" onclick="closeModal('<?php echo esc_attr($modal_id); ?>')">
                    <i class="icomoon icon-close"></i>
                </button>

                <div class="col w-100 h-100 xs:h-auto md:h-auto px-80 py-45 md:px-20 md:pt-140 flex align-center md:block">
                    <div class="form-wrap w-100">

                        <?php if (!empty($contact_form_id)): ?>
                            <?php echo do_shortcode('[contact-form-7 id="' . $contact_form_id . '"]'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>