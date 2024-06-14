<?php extract($section); ?>
<section class="hero pt-60">
    <div class="container">
        <div class="flex align-center justify-between md:wrap">
            <div class="col w-50 md:w-100">
                <div class="about-header">
                    <?php if ($headline['title']): ?>
                        <h1 class="h3"><?php echo $headline['subtitle'] ?></h1>
                        <h2 class="h1-sml"><?php echo $headline['title'] ?></h2>
                        <p class="mt-30"><?php echo $content ?></p>
                    <?php endif; ?>
                    <?php if ($button): ?>
                        <div class="btn-group mt-40">
                            <a href="<?php echo $button['url']; ?>" class="btn btn-primary"><?php echo $button['title']; ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php if ($image): ?>
                <?php
                $featured_image_id = get_post_thumbnail_id($image['ID']);

                // Mobile images
                $mobile_1x = wp_get_attachment_image_src($featured_image_id, 'mobile-1x');
                $mobile_2x = wp_get_attachment_image_src($featured_image_id, 'mobile-2x');
                
                // Tablet images
                $tablet_1x = wp_get_attachment_image_src($featured_image_id, 'tablet-1x');
                $tablet_2x = wp_get_attachment_image_src($featured_image_id, 'tablet-2x');
                
                // Small desktop images
                $small_desktop_1x = wp_get_attachment_image_src($featured_image_id, 'small-desktop-1x');
                $small_desktop_2x = wp_get_attachment_image_src($featured_image_id, 'small-desktop-2x');
                
                // Large desktop images
                $large_desktop_1x = wp_get_attachment_image_src($featured_image_id, 'large-desktop-1x');
                $large_desktop_2x = wp_get_attachment_image_src($featured_image_id, 'large-desktop-2x');
                
                // Fallback image
                $default_image = wp_get_attachment_image_src($featured_image_id, 'full');
                   
                ?>
                <div class="col w-40 md:w-100 md:mt-40">
                    <picture>
                         <!-- Mobile images -->
                         <source srcset="<?php echo webp($mobile_1x[0]); ?> 1x, <?php echo webp($mobile_2x[0]); ?> 2x" type="image/webp" media="(max-width: 599px)">
                        <source srcset="<?php echo $mobile_1x[0]; ?> 1x, <?php echo $mobile_2x[0]; ?> 2x" type="image/jpeg" media="(max-width: 599px)">

                        <!-- Tablet images -->
                        <source srcset="<?php echo webp($tablet_1x[0]); ?> 1x, <?php echo webp($tablet_2x[0]); ?> 2x" type="image/webp" media="(min-width: 600px) and (max-width: 1023px)">
                        <source srcset="<?php echo $tablet_1x[0]; ?> 1x, <?php echo $tablet_2x[0]; ?> 2x" type="image/jpeg" media="(min-width: 600px) and (max-width: 1023px)">

                        <!-- Small desktop images -->
                        <source srcset="<?php echo webp($small_desktop_1x[0]); ?> 1x, <?php echo webp($small_desktop_2x[0]); ?> 2x" type="image/webp" media="(min-width: 1024px) and (max-width: 1439px)">
                        <source srcset="<?php echo $small_desktop_1x[0]; ?> 1x, <?php echo $small_desktop_2x[0]; ?> 2x" type="image/jpeg" media="(min-width: 1024px) and (max-width: 1439px)">

                        <!-- Large desktop images -->
                        <source srcset="<?php echo webp($large_desktop_1x[0]); ?> 1x, <?php echo webp($large_desktop_2x[0]); ?> 2x" type="image/webp" media="(min-width: 1440px)">
                        <source srcset="<?php echo $large_desktop_1x[0]; ?> 1x, <?php echo $large_desktop_2x[0]; ?> 2x" type="image/jpeg" media="(min-width: 1440px)">
                        <img src="<?php echo $image['sizes']['img_648x445']; ?>" loading="lazy" alt="about" width="648px"
                            height="445px" class="transition">
                        <img src="<?php echo $image['sizes']['img_648x445']; ?>" loading="lazy" alt="about" width="648px"
                            height="445px" class="transition">
                    </picture>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>