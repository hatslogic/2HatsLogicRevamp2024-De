<?php extract($section); ?>
<?php $bg_class = $bg_enabled ? ' bg-light-grey pt-100 pb-100 xs:pt-80 xs:pb-80 ' : ' bg-white '; ?>
<?php if ($posts): ?>
<section class="testimonials">
    <div class="container">
        <div
            class="grid grid-4 sm:flex sm:flex-wrap sm:overflow-auto lg:grid-3 xl:grid-4 rg-40 cg-20 p-60 xs:p-30 relative review-clients scroll-snap bg-light-grey b-white  shadow-rating">
            <?php   
                    foreach ($posts as $post):
                    setup_postdata($post);
                    $author_image = get_field('author_image', $post->ID);
                    $name = get_field('name', $post->ID);
                    $designation = get_field('designation', $post->ID);
                    $quote_excert = get_field('quote_excert', $post->ID);
                    $rating = get_field('rating', $post->ID);
                ?>
            <div class="col snap-center sm:min-w-px-280">
                <div class="card xs:w-100 flex align-start h-100">
                    <div class="review-box flex wrap h-100 align-content-between b-0 br-1 solid bc-hash pr-20 xs:pr-0">

                        <?php if( $quote_excert ):?>
                        <div class="w-100">
                            <blockquote class="font-quote m-0 fs-16 lh-1-35"><?php echo $quote_excert;?></blockquote>
                        </div>
                        <?php endif;?>
                        <div class="w-100">
                            <?php if( $rating ):?>
                            <div class="google-rating flex justify-between align-center xs:wrap mt-15 xs:mt-10 w-100">
                                <div class="rating-score flex align-center gap-20">
                                    <img src="<?php echo $rating['url']; ?>" alt="star" class="w-px-90" width="90"
                                        height="18">
                                </div>
                            </div>
                            <?php endif;?>
                            <div class="author flex align-center justify-start mt-15">
                                <?php if( $author_image) :?>
                                <div class="block mr-10 w-px-40 h-px-40 radius-40 overflow-hidden b-1 bc-hash solid">
                                    <img class="w-px-40 h-px-40" src="<?php echo $author_image['url']; ?>"
                                        alt="<?php echo $author_image['alt']; ?>" loading="lazy" width="50" height="50">
                                </div>
                                <?php endif;?>
                                <div class="block">

                                    <div class="author-name fs-15 font-bold mb-1"><?php echo $name; ?></div>
                                    <span
                                        class="designation font-light fs-14 lh-1-2 mt-5 inline-block"><?php echo $designation; ?></span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                    endforeach;
                    wp_reset_postdata();
                ?>
        </div>

    </div>
</section>
<?php endif; ?>