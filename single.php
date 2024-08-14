<?php
/**
 * The template for displaying all single posts.
 *
 * @see https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */
get_header();
?>

<main class="page-wrap inline-block w-100 relative z-0">
	<section class="blog-detail pt-100 xs:pt-60 pb-100 md:pb-60">
		<div class="container relative z-1">

			<div class="content align-start md:wrap flex gap-60 md:gap-40">
				<div class="w-70 md:w-100 md:w-100">

					<div class="w-100">
						<!-- Featured Image -->
						<?php
						$reading_time_text = get_reading_time(get_the_ID(), get_the_content());
						if (has_post_thumbnail()) {
							$featured_image = get_the_post_thumbnail_url(get_the_ID());
							$featured_image_id = get_post_thumbnail_id(get_the_ID());

							$cropOptions = [
								'(max-width: 768px)' => [390, 200],
								'(min-width: 769px)' => [1025, 519],
							];
							$attributes = ['class' => 'transition', 'loading' => 'eager', 'fetchPriority' => 'high'];
							?>
							<?php echo hatslogic_get_attachment_picture($featured_image_id, $cropOptions, $attributes); ?>
						<?php } ?>

							<div class="info mt-20"> <div class="w-100 flex justify-between mb-15 md:mb-10">
								<?php
								$author_id = get_the_author_meta('ID');
								$author_url = get_author_posts_url($author_id);
								$author_name = get_the_author_meta('user_firstname');
								?>
								<div class="c-dark-grey">
									<a href="<?php echo $author_url; ?>"><?php echo $author_name; ?></a>
									&period;
									<?php echo esc_html($reading_time_text); ?>
								</div>
								<div class="c-dark-grey flex">
									<div class="date"><?php echo get_the_date(); ?></div>
									<div class="actions flex gap-15 ml-20">
										<div class="action-btn btn-share">
											<div class="dropdown relative">
												<a href="#" class="share bg-transparent b-0 p-0 fs-18 c-secondary hover:c-primary">
													<i class="icon icon-share"></i>
												</a>
												<div class="dropdown-content fs-14 bg-white transition b-1 solid bc-hash absolute -right-32 top-30 z-1 min-w-px-120">
													<a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="flex align-center p-10 hover:bg-primary hover:c-white">
														<i class="icomoon icon-facebook"></i>
														<span class="ml-10">Facebook</span>
													</a>
													<a href="https://www.linkedin.com/cws/share?url=<?php echo get_permalink(); ?>" target="_blank" class="flex align-center p-10 hover:bg-primary hover:c-white b-0 bt-1 bc-hash solid">
														<i class="icomoon icon-linkedin"></i>
														<span class="ml-10">LinkedIn</span>
													</a>
												</div>
											</div>
										</div>
										<!-- <div class="action-btn btn-bookmark">
																		<a href="#" class="bookmark bg-transparent b-0 p-0 fs-18 c-secondary hover:c-primary"><i class="icon icon-bookmark"></i></a>
																		</div> -->
									</div>
								</div>
							</div>
							<div class="title mt-40">
								<h1 class="h1-sml"><?php the_title(); ?></h1>
							</div>
						</div>
					</div>

					<div class="content w-100 xs:mt-30 mt-60">
						<?php app_render_page_single_blog(); ?>
						<div class="editor-content">
							<?php the_content(); ?>
							<script>
								const editorTable = document.querySelectorAll('.editor-content table');
								editorTable.forEach(table => {
									table.outerHTML = `<div class="table-wrap max-w-100 scroll-x">${table.outerHTML}</div>`;
								});
							</script>
						</div>
						<?php get_template_part('template-parts/blog-faqs'); ?>
					<div class="title mt-40">
						<h1 class="h1-sml"><?php the_title(); ?></h1>
					</div>
				</div>

				<?php get_template_part('template-parts/blog-sidebar'); ?>
			</div>
		</div>
		<div class="bg-shape absolute z-0 right-0 top-0 w-60  h-px-500 md:w-80">
			<picture class="shape w-100 absolute -top-10">
				<source srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg.webp 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg2x.webp 2x" media="(min-width: 768px)" type="image/webp">
				<source srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg-mobile.webp 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg-mobile.webp 2x" media="(max-width: 767px)" type="image/webp">
				<source srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg.jpg 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg2x.jpg 2x" media="(min-width: 768px)" type="image/jpg">
				<source srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg-mobile.jpg 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg-mobile.jpg 2x" media="(max-width: 767px)" type="image/jpg">
				<img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg.jpg" alt="blog" width="100" height="100">
			</picture>
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
