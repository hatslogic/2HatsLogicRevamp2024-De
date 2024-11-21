<?php extract($section); ?>

<section class="testimonials pt-100 pb-100 xs:pt-80 xs:pb-80 bg-light-grey">
    <div class="container">
        <?php if ($title): ?>
            <div class="title">
                <h2><?php echo $title; ?></h2>
            </div>
        <?php endif; ?>
        <div class="content mt-60 xs:mt-30">
            <?php if ($posts): ?>
                <div class="slider-wrapper">
                    <div id="testimonials" class="hats-slider horizontal">
                        <?php
                        foreach ($posts as $post):
                            setup_postdata($post);
                            $author_image = get_field('author_image', $post->ID);
                            $name = get_field('name', $post->ID);
                            $designation = get_field('designation', $post->ID);
                            $service = get_field('service', $post->ID);
                            $brand = get_field('brand', $post->ID);
                            $quote = get_field('quote', $post->ID);
                            ?>

                            <div class="hats-slider__slide">
                                <div class="testimonial flex wrap h-100 align-content-between b-0 br-2 solid bc-hash pr-70 xl:pr-0 xl:br-0">
                                    <div class="w-100">
                                        <div class="top w-100 min-h-px-30 flex justify-between align-center mb-16 @@bg">
                                        <?php if ($brand): ?>
                                            <img
                                                class="order-2 max-w-px-80 max-h-px-30 md:max-w-px-60 md:max-h-px-30"
                                                src="<?php echo $brand['url']; ?>"
                                                alt="<?php echo $brand['alt']; ?>" loading="lazy"
                                                width="96" height="20">
                                            <?php else: ?>
                                            <span class="order-2"></span>
                                            <?php endif; ?> 
                                            <?php if ($service): ?>
                                            <span class="service font-bold c-primary order-1 fs-14"><?php echo $service; ?></span>
                                            <?php endif; ?>       
                                        </div>
                                        <?php if ($quote): ?>
                                        <blockquote class="font-quote m-0 fs-18 lh-1-5 sm:fs-16 sm:lh-1-5">
                                        <?php echo $quote; ?>
                                        </blockquote>
                                        <?php endif; ?>     
                                    </div>
                                    <?php if($name): ?>
                                    <div class="author flex align-center justify-start mt-30">
                                        <?php if( $author_image) :?>
                                        <div class="block mr-10 w-px-50 h-px-50 radius-50 overflow-hidden b-1 bc-hash solid">
                                            <img class="w-px-50 h-px-50"
                                                src="<?php echo $author_image['url']; ?>"
                                                alt="<?php echo $author_image['alt']; ?>" loading="lazy"
                                                width="50" height="50">
                                        </div>
                                        <?php endif;?>
                                        <div class="block">
                                            <div class="author-name fs-18 font-bold mb-1"><?php echo $name; ?></div>
                                            <span class="designation font-light fs-16 lh-1-2 mt-5 inline-block"><?php echo $designation; ?></span>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php
                        endforeach;
                        wp_reset_postdata();
                        ?>
                    </div>
                    <?php if (count($posts) > 1): ?>
                    <div class="btn-wrap flex align-center justify-end mt-60 xs:mt-40">
                        <div class="slider-prev testimonial-button-prev flex align-center justify-center transition">
                            <i class="icomoon icon-chevron_left"></i>
                        </div>
                        <div class="slider-next testimonial-button-next ml-10 flex align-center justify-center transition">
                            <i class="icomoon icon-chevron_right"></i>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>