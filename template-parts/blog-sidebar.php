<?php
$image = get_field('sidebar_image');
$link = get_field('sidebar_cta_link');
$sidebar_image_cta = get_field('sidebar_image_cta');
$sidebar_image_cta_modal = get_field('sidebar_image_cta_modal');
$sidebar_image_cta_link = get_field('sidebar_image_cta_link');
$enable_sidebar_form = get_field('enable_sidebar_form');
?>

<div class="w-30 md:w-100 md:mt-30 sticky top-120">
    <div class="w-100">
        <?php if (get_field('enable_toc')) { ?>
        <div class="b-0 md:b-1 solid bc-hash md:p-20">
            <div class="title">
                <h4>Table of contents</h4>
            </div>
            <?php if (have_rows('toc_block')) { ?>
            <dive class="content mt-20">
                <ul class="fs-16 pl-15">
                    <?php while (have_rows('toc_block')) {
                        the_row(); ?>
                    <li class="mb-15">
                        <a href="#head<?php echo get_row_index(); ?>" class="c-secondary hover-text-primary">
                            <?php the_sub_field('toc_content'); ?>
                        </a>
                        <?php if (get_sub_field('enable_sub_items') && have_rows('sub_items')) { ?>
                        <ul class="fs-14 pl-15 mt-10">
                            <?php while (have_rows('sub_items')) {
                                the_row(); ?>
                            <li class="mb-10">
                                <a href="#<?php the_sub_field('scroll_to'); ?>" class="c-secondary hover-text-primary">
                                    <?php the_sub_field('sub_item_content'); ?>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                        <?php } ?>
                    </li>
                    <?php } ?>
                </ul>
            </dive>
            <?php } ?>
        </div>
        <?php } ?>

        <?php if (get_field('sidebar_cta_title')) { ?>
            <?php
            if ($link) {
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <div class="content p-30 md:p-20 mt-30 b-1 solid bc-hash bg-dark-primary c-white">
                <a href="<?php echo esc_url($link_url); ?>" aria-label="<?php echo esc_html($link_title); ?>">
                    <div class="title c-white">
                        <h4><?php the_field('sidebar_cta_title'); ?></h4>
                    </div>
                    <div class="content mt-20">
                    <div class="no-decoration bc-primary flex align-center">
                        <span class="c-white mr-20"><?php echo esc_html($link_title); ?></span>
                        <i class="icomoon icon-arrow_circle_right fs-32 c-white"></i>
                    </div>
                    </div>
                </a>
            </div>
            <?php } ?>
        <?php } ?>
        
        <?php
        if ($image) { ?>
        <div class="block mt-30">
        <?php if($sidebar_image_cta == 'modal') { ?>
        <a href="javascript:void(0)" onclick="openModal('<?php echo $sidebar_image_cta_modal ?>')" aria-label="offers" >
        <?php } ?> 
        <?php if($sidebar_image_cta == 'link') { ?>
        <a href="<?php echo $sidebar_image_cta_link['url']; ?>" aria-label="offers" >
        <?php } ?> 
            <?php
            $cropOptions = [
                '(max-width: 768px)' => [280, 316],
                '(min-width: 769px)' => [315, 356],
            ];
            $attributes = ['class' => 'transition', 'loading' => 'lazy'];
            ?>
            <?php echo hatslogic_get_attachment_picture($image['ID'], $cropOptions, $attributes); ?>
        <?php if(!empty($sidebar_image_cta)) { ?>
        </a>
        <?php } ?>      
        </div>
        <?php } ?>
    </div>
</div>