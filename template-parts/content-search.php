<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 2HatsLogic
 */

?>

<div class="col card" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <a href="<?php the_permalink(); ?>" class="item">
        <?php 
        if (has_post_thumbnail()):
			
            $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'img_498x260');
        ?>
            <picture>
                <source srcset="<?php echo esc_url($featured_image); ?>" type="image/webp">
                <source srcset="<?php echo esc_url($featured_image); ?>" type="image/jpg">
                <img src="<?php echo esc_url($featured_image); ?>" loading="lazy" alt="<?php the_title_attribute(); ?>" width="498" height="260" class="transition">
            </picture>
        <?php else: ?>
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/blog-listing.svg'); ?>" loading="lazy" alt="<?php the_title_attribute(); ?>" width="498" height="260" class="transition">
        <?php endif; ?>
        <div class="info mt-15">
            <div class="w-100 flex justify-between mb-15 md:mb-10">
                <span class="c-dark-grey fs-14"><?php echo esc_html($reading_time_text); ?></span>
                <span class="c-dark-grey fs-14"><?php echo get_the_date(); ?></span>
            </div>
            <h2 class="h4 transition font-bold"><?php the_title(); ?></h2>
        </div>
    </a>
</div><!-- #post-<?php the_ID(); ?> -->
