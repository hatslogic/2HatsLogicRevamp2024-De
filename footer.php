<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package 2HatsLogic
 */

?>

<footer class="footer sm:mb-80 xs:mb-0">
    <div class="container">
        <div class="footer-top py-80 flex nowrap justify-between md:wrap xs:py-60">
            <div class="col w-60 md:w-100">
                <div class="menu flex align-start justify-between sm:wrap sm:justify-start">
                    <div class="col xl:w-40 xs:w-100">
                        <div class="menu-group mt-0">
                            <a href="#" class="h4 font-bold">Services</a>
                            <?php 
                            wp_nav_menu( array(
                              'menu'   => 'service-menu',
                              'theme_location' => 'service-menu',
                              'container' => false,
                              'menu_class' => 'no-bullets font-regular mt-20 sm:mt-15',
                              'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                              'walker' => new \FOOTER_Menu_Walker(),
                            ) );
                            ?>
                        </div>
                        <div class="menu-group mt-40">
                            <a href="#" class="h4 font-bold">Web and E-commerce<br /> Services</a>
                            <?php 
                            wp_nav_menu( array(
                              'menu'   => 'web-ecommerce-menu',
                              'theme_location' => 'web-ecommerce-menu',
                              'container' => false,
                              'menu_class' => 'no-bullets font-regular mt-20 sm:mt-15',
                              'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                              'walker' => new \FOOTER_Menu_Walker(),
                            ) );
                            ?>
                        </div>
                    </div>
                    <div class="col px-20 xs:pl-0 xs:pr-0 xl:w-40 xs:w-100">
                        <div class="menu-group mt-0 xs:mt-40">
                            <a href="#" class="h4 font-bold">Hire a Developer</a>
                            <?php 
                            wp_nav_menu( array(
                              'menu'   => 'hide-developer-menu',
                              'theme_location' => 'hide-developer-menu',
                              'container' => false,
                              'menu_class' => 'no-bullets font-regular mt-20 sm:mt-15',
                              'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                              'walker' => new \FOOTER_Menu_Walker(),
                            ) );
                            ?>
                        </div>
                        <div class="menu-group mt-40">
                            <a href="#" class="h4 font-bold">Company</a>
                            <?php 
                            wp_nav_menu( array(
                              'menu'   => 'company-menu',
                              'theme_location' => 'company-menu',
                              'container' => false,
                              'menu_class' => 'no-bullets font-regular mt-20 sm:mt-15',
                              'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                              'walker' => new \FOOTER_Menu_Walker(),
                            ) );
                            ?>
                        </div>
                    </div>
                    <div class="col xl:w-20 xs:w-100">
                        <div class="menu-group mt-0 xs:mt-40">
                            <a href="#" class="h4 font-bold">Quick Links</a>
                            <?php 
                            wp_nav_menu( array(
                              'menu'   => 'quick-links-menu',
                              'theme_location' => 'quick-links-menu',
                              'container' => false,
                              'menu_class' => 'no-bullets font-regular mt-20',
                              'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                              'walker' => new \FOOTER_Menu_Walker(),
                            ) );
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col w-40 md:w-100 md:mt-40 flex justify-end md:justify-start sm:justify-center">
                <div class="flex justify-between column sm:w-100 b-0 sm:bt-1 sm:pt-40 bc-hash solid xs:text-center">
                    <div class="accreditation sm:w-50 xs:w-100">
                        <div class="h4 font-bold">Accreditation</div>
                        <div class="block sm:flex sm:justify-center">
                            <?php $badges = get_field('badges', 'option'); ?>
                            <?php if($badges): ?>
                            <?php foreach($badges as $index => $badge): ?>
                            <?php if($index % 3 == 0): // Start a new row for every 3 badges ?>
                            <?php if($index > 0): // Close the previous row if it's not the first set ?>
                        </div>
                        <?php endif; ?>
                        <div
                            class="flex justify-start mt-30 sm:justify-center <?php echo $index > 0 ? 'sm:ml-20' : ''; ?>">
                            <?php endif; ?>
                            <div class="col <?php echo $index % 3 > 0 ? 'ml-20' : ''; ?>">
                                <a href="<?php echo esc_url($badge['link']); ?>" target="_blank">
                                    <img src="<?php echo esc_url($badge['badge_image']); ?>"
                                        alt="<?php echo esc_attr($badge['alt_text']); ?>" loading="lazy" width="100"
                                        height="100">
                                </a>
                            </div>
                            <?php if($index == count($badges) - 1): // Close the last row ?>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                </div>
                <div
                    class="social-media flex align-center ml-auto mr-0 sm:ml-auto sm:mr-auto sm:mt-40 sm:w-100 xs:w-100 xs:ml-auto xs:mr-auto xs:justify-center fs-22">
                    <?php
                        $social_media = get_field('social_media', 'option');
                        foreach ($social_media as $key => $item):
                        $classes = ($key == 0) ? 'flex align-center' : 'flex align-center ml-20';
                        ?>
                    <a href="<?php echo $item['url']; ?>" class="<?php echo $classes; ?>" target="_blank"
                        aria-label="<?php echo strtolower($item['icon']); ?>">
                        <i class="icomoon icon-<?php echo strtolower($item['icon']); ?>"></i>
                    </a>
                    <?php endforeach; ?>
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
        ?>
        <div class="copyright sm:order-2 xs:mt-10">&copy; <span id="year"><?=date("Y")?></span> <?= $copy_right_text ?></div>
        <div class="terms sm:order-1 sm:mt-20"><?php if($terms_and_condition_title): ?><a href="<?= $terms_and_condition_link ?>" aria-label="terms"><?= $terms_and_condition_title ?></a> | <?php endif; ?> <a href="<?= $privacy_policy_link ?>"
                aria-label="privacy"><?= $privacy_policy_title ?></a></div>
    </div>
    </div>
</footer>

<?php wp_footer(); ?>

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

</body>

</html>