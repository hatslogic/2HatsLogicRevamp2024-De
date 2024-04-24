<?php extract($section); ?>

<section class="works pt-100 pb-100 xs:pt-80 xs:pb-80">
    <div class="container">
        <div class="title">
            <?php if($headline['sub_title']): ?>
                <span class="headline c-primary font-bold"><?php echo $headline['sub_title']; ?></span>
            <?php endif; ?>
            <?php if($headline['title']): ?>
                <h2><?php echo $headline['title']; ?></h2>
            <?php endif; ?>
            <?php if($headline['description']): ?>
                <p><?php echo $headline['description']; ?></p>
            <?php endif; ?>
        </div>
        <?php if( $posts ): ?>
        <div class="content mt-50 xs:mt-30">
            <div class="grid grid-3 xl:grid-2 xs:grid-1 gap-35 xs:gap-20 xs:flex xs:nowrap xs:scroll-x xs:-ml-30 xs:-mr-30 scroll-snap">
                <?php
                foreach( $posts as $post ):
                    setup_postdata($post);
                    $title = get_the_title($post->ID);
                    $url = get_the_permalink($post->ID);
                    $description = get_the_excerpt($post->ID);
                    $client_location = get_field('client_location', $post->ID);
                    $featured_image = get_the_post_thumbnail_url($post->ID, 'img_450x350');
                    $featured_image_id = get_post_thumbnail_id($post->ID);
                    $attachment = wp_get_attachment_image_src( $featured_image_id, 'img_450x350' );
                    $featured_image = $attachment[0];
                    $featured_image_width = $attachment[1];
                    $featured_image_height = $attachment[2];
                    $featured_image_alt = get_the_title($featured_image_id);
                ?>
                <div class="col card snap-center">
                    <a href="<?php echo esc_url($url); ?>" class="item">
                        <?php if($featured_image): ?>
                        <picture>
                            <source srcset="<?php echo webp($featured_image); ?>" type="image/webp">
                            <source srcset="<?php echo $featured_image; ?>" type="image/jpg">
                            <img src="<?php echo $featured_image; ?>" loading="lazy" alt="<?php echo $featured_image_alt; ?>" width="<?php echo $featured_image_width; ?>" height="<?php echo $featured_image_width; ?>" class="transition">
                        </picture>
                        <?php endif; ?>
                        <div class="info mt-20 xs:pl-20 xs:pr-20">
                            <h3 class="h5 transition font-regular">
                                <?php if($title): ?>
                                <strong class="transition font-bold"><?php echo truncate_text($title, 60, '...'); ?></strong>
                                <?php endif; ?>
                                <?php echo ($description) ? '- ' . truncate_text($description, 90) : ''; ?>
                            </h3>
                        </div>
                    </a>
                </div>
                <?php
                endforeach;
                wp_reset_postdata();
                ?>
            </div>
            <div class="btn-group center mt-80 xs:mt-40"> <a href="#" class="btn btn-primary">view all</a>

            </div>
        </div>
        <?php endif; ?>
    </div>
</section>