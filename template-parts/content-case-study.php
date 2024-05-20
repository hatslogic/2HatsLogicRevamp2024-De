
<section class="casestudy-list pt-100 pb-100 xs:pt-80 xs:pb-80">
        <div class="container">
            <div class="title w-70 md:w-100">
                <?php if ($title): ?>
                    <h1 class="h1-sml"><?php echo $title; ?></h1>
                <?php endif; ?>
                <?php if ($desc): ?>
                    <p><?php echo $desc ?></p>
                <?php endif; ?>
            </div>
            <div class="content mt-100 sm:mt-80 xs:mt-60">
                <?php
                $args = array(
                    'post_type' => 'case-study',
                    'posts_per_page' => -1, 
                );
                $case_studies_query = new WP_Query($args);
                ?>
                <?php if ($case_studies_query->have_posts()):
                    $case_studies_query->the_post(); ?>
                    <!-- Featured Post -->
                    <div class="casestudy-list-featured flex sm:wrap align-start md:mb-20">
                        <div class="col w-60 md:w-100">
                            <?php if (has_post_thumbnail()):
                                $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'img_730x466');
                                $featured_image_id = get_post_thumbnail_id();
                                $attachment = wp_get_attachment_image_src($featured_image_id, 'img_730x466');
                                $featured_image = $attachment[0];
                                
                                ?>
                                <picture>
                                    <source srcset="<?php echo webp(esc_url($featured_image)); ?>" type="image/webp">
                                    <source srcset="<?php echo esc_url($featured_image); ?>" type="image/jpg">
                                    <img src="<?php echo esc_url($featured_image); ?>" alt="<?php the_title_attribute(); ?>" width="731px" height="466px" class="h-auto w-100">
                                </picture>
                            <?php
                            else: 
                                $placeholder_image_id = attachment_url_to_postid(get_site_url() . '/wp-content/uploads/2024/05/no-image-casestudy-list.svg');
                                $placeholder_image_url = wp_get_attachment_image_src($placeholder_image_id, 'img_730x466')[0];
                         
                            ?>
                                <picture>
                                    <source srcset="<?php echo $placeholder_image_url?>"
                                        type="image/webp">
                                    <source srcset="<?php echo $placeholder_image_url?>"
                                        type="image/jpeg">
                                    <img src="<?php echo $placeholder_image_url?>" loading="lazy"
                                        alt="Placeholder" width="731px" height="466px" class="transition">
                                </picture>
                            <?php endif; ?>
                        </div>
                        <div class="col w-40 ml-50 sm:ml-0 sm:mt-40 md:w-100">
                            <div class="title">
                                <span class="c-primary font-bold mb-6 block fs-14">
                                    <?php $categories = get_the_terms(get_the_ID(), 'category');
                                    if (!empty($categories) && !is_wp_error($categories)) :
                                        echo esc_html($categories[0]->name);
                                    endif;
                                    ?>
                                </span>
                                <h2 class="h3"><?php the_title(); ?></h2>
                            </div>
                            <div class="content">
                                <p class="mb-0"><?php the_excerpt(); ?></p>
                                <a href="<?php the_permalink(); ?>" aria-label="read more" class="btn btn-secondary">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- End of Featured Post -->

                    <!-- Case Studies List -->
                    <div class="grid grid-2 md:grid-2 xs:grid-1 cg-40 rg-60 pt-80 md:pt-50 xs:pt-20 md:rg-40">
                        <?php while ($case_studies_query->have_posts()):
                            $case_studies_query->the_post(); ?>
                            <div class="col card">
                                <a href="<?php the_permalink(); ?>" class="item">
                                    <?php if (has_post_thumbnail()):
                                        $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'img_548x348');
                                        $featured_image_id = get_post_thumbnail_id();
                                        $attachment = wp_get_attachment_image_src($featured_image_id, 'img_548x348');
                                        $featured_image = $attachment[0];
                                        $featured_image_width = $attachment[1];
                                        $featured_image_height = $attachment[2];
                                        $featured_image_alt = get_the_title($featured_image_id);
                                        ?>
                                        <picture>
                                            <source srcset="<?php echo esc_url($featured_image); ?>" type="image/webp">
                                            <source srcset="<?php echo esc_url($featured_image); ?>" type="image/jpg">
                                            <img src="<?php echo esc_url($featured_image); ?>" loading="lazy"
                                                alt="<?php the_title_attribute(); ?>"
                                                width="<?php echo esc_attr($featured_image_width); ?>"
                                                height="<?php echo esc_attr($featured_image_height); ?>" class="transition">
                                       
                                    <?php else:
                                      $placeholder_image_url = get_site_url() . '/wp-content/uploads/2024/05/no-image-casestudy-list.svg';

                                      ?>
                                            <img src="<?php echo esc_url($placeholder_image_url); ?>" loading="lazy" alt="Placeholder" width="548px" height="349px" class="transition">
                                        </picture>
                                    <?php endif; ?>
                                    <div class="info mt-30">
                                        <span class="headline c-primary font-bold mb-6 block xs:fs-14">
                                            <?php $categories = get_the_terms(get_the_ID(), 'category');
                                            if (!empty($categories) && !is_wp_error($categories)) {
                                                echo esc_html($categories[0]->name);
                                            }
                                            ?>
                                        </span>
                                        <h3 class="h4 transition font-bold"><?php the_title(); ?></h3>
                                        <p class="font-light"><?php echo truncate_text(get_the_excerpt(), 130, '...'); ?></p>
                                        <a href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>"
                                            class="btn btn-secondary-outline mt-20"><?php _e('Read More', '2hatslogic'); ?></a>
                                    </div>
                                </a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <!-- End of Case Studies List -->
                <?php else: ?>
                    <p><?php _e('No case studies found.', '2hatslogic'); ?></p>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </section>