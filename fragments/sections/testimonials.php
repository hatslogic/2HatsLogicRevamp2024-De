<?php extract($section); ?>

<section class="testimonials pt-100 pb-100 xs:pt-80 xs:pb-80 bg-light-grey">
    <div class="container extend">
        <?php if($title): ?>
            <div class="title">
                <h2><?php echo $title; ?></h2>
            </div>
        <?php endif; ?>

        <div class="content mt-80 gap-40 xs:mt-30">
            <?php if( $posts ): ?>
                <div class="slider-wrapper">
                    <div id="testimonials" class="hats-slider horizontal">
                        <?php
                        foreach( $posts as $post ):
                            setup_postdata($post);
                            $name = get_field('name', $post->ID);
                            $designation = get_field('designation', $post->ID);
                            $service = get_field('service', $post->ID);
                            $brand = get_field('brand', $post->ID);
                            $quote = get_field('quote', $post->ID);
                        ?>
                        <div class="hats-slider__slide">
                            <div class="testimonial b-0 br-2 solid bc-hash pr-120 mr-120 xxl:pr-80 xxl:mr-80 xl:pr-60 xl:mr-60 xs:pr-0 xs:mr-0 xs:br-0">
                                <div class="top flex justify-between align-center bg-light-grey">
                                    <?php if($brand): ?>
                                        <img class="order-2" src="<?php echo $brand['url']; ?>" alt="<?php echo $brand['alt']; ?>" loading="lazy" width="100" height="100">
                                    <?php else: ?>
                                        <span class="order-2" ></span>
                                    <?php endif; ?>

                                    <?php if($service): ?>
                                    <span class="service font-bold c-primary order-1">
                                        <?php echo $service; ?>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <?php if($quote): ?>
                                    <blockquote class="m-0 mt-15"><?php echo $quote; ?></blockquote>
                                <?php endif; ?>
                                <?php if($name || $designation): ?>
                                <div class="author mt-30">
                                    <div class="author-name font-bold"><?php echo $name; ?></div>
                                    <span class="designation font-light"><?php echo $designation; ?></span>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php
                        endforeach;
                        wp_reset_postdata();
                        ?>
                    </div>
                    <?php if(count($posts) > 1): ?>
                        <div class="btn-wrap flex align-center justify-start mt-80 xs:mt-40">
                            <div class="slider-prev testimonial-button-prev flex align-center justify-center transition">
                                <i class="icomoon icon-arrow-left"></i>
                            </div>
                            <div class="slider-next testimonial-button-next ml-10 flex align-center justify-center transition">
                                <i class="icomoon icon-arrow-right"></i>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>