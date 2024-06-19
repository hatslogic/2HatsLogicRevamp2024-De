<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 2HatsLogic
 */


 $reading_time_text = get_reading_time(get_the_content());
?>

<div class="col card" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <a href="<?php the_permalink(); ?>" class="item">
        <div class="info mt-15">
            <div class="w-100 flex justify-between mb-15 md:mb-10">
                <span class="c-dark-grey fs-14"><?php echo esc_html($reading_time_text); ?></span>
                <span class="c-dark-grey fs-14"><?php echo get_the_date(); ?></span>
            </div>
            <h2 class="h4 transition font-bold"><?php the_title(); ?></h2>
            
            <?php if(has_excerpt()) :?>
                <p><?php the_excerpt() ?></p>
            <?php else: ?>
                <p><?php short_content(150);?> </p>
            <?php endif; ?>
        </div>
    </a>
</div><!-- #post-<?php the_ID(); ?> -->