<?php
$image = get_field('sidebar_image');
$link = get_field('sidebar_cta_link');
?>

<div class="w-30 md:w-100 md:mt-30 sticky top-120">
    <div class="w-100">
        <?php if (get_field('enable_toc')): ?>
            <div class="b-0 md:b-1 solid bc-hash md:p-20">
                <div class="title">
                    <h4>Table of contents</h4>
                </div>
                <?php if (have_rows('toc_block')): ?>
                    <dive class="content mt-20">
                        <ul class="fs-16 pl-15">
                            <?php while (have_rows('toc_block')):
                                the_row(); ?>
                                <li class="mb-15">
                                    <a href="#section-<?php echo get_row_index(); ?>" class="c-secondary hover-text-primary">
                                        <?php the_sub_field('toc_content') ?>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </dive>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if (get_field('sidebar_cta_title')): ?>
            <div class="content p-30 md:p-20 mt-30 b-1 solid bc-hash">
                <div class="title">
                    <h4><?php the_field('sidebar_cta_title'); ?></h4>
                </div>
                <div class="content mt-40">
                    <?php
                    if ($link):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a href="<?php echo esc_url($link_url); ?>"
                            class="no-decoration bc-primary w-100 flex align-center justify-between"
                            aria-label="Click here to book a free 30 min call">
                            <span class="c-primary w-80"><?php echo esc_html($link_title); ?></span>
                            <i class="icomoon icon-arrow_circle_right fs-32 c-primary"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php
        if ($image): ?>
            <div class="content">
                <div class="w-100 py-30 md:pb-0">
                    <picture>
                        <source srcset="<?php echo $image['url'] ?>" type="image/webp">
                        <source srcset="<?php echo $image['url'] ?>" type="image/jpg">
                        <img src="<?php echo $image['url'] ?>" loading="lazy" alt="Sidebar image" width="347px"
                            height="335px" class="transition" />
                    </picture>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>