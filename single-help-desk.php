<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package 2HatsLogic
 */

get_header();
?>

<main class="page-wrap inline-block w-100">
    <section class="blog-detail pt-100 xs:pt-60 pb-100 md:pb-60">
      <div class="container relative z-1">
        
        <div class="content align-start md:wrap flex gap-60 md:gap-40">
          
          <div class="w-70 md:w-100 md:w-100">
            <div class="w-100">    
                <?php $reading_time_text = get_reading_time(get_the_ID(),get_the_content()); ?>
                <div class="info mt-15">
                    <div class="w-100 flex justify-between mb-15 md:mb-10">
                      <span class="c-dark-grey fs-14"><?php echo esc_html($reading_time_text); ?></span>
                      <span class="c-dark-grey fs-14"><?php echo get_the_date(); ?></span>
                    </div>
                  <h1 class="h2"><?php the_title(); ?></h1>
                </div>
            </div>

            <div class="content w-100 xs:mt-30 mt-60">
              <?php app_render_page_single_help_desk(); ?>
              <?php the_content(); ?>
            </div>
          </div>

          <div class="w-30 md:w-100 pl-30 b-0 bl-1 solid bc-hash md:pl-20 md:b-1 solid bc-hash md:p-30 sticky top-120 md:mt-30">              
            <div class="flex w-100 justify-end gap-20 align-end">
                <div class="form-group w-100 mb-60 md:mb-30">
                    <form role="search" method="get" id="searchform" class="searchform"
                        action="<?php echo home_url('/'); ?>">
                        <input type="search" class="form-control lined" placeholder="Search here"
                            value="<?php echo get_search_query(); ?>" name="s" id="s" aria-label="Search">
                        <input type="hidden" name="post_type" value="help-desk">
                    </form>
                </div>
            </div>

            <div class="w-100 mb-60 md:mb-30">
                <div class="title mb-20">
                    <h2 class="h4">Recent help desk articles</h2>
                </div>
                <div class="content">
                    <ul class="fs-16 no-bullets">
                        <?php
                        $args = array(
                            'post_type' => 'help-desk',
                            'posts_per_page' => 4,
                            'orderby' => 'post_date',
                            'order' => 'DESC',
                        );
                        $popular_posts = new WP_Query($args);
                        if ($popular_posts->have_posts()):
                            while ($popular_posts->have_posts()):
                                $popular_posts->the_post();
                                ?>
                        <li class="b-0 bb-1 solid bc-hash mb-20 pb-10">
                            <a href="<?php the_permalink(); ?>" class="no-decoration"><?php the_title(); ?></a>
                        </li>
                        <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>
                    </ul>
                </div>
            </div>       
          </div>
        </div>
      </div>
	    <div class="bg-shape absolute z-0 right-0 top-0 w-60 md:w-80">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg.jpg" srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg.jpg 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg2x.jpg 2x" class="shape w-100" alt="shopware" width="100" height="100">
        </div>
    </section>
    
	<?php get_template_part('template-parts/blockquote'); ?>
	<?php get_template_part('template-parts/get-started'); ?>
</main>

<?php
if (get_field('show_callout')) {
    app_render_fragment('global-callout');
}
?>
<?php
get_footer();
