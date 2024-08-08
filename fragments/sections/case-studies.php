<?php extract($section); ?>

<section class="works">
    <div class="container">
        <?php if ($headline['title'] || $headline['description']) { ?>
        <div class="title">
            <?php if ($headline['sub_title']) { ?>
                <span class="headline c-primary font-bold"><?php echo $headline['sub_title']; ?></span>
            <?php } ?>
            <?php if ($headline['title']) { ?>
                <h2> <?php echo $headline['title']; ?></h2>
            <?php } ?>
            <?php if ($headline['description']) { ?>
                <p><?php echo $headline['description']; ?></p>
            <?php } ?>
        </div>
        <?php } ?>
        <?php if ($posts) { ?>
            <div class="content mt-50 xs:mt-30">
                <div
                    class="grid grid-3 xl:grid-2 xs:grid-1 gap-35 xs:gap-20 xs:flex xs:nowrap xs:scroll-x xs:-ml-20 xs:-mr-20 scroll-snap">
                    <?php
                    foreach ($posts as $post) {
                        setup_postdata($post);
                        $title = get_the_title($post->ID);
                        $url = get_the_permalink($post->ID);
                        $description = get_the_excerpt($post->ID);
                        $client_location = get_field('client_location', $post->ID);
                        $featured_image = get_the_post_thumbnail_url($post->ID, 'img_450x350');
                        $featured_image_id = get_post_thumbnail_id($post->ID);
                        $attachment = wp_get_attachment_image_src($featured_image_id, 'img_450x350');
                        $featured_image = $attachment[0];
                        $featured_image_width = $attachment[1];
                        $featured_image_height = $attachment[2];
                        $featured_image_alt = get_the_title($featured_image_id);
                        ?>
                        <div class="col card snap-center">
                            <a href="<?php echo esc_url($url); ?>" class="item">
                                <?php if ($featured_image) { ?>
                                    
                                    <?php
                                        $cropOptions = [
                                            '(max-width: 768px)' => [365, 284],
                                            '(min-width: 769px)' => [484, 376],
                                        ];
                                    $attributes = ['class' => 'transition', 'loading' => 'lazy', 'alt' => $featured_image_alt];
                                    ?>
                                    <?php echo hatslogic_get_attachment_picture($featured_image_id, $cropOptions, $attributes); ?>
                                <?php } ?>
                                <div class="info mt-20 xs:pl-20 xs:pr-20">
                                    <h3 class="h5 transition font-regular">
                                        <?php if ($title) { ?>
                                            <strong
                                                class="transition font-bold"><?php echo truncate_text($title, 60, '...'); ?></strong>
                                        <?php } ?>
                                        <?php echo ($description) ? '- '.truncate_text($description, 90) : ''; ?>
                                    </h3>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
            wp_reset_postdata(); ?>
                </div>
                <?php if ($view_all) { ?>
                    <div class="btn-group center mt-80 xs:mt-40">
                        <a href="<?php echo $view_all['url']; ?>" class="btn btn-primary"><?php echo $view_all['title']; ?></a>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</section>