<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package 2HatsLogic
 */

get_header();
?>

<main class="page-wrap py-5">
    <section class="error-404 overflow-hidden b-0 bb-1 solid bc-hash not-found relative pt-100 xs:pt-60 pb-100 md:pb-60">
        <div class="container relative z-1">
            <div class="row">
                <div class="content-404 p-20 text-center w-100">
                    <div class="title">
                        <h1 class="mb-40 mx-auto fs-100 c-primary">4<span class="c-primary-hover">0</span>4</h1>
                    </div>
                    <div class="content">
                        <h4 class="mb-0 uppercase"><?php _e('Page not found', 'sage'); ?></h4>
                        <p class="mt-10"><?php _e('Sorry, but the page you were trying to view does not exist.', 'sage'); ?></p>
                    </div>
                    <div class="btn-group mt-60">
                        <a class="btn btn-primary" href="<?php echo esc_url(home_url()); ?>">
                        <?php _e('Back to home', 'sage'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-shape absolute z-0 right-0 top-0 w-60 md:w-80">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg.jpg" srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg.jpg 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg2x.jpg 2x" class="shape w-100" alt="shopware" width="100" height="100">
        </div>
    </section>
    <!-- .error-404 -->

</main>
<!-- #main -->

<?php
get_footer();