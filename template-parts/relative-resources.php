<?php $related_posts = get_related_resources(get_the_ID()); ?>

<!-- Related Resources Section -->
<?php if (!empty($related_posts)): ?>
    <section class="journal pb-100 xs:pb-80">
        <div class="container">
            <div class="title">
                <h2>Relative Resources</h2>
            </div>
            <div class="content mt-50 xs:mt-30">
                <div class="grid grid-4 xl:grid-3 md:grid-2 xs:grid-1 gap-15 xs:flex xs:nowrap xs:scroll-x xs:-ml-30 xs:-mr-30 scroll-snap">
                    <?php foreach ($related_posts as $post): setup_postdata($post); ?>
                        <div class="col card snap-center">
                            <a href="<?php the_permalink(); ?>" class="item">
                                <?php if (has_post_thumbnail()): 
                                    $featured_image = get_the_post_thumbnail_url($post->ID, 'img_450x235');
                                    $placeholder_image = get_site_url() . '/wp-content/uploads/2024/05/blog-listing.svg';
                                ?>
                                    <picture>
                                        <source srcset="<?php echo webp(esc_url($featured_image)); ?>" type="image/webp">
                                        <source srcset="<?php echo esc_url($featured_image); ?>" type="image/jpg">
                                        <img src="<?php echo esc_url($featured_image); ?>" loading="lazy" alt="<?php the_title_attribute(); ?>" width="304" height="208" class="transition">
                                    </picture>
                                <?php else: ?>
                                    <img src="<?php echo esc_url($placeholder_image); ?>" loading="lazy" alt="Blog" width="304" height="208" class="transition">
                                <?php endif; ?>
                                <div class="info mt-30 xs:pl-20 xs:pr-20">
                                    <h3 class="h4 transition font-bold"><?php echo truncate_text(get_the_title(), 60, '...'); ?></h3>
                                    <p class="font-light"><?php echo truncate_text(get_the_excerpt(), 90, '...'); ?></p>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
                <div class="btn-group center mt-80 xs:mt-40">
                    <a href="<?php echo get_permalink(get_page_by_path('blogs')); ?>" class="btn btn-primary">view all</a>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
