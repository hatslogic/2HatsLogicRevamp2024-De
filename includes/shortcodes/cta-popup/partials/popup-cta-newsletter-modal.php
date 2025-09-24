<?php
$get_dir = get_template_directory_uri();
$modal_id = get_query_var('cta_modal_id', 'popup-cta-newsletter-' . uniqid());
$title = get_query_var('cta_title', 'Stay Updated');
$content = get_query_var('cta_content', 'Subscribe to our newsletter for the latest insights and updates.');
$newsletter_tags = get_query_var('cta_newsletter_tags');
?>

<div id="<?php echo esc_attr($modal_id); ?>" class="modal fixed newsletter-subscription bg-overlay inset-0 z-14 h-100 w-100 transition">
    <div class="container max-w-px-640 h-100 xs:p-0">
        <div class="flex align-center h-100">
            <div class="flex xs:wrap w-100 h-auto xs:h-100 align-center md:align-start relative bg-white z-1 xs:scroll-y">

                <button class="btn btn-secondary absolute xs:fixed z-1 top-20 right-20 close" onclick="closeModal('<?php echo esc_attr($modal_id); ?>')">
                    <i class="icomoon icon-close"></i>
                </button>
                
                <div class="col w-100 h-100 xs:h-auto md:h-auto px-80 py-45 md:px-20 md:pt-140 flex align-center md:block">
                    <div class="form-wrap w-100">
                        <div class="text-center">
                            <div class="w-100 flex justify-center mb-35">
                                <img src="<?php echo $get_dir; ?>/dist/assets/img/newsletter-mail.svg" alt="Newsletter" width="67" height="67" class="w-100 max-w-px-67 max-h-px-67">
                            </div>
                            <h2 class="h3 fs-30 c-black"><?php echo esc_html($title); ?></h2>
                            <p class="fs-16 c-grey mt-20"><?php echo esc_html($content); ?></p>
                        </div>
                        <div class="content">
                            <div class="form form-lined mt-25">
                                <form class="newsletter-form" data-type="newsletter" data-modal-id="<?php echo esc_attr($modal_id); ?>">
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="<?php echo __('Name', 'app'); ?>">
                                    </div>
                                    <div class="form-group mt-20">
                                        <input type="email" name="email" placeholder="<?php echo __('Email *', 'app'); ?>" required>
                                    </div>
                                    <div class="form-group mt-20">
                                        <div class="cf-turnstile"></div>
                                    </div>
                                    <input type="hidden" name="newsletter_tags" value="<?php echo esc_attr($newsletter_tags); ?>">
                                    <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('hl_cta_nonce'); ?>">
                                    <button type="submit" class="btn btn-primary w-100 mt-20"><?php echo __('Subscribe', 'app'); ?></button>
                                    <div class="form-message mt-20" style="display: none;"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
