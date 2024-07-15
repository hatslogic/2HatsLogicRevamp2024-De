<?php extract($section); ?>

<section class="journal">
    <div class="container">
        <?php if ($headline['title']) { ?>
        <div class="title">
            <?php if ($headline['sub_title']) { ?>
                <span class="headline c-primary font-bold"><?php echo $headline['sub_title']; ?></span>
            <?php } ?>
            <?php if ($headline['title']) { ?>
                <h2><?php echo $headline['title']; ?></h2>
            <?php } ?>
        </div>
        <?php } ?>
        <div class="content mt-50 xs:mt-30">
            <?php if ($posts) { ?>
                <div
                    class="grid grid-4 xl:grid-3 md:grid-2 xs:grid-1 gap-15 xs:flex xs:nowrap xs:scroll-x xs:-ml-20 xs:-mr-20 scroll-snap">
                    <?php
                    foreach ($posts as $key => $post) {
                        setup_postdata($post);
                        $title = get_the_title($post->ID);
                        $description = get_the_excerpt($post->ID);
                        $url = get_the_permalink($post->ID);
                        $client_location = get_field('client_location', $post->ID);
                        $featured_image = get_the_post_thumbnail_url($post->ID, 'img_450x235');
                        $featured_image_id = get_post_thumbnail_id($post->ID);
                        $attachment = wp_get_attachment_image_src($featured_image_id, 'img_450x235');
                        $featured_image = $attachment[0];
                        $featured_image_width = $attachment[1];
                        $featured_image_height = $attachment[2];
                        $featured_image_alt = get_the_title($featured_image_id);
                        $classes = ($key == count($posts) - 1) ? 'col card snap-center xl:hidden lg:visible' : 'col card snap-center';
                        ?>
                        <div class="<?php echo $classes; ?>">
                            <a href="<?php echo $url; ?>" class="item">
                                <?php
                                        $cropOptions = [
                                            '(max-width: 768px)' => [365, 262],
                                            '(min-width: 769px)' => [370, 265],
                                        ];
                        $attributes = ['class' => 'transition', 'loading' => 'lazy', 'alt' => $featured_image_alt];
                        ?>
                                <?php echo hatslogic_get_attachment_picture($featured_image_id, $cropOptions, $attributes); ?>
                                <div class="info mt-30 xs:pl-20 xs:pr-20">
                                    <?php if ($title) { ?>
                                        <h3 class="h4 transition font-bold"><?php echo truncate_text($title, 60, '...'); ?></h3>
                                    <?php } ?>
                                    <?php if ($description) { ?>
                                        <p class="font-light"><?php echo truncate_text($description, 90, '...'); ?></p>
                                    <?php } ?>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                wp_reset_postdata();
                ?>
                </div>
            <?php } ?>
            <?php if ($view_blogs) { ?>
                <div class="btn-group center mt-80 xs:mt-40">
                    <a href="<?php echo $view_blogs['url']; ?>"
                        class="btn btn-primary"><?php echo $view_blogs['title']; ?></a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>