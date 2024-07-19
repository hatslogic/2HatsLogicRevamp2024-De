<?php $related_posts = get_related_case_studies(get_the_ID()); ?>

<!-- Related Case Studies Section -->
<?php if (!empty($related_posts)) { ?>
    <section class="works pb-100 xs:pb-80">
        <div class="container">
            <div class="title">
                <h2>Other Case Studies</h2>

            </div>
            <div class="content mt-50 xs:mt-30">
                <div
                    class="grid grid-3 xl:grid-2 xs:grid-1 gap-35 xs:gap-20 xs:flex xs:nowrap xs:scroll-x xs:-ml-20 xs:-mr-20 scroll-snap">
                    <?php foreach ($related_posts as $post) {
                        setup_postdata($post); ?>
                        <div class="col card snap-center"> 
                            <a href="<?php the_permalink(); ?>" class="item">

                                <?php if (has_post_thumbnail()) {
                                    $featured_image = get_the_post_thumbnail_url($post->ID, 'img_450x350');
                                    $placeholder_image_url = get_site_url().'/wp-content/uploads/2024/05/no-image-casestudy-list.svg';
                                    $featured_image_id = get_post_thumbnail_id($post->ID);
                                    $featured_image_alt = get_the_title($featured_image_id);
                                    ?>
                                    
                                <?php
                                        $cropOptions = [
                                            '(max-width: 768px)' => [365, 284],
                                            '(min-width: 769px)' => [484, 376],
                                        ];
                                    $attributes = ['class' => 'transition', 'loading' => 'lazy', 'alt' => $featured_image_alt];
                                    ?>
                                    <?php echo hatslogic_get_attachment_picture($featured_image_id, $cropOptions, $attributes); ?>
                                <?php } else { ?>
                                    <img src="<?php echo esc_url($placeholder_image); ?>" loading="lazy" alt="Blog" width="498"
                                        height="260" class="transition">
                                <?php } ?>
                                <div class="info mt-20 xs:pl-20 xs:pr-20">
                                    <h3 class="h5 transition font-regular"><strong
                                            class="transition font-bold"><?php the_title(); ?>&colon;</strong>
                                        <?php echo truncate_text(get_the_excerpt(), 90, '...'); ?></h3>
                                </div>
                            </a>

                        </div>


                    <?php } ?>
                    <?php wp_reset_postdata(); ?>
                </div>
                <div class="btn-group center mt-80 xs:mt-40"> <a
                        href="<?php echo get_post_type_archive_link('case-study'); ?>" class="btn btn-primary">view all</a>

                </div>
            </div>
        </div>
    </section>
<?php } ?>