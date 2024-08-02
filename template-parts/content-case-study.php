<section class="casestudy-list overflow-hidden relative pt-100 pb-100 xs:pt-60 xs:pb-80">
    <div class="container relative z-1">
        <div class="title w-70 md:w-100">
            <?php

            $title = get_field('case_studies_page_title', 'option');
            $desc = get_field('case_studies_page_description', 'option');
            $grid_col = get_field('grid_layout', 'option');
            ?>
            <?php if ($title) { ?>
                <h1 class="h1-sml"><?php echo $title; ?></h1>
            <?php } ?>
            <?php if ($desc) { ?>
                <p><?php echo $desc; ?></p>
            <?php } ?>
        </div>
        <div class="content">
            <?php
            $args = [
                'post_type' => 'case-study',
                'post_status' => 'publish',
                'posts_per_page' => -1,
            ];
            $case_studies_query = new WP_Query($args);
            ?>
            <?php if ($case_studies_query->have_posts()) {?>
             
                <!-- Case Studies List -->
                <div class="grid <?php echo $grid_col; ?> md:grid-2 xs:grid-1 cg-40 rg-60 pt-80 md:pt-50 xs:pt-20 md:rg-40">
                    <?php while ($case_studies_query->have_posts()) {
                        $case_studies_query->the_post(); ?>
                        <div class="col card">
                            <a href="<?php the_permalink(); ?>" class="item">
                                <?php if (has_post_thumbnail()) {
                                    $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'img_548x348');
                                    $featured_image_id = get_post_thumbnail_id();
                                    $attachment = wp_get_attachment_image_src($featured_image_id, 'img_548x348');
                                    $featured_image = $attachment[0];
                                    $featured_image_width = $attachment[1];
                                    $featured_image_height = $attachment[2];
                                    $featured_image_alt = get_the_title($featured_image_id);
                                    ?>
                                    <?php
                                    $cropOptions = [
                                        '(max-width: 768px)' => [390, 248],
                                        '(min-width: 769px)' => [558, 355],
                                    ];

                                    $attributes = ['class' => 'transition', 'loading' => 'lazy'];
                                    ?>
                                    <?php echo hatslogic_get_attachment_picture($featured_image_id, $cropOptions, $attributes); ?>
                                    <?php } else {
                                        $placeholder_image_id = attachment_url_to_postid(get_site_url().'/wp-content/uploads/2024/05/no-image-casestudy-list.svg');
                                        $placeholder_image_url = get_site_url().'/wp-content/uploads/2024/05/no-image-casestudy-list.svg';
                                        ?>
                                    <img src="<?php echo $placeholder_image_url; ?>" loading="lazy" alt="<?php the_title(); ?>" width="548px" height="349px" class="transition">
                                <?php } ?>
                                <div class="info mt-30">
                                    <span class="headline c-primary uppercase font-bold mb-10 block fs-14">
                                        <?php $categories = get_the_terms(get_the_ID(), 'category');
                        if (!empty($categories) && !is_wp_error($categories)) {
                            echo esc_html($categories[0]->name);
                        }
                        ?>
                                    </span>
                                    <h3 class="h4 transition font-bold max-w-90 xs:max-w-100"><?php the_title(); ?></h3>
                                    <p class="font-light"><?php echo truncate_text(get_the_excerpt(), 130, '...'); ?></p>
                                    <a href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>"
                                        class="btn btn-secondary-outline mt-20"><?php _e('Read More', '2hatslogic'); ?></a>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <!-- End of Case Studies List -->
            <?php } else { ?>
                <p><?php _e('No case studies found.', '2hatslogic'); ?></p>
            <?php } ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </div>
    <div class="bg-shape absolute z-0 right-0 top-0 w-60 md:w-80">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/case-study-bg.jpg"
            srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/case-study-bg.jpg 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/case-study-bg2x.jpg 2x"
            class="shape w-100" loading="eager" fetchpriority="high" alt="shopware" width="100" height="100">
    </div>
</section>