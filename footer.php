<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @see https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>

<footer class="footer sm:mb-80 xs:mb-0">
    <div class="container">
        <div class="footer-top py-80 flex nowrap justify-between md:wrap xs:py-60">
            <div class="col w-60 md:w-100">
                <div class="menu flex align-start justify-between sm:wrap sm:justify-start">
                    <div class="col xl:w-40 xs:w-100">
                        <div class="menu-group mt-0">
                        <div class="h4 font-bold">Dienstleistungen</div>
                            <?php
                            wp_nav_menu([
                                'menu' => 'service-menu',
                                'theme_location' => 'service-menu',
                                'container' => false,
                                'menu_class' => 'no-bullets font-regular mt-20 sm:mt-15',
                                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'walker' => new FOOTER_Menu_Walker(),
                            ]);
?>
                        </div>
                        <div class="menu-group mt-40">
                        <div class="h4 font-bold">Unsere Shopware-Service-Standorte</div>
                            <?php
                            wp_nav_menu([
                                'menu' => 'locations',
                                'theme_location' => 'locations',
                                'container' => false,
                                'menu_class' => 'no-bullets font-regular mt-20 sm:mt-15',
                                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'walker' => new FOOTER_Menu_Walker(),
                            ]);
?>
                        </div>
                    </div>
                    <div class="col px-20 xs:pl-0 xs:pr-0 xl:w-40 xs:w-100">
                        <div class="menu-group mt-0 xs:mt-40">
                        <div class="h4 font-bold">Entwickler anheuern</div>
                            <?php
wp_nav_menu([
    'menu' => 'hide-developer-menu',
    'theme_location' => 'hide-developer-menu',
    'container' => false,
    'menu_class' => 'no-bullets font-regular mt-20 sm:mt-15',
    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'walker' => new FOOTER_Menu_Walker(),
]);
?>
                        </div>
                        <div class="menu-group mt-40">
                        <div class="h4 font-bold">Unternehmen</div>
                            <?php
wp_nav_menu([
    'menu' => 'company-menu',
    'theme_location' => 'company-menu',
    'container' => false,
    'menu_class' => 'no-bullets font-regular mt-20 sm:mt-15',
    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'walker' => new FOOTER_Menu_Walker(),
]);
?>
                        </div>
                    </div>
                    <div class="col xl:w-20 xs:w-100">
                        <div class="menu-group mt-0 xs:mt-40">
                        <div class="h4 font-bold">Schnelle Links</div>
                            <?php
wp_nav_menu([
    'menu' => 'quick-links-menu',
    'theme_location' => 'quick-links-menu',
    'container' => false,
    'menu_class' => 'no-bullets font-regular mt-20',
    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'walker' => new FOOTER_Menu_Walker(),
]);
?>
                        </div>
                        <?php
$tools_menu_items = wp_get_nav_menu_items('tools-menu');
if ($tools_menu_items) {
?>
                        <div class="menu-group mt-40">
                            <a href="#" class="h4 font-bold">Tools</a>
                            <?php
wp_nav_menu([
    'menu' => 'tools-menu',
    'theme_location' => 'tools-menu',
    'container' => false,
    'menu_class' => 'no-bullets font-regular mt-20',
    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'walker' => new FOOTER_Menu_Walker(),
]);
?>
                        </div>
                        <?php
} ?>
                    </div>
                </div>
            </div>
            <div class="col w-40 md:w-100 md:mt-40 flex justify-end md:justify-start sm:justify-center">
                <div class="flex justify-between column sm:w-100 b-0 sm:bt-1 sm:pt-40 bc-hash solid xs:text-center">
                    <div class="accreditation accreditation-de sm:w-50 xs:w-100">
                        <div class="h4 font-bold">Akkreditierung</div>
                        <div class="block xs:flex xs:justify-center">
                            <?php $badges = get_field('badges', 'option'); ?>
                            <?php if ($badges) { ?>
                            <?php foreach ($badges as $index => $badge) { ?>
                            <?php if ($index % 3 == 0) { // Start a new row for every 3 badges?>
                            <?php if ($index > 0) { // Close the previous row if it's not the first set?>
                        </div>
                        <?php } ?>
                        <div
                            class="flex justify-start mt-30 xs:justify-center <?php echo $index > 0 ? 'sm:ml-20' : ''; ?>">
                            <?php } ?>
                            <div class="col <?php echo $index % 3 > 0 ? 'ml-20' : ''; ?>">
                                <a href="<?php echo esc_url($badge['link']); ?>" target="_blank">
                                    <img src="<?php echo esc_url($badge['badge_image']); ?>"
                                        alt="<?php echo esc_attr($badge['alt_text']); ?>" loading="lazy" width="100"
                                        height="100">
                                </a>
                            </div>
                            <?php if ($index == count($badges) - 1) { // Close the last row?>
                        </div>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <div class="contact sm:w-50 xs:w-100">
                    <div class="block sm:flex xs:justify-center">
                        <div class="flex column justify-start mt-30 md:mt-60 xs:align-center">
                            <a class="inline" href="https://clutch.co/profile/2hats-logic-solutions-private?utm_source=widget&utm_medium=2&utm_campaign=widget&utm_content=logo&utm_term=www.2hatslogic.com#highlights" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/clutch.svg" alt="clutch" loading="lazy" width="100" height="100" class="max-w-px-180">
                            </a>
                            <a href="https://www.google.com/maps/place/Shopware+Agentur+Berlin+Germany+%7C+2Hats+Logic+Solutions/@52.4939273,13.381545,17z/data=!3m1!4b1!4m6!3m5!1s0x47a8513024d55f33:0xbd7c6d02f852cefa!8m2!3d52.4939273!4d13.3841199!16s%2Fg%2F11y49zxb7g?hl=en-GB&entry=ttu" class="mt-15 lh-1-25 fs-14 xxl:fs-16" target="_blank">
                                <strong>Unser Standort:</strong> Yorckstraße 14, 10965<br/> Berlin, Germany
                            </a>
                        </div>
                    </div>
                </div>
                <div
                    class="social-media flex align-center sm:mt-40 sm:w-100 xs:w-100 xs:ml-auto xs:mr-auto xs:justify-center fs-22">
                    <?php
                        $social_media = get_field('social_media', 'option');
foreach ($social_media as $key => $item) {
    $classes = ($key == 0) ? 'flex align-center' : 'flex align-center ml-20';
    ?>
                    <a href="<?php echo $item['url']; ?>" class="<?php echo $classes; ?>" target="_blank"
                        aria-label="<?php echo strtolower($item['icon']); ?>">
                        <i class="icomoon icon-<?php echo strtolower($item['icon']); ?>"></i>
                    </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom flex align-center justify-between xs:wrap xs:column b-0 bt-1 py-30 xs:pb-50 bc-hash solid fs-14 xxl:fs-16">
        <?php $footer_bottom = get_field('footer_bottom', 'option'); ?>
        <?php
            $copy_right_text = $footer_bottom['copy_right_text'] ? $footer_bottom['copy_right_text'] : '2Hats Logic Solutions Private';
$terms_and_condition_title = $footer_bottom['terms_and_condition']['title'];
$terms_and_condition_link = $footer_bottom['terms_and_condition']['url'] ? $footer_bottom['terms_and_condition']['url'] : '#';
$privacy_policy_title = $footer_bottom['privacy_policy']['title'] ? $footer_bottom['privacy_policy']['title'] : 'Privacy Policy';
$privacy_policy_link = $footer_bottom['privacy_policy']['url'] ? $footer_bottom['privacy_policy']['url'] : '#';
$imprint_title = $footer_bottom['imprint']['title'];
$imprint_link = $footer_bottom['imprint']['url'];
?>
        <div class="copyright sm:order-2 xs:mt-10">&copy; <span id="year"><?php echo date('Y'); ?></span> <?php echo $copy_right_text; ?></div>
        <div class="terms sm:order-1 sm:mt-20"><?php if ($terms_and_condition_title) { ?><a href="<?php echo $terms_and_condition_link; ?>" aria-label="terms"><?php echo $terms_and_condition_title; ?></a> | <?php } ?> <a href="<?php echo $privacy_policy_link; ?>"
                aria-label="privacy"><?php echo $privacy_policy_title; ?></a>
            <?php if(!empty($imprint_title) && !empty($imprint_link)) {?> 
                | <a href="<?php echo $imprint_link; ?>"
                aria-label="imprint"><?php echo $imprint_title; ?></a>  
            <?php }?>    
        </div>
    </div>
    </div>
</footer>
<div class="overlay overlay-menu transition fixed top-0 bottom-0 left-0 right-0 z-1 md:hidden"></div>
<div class="overlay overlay-modal transition fixed top-0 bottom-0 left-0 right-0 z-12  md:hidden"></div>
<?php
$whatsapp_chat_enable = get_field('whatsapp_chat_enable', 'option');
$whatsapp_chat_phone_number = get_field('whatsapp_chat_phone_number', 'option');
if($whatsapp_chat_enable && !empty($whatsapp_chat_phone_number)){
?> 
<div class="whatsapp-widget fixed bottom-75 xl:bottom-140 right-15 z-1">
    <a href="https://wa.me/<?php echo $whatsapp_chat_phone_number;?>" target="_blank" class="block whatsapp p-13 radius-100"> <i class="icomoon icon-whatsapp fs-24 c-white block"></i> </a>
</div>
<?php } ?>
<?php
global $wp_query;
$postid = $wp_query->post->ID;
$disable_modals = get_field('disable_modals', $postid);
if (!is_singular('help-desk') && !$disable_modals) {
    get_template_part('template-parts/free-consultation');
    get_template_part('template-parts/get-a-quote');
    get_template_part('template-parts/hire-now');
    get_template_part('template-parts/contact-us-modal');
    //get_template_part('template-parts/offer-modal');
}
// if(is_singular('post')){
//     get_template_part('template-parts/newsletter-modal');
// }
?>

<?php wp_footer(); ?>
<script>
<?php 
$cf7_external_redirect_forms = get_field('cf7_external_redirect_forms', 'option');
$cf7_external_redirect_link = get_field('cf7_external_redirect_link', 'option');
// Convert PHP array to JSON for JavaScript
$js_array = json_encode($cf7_external_redirect_forms ?: ['1000', '1001']);
?>
document.addEventListener( 'wpcf7mailsent', function( event ) {
    console.log('wpcf7mailsent');
    if(!<?php echo $js_array; ?>.includes(event.detail.contactFormId)){
        return;
    }
    location = '<?php echo get_permalink($cf7_external_redirect_link); ?>';
}, false );
</script>
<script>
    var elements = document.querySelectorAll('section, header, footer, .service, .col, .content .info');
    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.intersectionRatio > 0) {
                entry.target.classList.add('animate');
            }
        });
    });
    elements.forEach(function (element) {
        observer.observe(element);
    });
</script>

<script async>
    document.addEventListener('DOMContentLoaded', function() {
        var phoneInput = document.querySelectorAll("[type=tel]");
        function require(urls, callback) {
            let loadedCount = 0;

            function loadScript(url) {
                var script = document.createElement("script");
                script.src = url;
                script.type = "text/javascript";
                script.addEventListener('load', function() {
                loadedCount++;
                if (loadedCount === urls.length) {
                    callback();
                }
                });
                document.getElementsByTagName("head")[0].appendChild(script);
            }

            urls.forEach(loadScript);
        }

        require([
        "<?php echo get_template_directory_uri(); ?>/dist/assets/js/tel-input.js?v=1.0.0"
        ], function() {
            if (phoneInput) {
                phoneInput.forEach((input) => {
                var iti = window.intlTelInput(input, {
                    utilsScript: "<?php echo get_template_directory_uri(); ?>/dist/assets/js/utils.js?v=1.0.0",
                    separateDialCode: true,
                    autoHideDialCode: false,
                    preferredCountries: ['de', 'us', 'gb', 'in'],
                    initialCountry: 'de',
                });
                });
            }
        });

        var styles = ["<?php echo get_template_directory_uri(); ?>/dist/assets/css/wp.min.css"];
        styles.forEach(url => {
            var request = new XMLHttpRequest();
            request.open("GET", url);
            request.send();
            request.onload = function() {
                var styleElement = document.createElement("style");
                styleElement.textContent = request.responseText || request.response;
                document.head.append(styleElement);
            }
        });
    });
</script>
<script>
    
</script>    
<style>
.iti__flag {
    background-image: url("<?php echo get_template_directory_uri(); ?>/dist/assets/img/flag/flags.png");
    @supports (background-image: url('<?php echo get_template_directory_uri(); ?>/dist/assets/img/flag/flags.webp')) {
        background-image: url("<?php echo get_template_directory_uri(); ?>/dist/assets/img/flag/flags.webp");
    }
}

@media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
    .iti__flag {
        background-image: url("<?php echo get_template_directory_uri(); ?>/dist/assets/img/flag/flags@2x.png");
        @supports (background-image: url('<?php echo get_template_directory_uri(); ?>/dist/assets/img/flag/flags@2x.webp')) {
            background-image: url("<?php echo get_template_directory_uri(); ?>/dist/assets/img/flag/flags@2x.webp");
        }
    }
}
</style>

</body>
</html>
