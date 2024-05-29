<?php extract($section); ?>


<section class="works pt-100 pb-100 xs:pt-80 xs:pb-80">
    <div class="container">
        <div class="title"> <span class="headline c-primary font-bold"><?php echo $headline['sub_title']; ?></span>

            <h2><?php echo $headline['title']; ?></h2>

            <p><?php echo $description; ?></p>
        </div>
        <div class="content mt-50 xs:mt-30">
            <div
                class="grid grid-3 xl:grid-2 xs:grid-1 gap-35 xs:gap-20 xs:flex xs:nowrap xs:scroll-x xs:-ml-20 xs:-mr-20 scroll-snap">

                <?php foreach ($case_study_posts as $post):
                    setup_postdata($post);
                    $title = get_the_title($post->ID);
                    $url = get_the_permalink($post->ID);
                    $description = get_the_excerpt($post->ID);
                    $featured_image = get_the_post_thumbnail_url($post->ID, 'img_360x280');
                    $featured_image_id = get_post_thumbnail_id($post->ID);
                    $attachment = wp_get_attachment_image_src($featured_image_id, 'img_360x280');
                    $featured_image = $attachment[0]; ?>

                    <div class="col card snap-center"> 
                        <a href="<?php echo esc_url($url); ?>" class="item">
                            <picture>
                                <source srcset="<?php echo webp($featured_image); ?>" type="image/webp">
                                <source srcset="<?php echo $featured_image; ?>" type="image/jpg">
                                <img src="<?php echo $featured_image; ?>" loading="lazy" alt="about" width="360px"
                                    height="280px" class="transition">
                            </picture>
                            <div class="info mt-20 xs:pl-20 xs:pr-20">
                                <h3 class="h5 transition font-regular"><strong
                                        class="transition font-bold"><?php echo truncate_text($title, 60, '...'); ?>&colon;</strong>
                                    <?php echo ($description) ? '- ' . truncate_text($description, 90) : ''; ?></h3>
                            </div>
                        </a>

                    </div>
                <?php endforeach; ?>

            </div>
            <?php if ($view_all): ?>
                <div class="btn-group center mt-80 xs:mt-40">
                    <a href="<?php echo $view_all['url']; ?>" class="btn btn-primary"><?php echo $view_all['title']; ?></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>