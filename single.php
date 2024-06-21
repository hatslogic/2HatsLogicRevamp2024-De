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

            <!-- Featured Image -->
			<?php if (has_post_thumbnail()):
			$featured_image = get_the_post_thumbnail_url(get_the_ID());
			$reading_time_text = get_reading_time(get_the_ID(),get_the_content());
			$featured_image_id = get_post_thumbnail_id(get_the_ID());
			?>
			<div class="w-100">
				
				<?php $cropOptions = [
                "fallbackimage-size" => [749,379],
                'fallbackimage-class'=> 'transition'
				];?>
				<?php display_responsive_image($featured_image_id,$cropOptions) ?>
				<div class="info mt-15">
					<div class="w-100 flex justify-between mb-15 md:mb-10">
						<span class="c-dark-grey fs-14"><?php the_field('author'); ?> &period; <?php echo esc_html($reading_time_text); ?></span>
						<span class="c-dark-grey fs-14"><?php echo get_the_date(); ?></span>
					</div>
					<h1 class="h2"><?php the_title(); ?></h1>
				</div>
			</div>
			<?php endif; ?>

            <div class="content w-100 xs:mt-30 mt-60">
				<?php app_render_page_single_blog(); ?>
				<?php the_content(); ?>
			   	<?php get_template_part('template-parts/blog-faqs'); ?>
            </div>
          </div>

          <?php get_template_part('template-parts/blog-sidebar'); ?>
        </div>
      </div>
	  <div class="bg-shape absolute z-0 right-0 top-0 w-60 md:w-80">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg.jpg" srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg.jpg 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg2x.jpg 2x" class="shape w-100" alt="shopware" width="100" height="100">
        </div>
    </section>
    
	<?php get_template_part('template-parts/blockquote'); ?>
	<?php get_template_part('template-parts/relative-resources'); ?>
	<?php get_template_part('template-parts/newsletter-form'); ?>
</main>

<?php
if (get_field('show_callout')) {
    app_render_fragment('global-callout');
}
?>
<?php
get_footer();
