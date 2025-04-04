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
        <?php $terms = get_terms(array(
                'taxonomy'   => 'category',
                'hide_empty' => true,
                'object_ids' => get_posts(array(
                    'post_type'      => 'case-study',
                    'posts_per_page' => -1,
                    'fields'         => 'ids'
                )),
            )); ?>

            <div class="case-study-filter mt-60">
                <div class="case-study-buttons md:flex md:flex-wrap sm:overflow-auto relative scroll-snap">
                    <button class="btn btn-secondary-outline min-w-auto mr-17 mb-20 white-space-nowrap case-study-btn active" data-category="alles">Alles</button>
                    <?php 
                    if (!empty($terms) && !is_wp_error($terms)) :
                        foreach ($terms as $term) : ?>
                            <button class="btn btn-secondary-outline min-w-auto mr-17 mb-20 white-space-nowrap case-study-btn" data-category="<?php echo $term->slug ?>"><?php echo $term->name ?></button>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

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
                <div class="grid <?php echo $grid_col; ?> md:grid-2 xs:grid-1 cg-60 rg-60 pt-80 md:pt-50 xs:pt-20 md:rg-60">
                  
                              <?php while ($case_studies_query->have_posts()) {
                                $case_studies_query->the_post(); 
                                $category_slug = '';
                                $categories = get_the_terms(get_the_ID(), 'category'); 
                                $category_slug = (!empty($categories) && !is_wp_error($categories))
                                ? implode(', ', array_map(function($cat) { return $cat->slug; }, $categories))
                                : '';
                                ?>
                                <div class="col card case-study-card" data-category="<?php echo $category_slug; ?>">
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

                                    $attributes = ['class' => 'transition', 'loading' => 'lazy', 'picturetag_class' => 'loader'];
                                    ?>
                                    <?php echo hatslogic_get_attachment_picture($featured_image_id, $cropOptions, $attributes); ?>
                                    <?php } else {
                                        $placeholder_image_id = attachment_url_to_postid(get_site_url().'/wp-content/uploads/2024/05/no-image-casestudy-list.svg');
                                        $placeholder_image_url = get_site_url().'/wp-content/uploads/2024/05/no-image-casestudy-list.svg';
                                        ?>
                                    <img src="<?php echo $placeholder_image_url; ?>" loading="lazy" alt="<?php the_title(); ?>" width="548px" height="350px" class="transition">
                                <?php } ?>
                                <div class="info mt-30">
                                    <span class="headline c-primary uppercase font-bold mb-10 block fs-14">
                                    <?php
                                       if (function_exists('yoast_get_primary_term')) {
                                        $primary_category = yoast_get_primary_term('category', get_the_ID());
                                        if ($primary_category) {
                                        echo $primary_category;
                                        }else {
                                        if (!empty($categories) && !is_wp_error($categories)) {
                                        echo esc_html($categories[0]->name);
                                        }
                                        }
                                        }else{
                                        if (!empty($categories) && !is_wp_error($categories)) {
                                        echo esc_html($categories[0]->name);
                                        }
                                        }
                                        ?>
                                    </span>
                                    <h3 class="h4 transition font-bold max-w-90 xs:max-w-100"><?php the_title(); ?></h3>
                                    <p class="font-light"><?php echo truncate_text(get_the_excerpt(), 130, '...'); ?></p>
                                    <a href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>"
                                        class="btn btn-secondary-outline mt-20"><?php _e('Mehr lesen', '2hatslogic'); ?></a>
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
    <div class="bg-shape absolute z-0 right-0 top-0 w-60  h-px-500 md:w-80">
        <picture class="shape w-100 absolute -top-10">
            <source srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/case-study-bg.webp 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/case-study-bg2x.webp 2x" media="(min-width: 768px)" type="image/webp">
            <source srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/case-study-bg-mobile.webp 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/case-study-bg-mobile.webp 2x" media="(max-width: 767px)" type="image/webp">
            <source srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/case-study-bg.jpg 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/case-study-bg2x.jpg 2x" media="(min-width: 768px)" type="image/jpg">
            <source srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/case-study-bg-mobile.jpg 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/case-study-bg-mobile.jpg 2x" media="(max-width: 767px)" type="image/jpg">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/case-study-bg.jpg" alt="case-study" width="100" height="100">
        </picture>
    </div>
</section>
