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
    <div class="footer-top py-80 flex nowrap justify-between sm:wrap xs:py-60">
      <div class="col w-60 sm:w-100">
        <div class="menu flex align-start justify-between sm:wrap sm:justify-start">
          <div class="col sm:w-35 xs:w-100">
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
          <div class="col sm:w-35 xs:w-100">
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
          <div class="col sm:w-30 xs:w-100">
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
      <div class="col w-40 sm:w-100 sm:mt-40 flex justify-end">
        <div class="flex justify-between column sm:w-100 b-0 sm:bt-1 sm:pt-40 bc-hash solid xs:text-center">
          <div class="accreditation sm:w-50 xs:w-100">
            <div class="h4 font-bold">Accreditation</div>
            <div class="block sm:flex">
              <div class="flex justify-start mt-30 sm:justify-center">
                <div class="col">
                  <a href="#" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/accreditation/shopware-partner.svg" alt="shopware partner" loading="lazy"
                      width="100" height="100">
                  </a>
                </div>
                <div class="col ml-20">
                  <a href="#" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/accreditation/clutch-logo.svg" alt="shopware partner" loading="lazy"
                      width="100" height="100">
                  </a>
                </div>
                <div class="col ml-20">
                  <a href="#" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/accreditation/vue-storefront.svg" alt="shopware partner" loading="lazy"
                      width="100" height="100">
                  </a>
                </div>
              </div>
              <div class="flex justify-start mt-30 sm:justify-center sm:ml-20">
                <div class="col col-100">
                  <a href="#" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/accreditation/appfutura-badge.svg" alt="appfutura" loading="lazy" width="100"
                      height="100">
                  </a>
                </div>
              </div>
            </div>
          </div>
          <?php
          $social_media = get_field('social_media', 'option');
          if ($social_media) {
            
          }
          ?>
          <div class="social-media flex align-center ml-auto mr-0 sm:ml-auto sm:mr-auto sm:mt-40 sm:w-100 xs:w-100 xs:ml-auto xs:mr-auto xs:justify-center">
            <?php
            foreach ($social_media as $key => $item):
            $classes = ($key == 0) ? 'flex align-center' : 'flex align-center ml-20';
            ?>
              <a href="<?php echo $item['url']; ?>" class="<?php echo $classes; ?>" target="_blank" aria-label="<?php echo strtolower($item['icon']); ?>">
                <i class="icomoon icon-<?php echo strtolower($item['icon']); ?>"></i>
              </a>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
    <div
      class="footer-bottom flex align-center justify-between xs:wrap xs:column b-0 bt-1 py-30 xs:pb-50 bc-hash solid">
      <div class="copyright sm:order-2 xs:mt-10">&copy; <span id="year"></span> 2Hats Logic Solutions Private Limited
      </div>
      <div class="terms sm:order-1 sm:mt-20">
        <a href="#" aria-label="terms">Terms & Conditions</a> | <a href="#" aria-label="privacy">Privacy Policy</a>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>