<?php extract($section); ?>
<section class="works pb-100 xs:pb-80">
    <div class="container">
        <?php if (!empty($section_title)) {?>
        <div class="title">
        <h2><?php echo $section_title; ?></h2>
        </div>
        <?php } ?>
        <?php if (!empty($case_studies)) { ?>
        <div class="content mt-50 xs:mt-30">
            <div class="grid grid-3 xl:grid-2 xs:grid-1 gap-35 xs:gap-20 xs:flex xs:nowrap xs:scroll-x xs:-ml-20 xs:-mr-20 scroll-snap">
                <?php foreach ($case_studies as $case_study) { ?>
                <?php ?>    
                <div class="col card snap-center"> 
                    <a href="<?php echo get_permalink($case_study); ?>" class="item">
                    <?php if (has_post_thumbnail($case_study)) { ?>
                        <?php
                        $placeholder_image_url = get_site_url().'/wp-content/uploads/2024/05/no-image-casestudy-list.svg';
                        $featured_image_id = get_post_thumbnail_id($case_study);
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
                            <h3 class="h5 transition font-regular"><strong class="transition font-bold"><?php echo get_the_title($case_study); ?>&colon;</strong> <?php echo truncate_text(get_the_excerpt($case_study), 90, '...'); ?></h3>
                        </div>
                    </a>
                </div>
                <?php } ?>
            </div>
            <?php if (!empty($cta)) { ?>
            <div class="btn-group center mt-80 xs:mt-40"> 
                
                <a href="<?php echo $cta['url'] ? $cta['url'] : '#'; ?>"  <?php if ($cta['target'] != '') { ?> target="_blank" <?php } ?> class="btn btn-primary"><?php echo $cta['title'] ? $cta['title'] : 'view all'; ?></a>

            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</section>
