<?php $best_selling_block_fields = get_field('best_selling_plugins_block');?>
<section class="best-selling relative pt-30 pb-30">
    <div class="container relative z-1">
        <div class="title mb-40">
            <h2><?php echo $best_selling_block_fields['headline'] ? $best_selling_block_fields['headline'] : 'Best Selling Plugins' ?></h2>
        </div>
        <div class="flex lg:wrap w-100 b-1 solid border-grey-2">
            <div class="w-70 lg:w-100 grid grid-2 md:grid-1 cg-40 rg-30 bg-grey-2 p-30">

                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $posts_per_page = 6;
                $offset = ($paged - 1) * $posts_per_page;
                $args = [
                    'post_type' => 'products',
                    'posts_per_page' => $posts_per_page,
                    'paged' => $paged,
                    'offset' => $offset,
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'tax_query' => [
                        [
                            'taxonomy' => 'product_category',
                            'field' => 'slug',
                            'terms' => 'best-selling',
                        ],
                    ],
                ];

                $productsQuery = new WP_Query($args);

                if ($productsQuery->have_posts()) {
                    while ($productsQuery->have_posts()) {
                        $productsQuery->the_post(); 
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
                                <h6 class="fs-18 lh-1-5 mb-10 hover:text-decoration-underline"><?php echo get_the_title( get_the_ID() ) ?></h6>
                                <p class="fs-16 m-0"><?php echo $shortDescription ?></p>
                            </div>
                        </a>
                    <?php }
                }
                wp_reset_postdata();
                ?>

            </div>
            <div class="w-40 lg:hidden h-100 relative">
                <?php if($best_selling_block_fields['cover_image']): ?>
                    <?php 
                    $cover_image = $best_selling_block_fields['cover_image']; 
                    $cropOptions = [
                        '(max-width: 768px)' => [500, 350],
                        '(min-width: 769px)' => [500, 350],
                    ];
                    $attributes = ['class' => 'transition', 'loading' => 'eager', 'fetchPriority' => 'high', 'picturetag_class' => 'loader'];
                    ?>
                    <?php echo hatslogic_get_attachment_picture($cover_image['ID'], $cropOptions, $attributes); ?>
                <?php endif; ?>

                <div class="absolute top-0 c-white w-100 h-100 flex align-left justify-center column p-30">
                    <h4 class="fs-30 lh-1-5 mb-16"><?php echo $best_selling_block_fields['image_overlay_text'] ?></h4>
                    <a href="<?php echo $best_selling_block_fields['link']['url'] ?>" class="c-white underline"><?php echo $best_selling_block_fields['link']['title'] ?></a>
                </div>
            </div>
        </div>
    </div>
</section>