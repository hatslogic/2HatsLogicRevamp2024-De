<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$search = isset($_GET['search']) ? sanitize_text_field($_GET['search']) : '';
$category_slug = isset($_GET['category']) && ($_GET['category'] !== 'Select') ? sanitize_text_field($_GET['category']) : '';
?>
<section class="plugin-list overflow-hidden relative pt-60 pb-30">
    <div class="container">
        <div class="filterbar flex justify-between wrap">
            <div class="search-box">
                <form role="search" method="get" id="searchform" class="searchform filter flex xs:mb-20 min-w-px-350 xs:w-100" action="<?php echo home_url('/store/'); ?>">
                    <input type="search" placeholder="Search plugins..." class="p-10 b-1 solid border-grey-2 fs-14 w-100"
                        value="<?php echo get_search_query(); ?>" name="search" aria-label="Search">
                    <button type="submit" class="fs-20 c-black bg-orange px-20 py-10 -ml-1  b-0">
                        <i class="icomoon icon-search "></i>
                    </button>
                </form>
            </div>

            <div class="sorting c-secondary fs-14 flex justify-end xs:w-100">
                <div class="flex align-center">
                    <span>Filter</span>
                    <div class="dropdown relative ml-10">
                        <form role="search" method="get" action="<?php echo home_url('/store/'); ?>">

                            <select name="category" id="" class="flex align-center justify-between b-1 solid border-grey-2 c-secondary bg-white p-10 min-w-px-150 fs-14" onchange="this.form.submit()">
                                <option value="">Select</option>
                                <?php $categories = get_terms(array(
                                    'taxonomy'   => 'product_category',
                                    'hide_empty' => false,
                                )); ?>
                                <?php if (!empty($categories)) { ?>
                                    <?php foreach ($categories as $category) { ?>
                                        <option value="<?php echo $category->slug ?>" <?php echo ($category_slug == $category->slug) ? 'selected' : '' ?>><?php echo $category->name ?></option>
                                <?php }
                                } ?>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-3 md:grid-2 xs:grid-1 mt-40 w-100">

            <?php
            $posts_per_page = 6;
            $offset = ($paged - 1) * $posts_per_page;
            $args = [
                'post_type' => 'products',
                'posts_per_page' => $posts_per_page,
                'paged' => $paged,
                'offset' => $offset,
                'orderby' => 'date',
                'order' => 'DESC',
            ];

            // Add search keyword to the query
            if (! empty($search)) {
                $args['s'] = $search;
            }

            // category search to the query
            if (! empty($category_slug)) {
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'product_category',
                        'field'    => 'slug',
                        'terms'    => $category_slug,
                    ),
                );
            }

            $productsQuery = new WP_Query($args);

            if ($productsQuery->have_posts()) {
                while ($productsQuery->have_posts()) {
                    $productsQuery->the_post();
                    $pluginPrice = get_field('plugin_price', get_the_ID());
                    $pluginStoreLink = get_field('shopware_store_url', get_the_ID());
            ?>
                    <div class="col card flex b-0 bt-1 br-1 solid border-grey-2 p-20">
                        <a href="<?php echo get_permalink() ?>" class="w-20">
                            <?php

                            if (has_post_thumbnail()) {
                                $featured_image_id = get_post_thumbnail_id(get_the_ID());

                                $$cropOptions = [
                                    '(max-width: 768px)' => [100, 100],
                                    '(min-width: 769px)' => [150, 150],
                                ];

                                $attributes = ['class' => 'transition', 'loading' => 'lazy', 'picturetag_class' => 'loader'];
                                echo hatslogic_get_attachment_picture($featured_image_id, $cropOptions, $attributes);
                            } ?>
                        </a>
                        <div class="info w-80 pl-20 flex column justify-between">
                            <div class="content">
                                <h5 class="fs-18 c-secondary mb-16 "><?php echo get_the_title(get_the_ID()) ?></h5>

                                <?php
                                // $tags = wp_get_post_terms(get_the_ID(), "product_tag");

                                // if (! empty($tags)) {
                                //     foreach ($tags as $tag) {
                                //         echo "<label style='border: 1px solid; padding: 3px 5px; margin-right: 3px;' class='tag'>" . $tag->name . '</label>';
                                //     }
                                // }

                                ?>
                                <div class="w-100 flex align-center mb-15 md:mb-10">
                                    <?php if (has_term('new', 'product_tag')) { ?>
                                        <span class="c-white fs-12 font-bold px-10 py-5 bg-red">New</span>
                                    <?php } ?>
                                    <!-- <span class="c-primary fs-14">Free trial available.</span> -->
                                </div>
                                <p class="c-secondary m-0"><?php echo get_the_content(get_the_ID()) ?></p>
                            </div>
                            <?php if (!empty($pluginPrice) && !empty($pluginStoreLink)) { ?>
                                <div class="btn-group mt-20">
                                    <a href="<?php echo $pluginStoreLink ?>" class="btn orange-btn-outline">Buy From €<?php echo $pluginPrice ?></a>
                                </div>
                            <?php } else { ?>
                                <a href="<?php echo get_the_permalink(get_the_ID()) ?>" class="btn orange-btn-outline">Learn More</a>
                            <?php } ?>
                        </div>
                    </div>
            <?php }
            }
            wp_reset_postdata();
            ?>

            <?php
            $paginate_links = paginate_links(
                [
                    'format' => '?paged=%#%',
                    'current' => max(1, get_query_var('paged')),
                    'total' => $productsQuery->max_num_pages,
                    'prev_class' => 'prev',
                    'next_class' => 'nexts',
                    'prev_text' => '<i class="icomoon icon-chevron_left"></i>',
                    'next_text' => '<i class="icomoon icon-chevron_right"></i>',
                    'type' => 'array',
                ]
            );

            if ($paginate_links) {
            ?>
                <nav class="pagination w-100 mt-40 flex justify-center">
                    <ul class="mx-auto no-bullets flex fs-16 align-center">
                        <?php foreach ($paginate_links as $link) { ?>
                            <!--Add new classes for links -->
                            <li class="px-10">
                                <?php
                                $paginate_link = '';
                                if (strpos($link, 'prev') !== false || strpos($link, 'next') !== false) {
                                    $paginate_link = str_replace('page-numbers', 'page-link slider-prev flex align-center justify-center transition no-decoration', $link);
                                } elseif (strpos($link, 'current') !== false) {
                                    $paginate_link = str_replace('page-numbers', 'page-link current', $link);
                                    $paginate_link = str_replace('<span', '<a', $paginate_link);
                                    $paginate_link = str_replace('</span>', '</a>', $paginate_link);
                                } else {
                                    $paginate_link = str_replace('page-numbers', 'page-link no-decoration', $link);
                                }
                                echo $paginate_link;
                                ?>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>

            <?php } ?>


        </div>
        <partial src="components/pagination.html"></partial>
    </div>
</section>