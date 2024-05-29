<?php extract($section); ?>

<?php if ($posts): ?>
    <section class="journal pt-100 pb-100 xs:pt-80 xs:pb-80">
        <div class="container">
            <?php if ($headline['title']): ?>
                <div class="title"> <span class="headline c-primary font-bold"><?php echo $headline['sub_title']; ?></span>

                    <h2><?php echo $headline['title']; ?></h2>

                </div>
            <?php endif; ?>
            <div class="content mt-50 xs:mt-30">
                <div
                    class="grid grid-4 xl:grid-3 md:grid-2 xs:grid-1 gap-15 xs:flex xs:nowrap xs:scroll-x xs:-ml-20 xs:-mr-20 scroll-snap">

                    <?php
                    foreach ($posts as $key => $post):
                        setup_postdata($post);
                        $title = get_the_title($post->ID);
                        $description = get_the_excerpt($post->ID);
                        $url = get_the_permalink($post->ID);
                        $client_location = get_field('client_location', $post->ID);
                        $featured_image = get_the_post_thumbnail_url($post->ID, 'img_450x235');
                        $featured_image_id = get_post_thumbnail_id($post->ID);
                        $attachment = wp_get_attachment_image_src($featured_image_id, 'img_450x235');
                        $featured_image = $attachment[0];
                        $featured_image_alt = get_the_title($featured_image_id);
                        $classes = ($key == count($posts) - 1) ? 'col card snap-center xl:hidden lg:visible' : 'col card snap-center';
                        ?>
                        <div class="<?php echo $classes; ?>">
                            <a href="<?php echo $url; ?>" class="item">
                                <picture>
                                    <source srcset="<?php echo webp($featured_image); ?>" type="image/webp">
                                    <source srcset="<?php echo $featured_image; ?>" type="image/jpg">
                                    <img src="<?php echo $featured_image; ?>" loading="lazy" alt="<?php echo $title; ?>"
                                        width="304px" height="208px" class="transition">
                                </picture>
                                <div class="info mt-30 xs:pl-20 xs:pr-20">
                                    <?php if ($title): ?>
                                        <h3 class="h4 transition font-bold"><?php echo truncate_text($title, 60, '...'); ?></h3>
                                    <?php endif; ?>
                                    <?php if ($description): ?>
                                        <p class="font-light"><?php echo truncate_text($description, 90, '...'); ?></p>
                                    <?php endif; ?>

                                </div>
                            </a>

                        </div>
                    <?php endforeach;
                    wp_reset_postdata(); ?>

                </div>
                <?php if ($cta): ?>
                    <div class="btn-group center mt-80 xs:mt-40"> <a href="<?php echo $cta['url'] ?>"
                            class="btn btn-primary"><?php echo $cta['title']; ?></a>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>