<?php
// $relatedCategories = get_the_terms(get_the_ID(), 'product_category');
// $relatedCategoriesIds = wp_list_pluck($relatedCategories, 'term_id');
$args = array(
    'post_type'      => get_post_type(),
    'posts_per_page' => 6, 
    'post__not_in'   => array(get_the_ID()),
    // 'tax_query'      => array(
    //     array(
    //         'taxonomy' => 'product_category',
    //         'field'    => 'term_id',
    //         'terms'    => $relatedCategoriesIds,
    //     ),
    // ),
);

$query = new WP_Query($args);
?>

<section>
    <div class="container">
        <div class="w-100 mt-70 mb-50">
            <div class="title mb-40 flex align-center justify-between wrap">
                <h2>Recommended for you</h2>
                <a href="<?php echo site_url( 'store' ) ?>" aria-label="show-full-description" class="link link-primary underline block md:mt-16">View More</a>
            </div>
            <div class="w-100 lg:w-100 grid grid-3 md:grid-2 xs:grid-1 cg-40 rg-40 bg-grey-2 p-30">
                <?php 
                if ($query->have_posts()) : 
                    while($query->have_posts()) :
                        $query->the_post();
                        $shortDescription = get_field('short_description',get_the_ID() ); ?>
        
                        <a href="#" class="item flex justify-content-start">
                        <?php
                            if (has_post_thumbnail()) {
                                $featured_image_id = get_post_thumbnail_id(get_the_ID());
                            
                                $cropOptions = [
                                    '(max-width: 768px)' => [84, 84],
                                    '(min-width: 769px)' => [84, 84],
                                ];

                                $attributes = ['class' => 'transition', 'loading' => 'lazy', 'picturetag_class' => 'loader w-20'];
                                echo hatslogic_get_attachment_picture($featured_image_id, $cropOptions, $attributes); 
                            }?>
                            <div class="info w-80 pl-20 c-secondary">
                                <h6 class="fs-18 lh-1-5 mb-10 hover:text-decoration-underline"><?php echo get_the_title() ?></h6>
                                <p class="fs-16 m-0"><?php echo $shortDescription ?></p>
                            </div>
                        </a>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section>