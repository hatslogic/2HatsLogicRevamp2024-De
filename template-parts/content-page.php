<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 2HatsLogic
 */

?>

<section class="py-100 xs:py-80" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="title">
		<?php the_title( '<h1 class="h1-sml">', '</h1>' ); ?>
	</div>
	<div class="content mt-30">
		<?php hatslogic_post_thumbnail(); ?>

		<div class="entry-content">
			<?php
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hatslogic' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->

	</div>
</section><!-- #post-<?php the_ID(); ?> -->
