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
	<section class="blog-list pt-100 xs:pt-80">
		<div class="container">
			<div class="title w-100 flex justify-between sm:wrap">
				<h1 class="h1-sml w-100 sm:mb-20">Blogs</h1>
				<div class="flex w-100 justify-end gap-20 align-end">
					<div class="form-group max-w-58 md:max-w-100">
						<!-- Updated form to use WordPress search -->
						<form role="search" method="get" id="searchform" class="searchform"
							action="<?php echo home_url('/'); ?>">
							<input type="search" name="s" id="s" class="form-control lined" aria-label="Search"
								placeholder="Search Blog here">
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="container flex gap-40 md:gap-10 align-start md:wrap">
		<div class="w-70 md:w-100 md:w-100 mt-60 sm:mt-40 xs:mt-30">
			<!-- Featured Image -->
			<?php if (has_post_thumbnail()):
				$featured_image = get_the_post_thumbnail_url(get_the_ID(), 'img_749x379');
				$reading_time_text = get_reading_time(get_the_content());
				?>
				<div class="w-100">
					<picture>
						<source srcset="<?php echo esc_url($featured_image); ?>" type="image/webp">
						<source srcset="<?php echo esc_url($featured_image); ?>" type="image/jpg">
						<img src="<?php echo esc_url($featured_image); ?>" loading="lazy" alt="<?php the_title_attribute()?>" width="749px" height="379px"
							class="transition">
					</picture>
					<div class="info mt-15">
						<div class="w-100 flex justify-between mb-15 md:mb-10">
							<span class="c-dark-grey fs-14"><?php the_field('author'); ?> &bull; <?php echo esc_html($reading_time_text); ?></span>
							<span class="c-dark-grey fs-14"><?php echo get_the_date(); ?></span>
						</div>
						<h2><?php the_title(); ?></h2>
					</div>
				</div>
			<?php endif; ?>

			<!-- Content -->
			<div class="content w-100 xs:mt-30 mt-60">
			   <?php app_render_page_single_blog(); ?>
			   <?php get_template_part('template-parts/faqs'); ?>
		    </div>
		</div>
		<?php get_template_part('template-parts/blog-sidebar'); ?>
</main>
<?php
if (get_field('show_callout')) {
    app_render_fragment('global-callout');
}
?>
<?php
get_footer();
