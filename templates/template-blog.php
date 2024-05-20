<?php
/**
 * Template Name: Template Blog
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 2HatsLogic
 */

get_header();
?>
<main class="page-wrap inline-block w-100">
    <section class="blog-list pt-100 xs:pt-80 pb-100 md:pb-60">
        <div class="container">
            <div class="title w-100 flex justify-between sm:wrap">
                <h1 class="h1-sml w-100 sm:mb-20">Blogs</h1>
                <div class="flex w-100 justify-end gap-20 align-end">
                    <div class="form-group max-w-58 md:max-w-100">
                        <form role="search" method="get" id="searchform" class="searchform"
                            action="<?php echo home_url('/'); ?>">
                            <input type="search" class="form-control lined" placeholder="Search Blog here"
                                value="<?php echo get_search_query(); ?>" name="s" id="s" aria-label="Search">
                            <input type="hidden" name="post_type" value="post">
                        </form>
                    </div>
                </div>
            </div>
            <div class="content mt-60 sm:mt-40 xs:mt-30 align-start md:wrap flex gap-40">
                <div class="w-70 md:w-100 md:w-100">
                    <div
                        class="grid grid-2 md:grid-2 xs:grid-1 cg-30 rg-50 md:rg-30 w-100 grid grid-2 md:grid-2 xs:grid-1 cg-40 rg-60 md:rg-40">

                        <?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $posts_per_page = 8;
                        $offset = ($paged - 1) * $posts_per_page;
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => $posts_per_page,
                            'paged' => $paged,
                            'offset' => $offset,
                            'orderby' => 'date',
                            'order' => 'DESC',
                        );

                        $blog_query = new WP_Query($args);
                        $placeholder_image = get_template_directory_uri() . '/assets/images/blog-listing.svg';

                        if ($blog_query->have_posts()):
                            while ($blog_query->have_posts()):
                                $blog_query->the_post();
                                $reading_time_text = get_reading_time(get_the_content());
                                ?>

                                <div class="col card">
                                    <a href="<?php the_permalink(); ?>" class="item">
                                        <?php if (has_post_thumbnail()):
                                            $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'img_498x260');
                                            ?>
                                            <picture>
                                                <source srcset="<?php echo esc_url($featured_image); ?>" type="image/webp">
                                                <source srcset="<?php echo esc_url($featured_image); ?>" type="image/jpg">
                                                <img src="<?php echo esc_url($featured_image); ?>" loading="lazy" alt="Blog"
                                                    width="498" height="260" class="transition">
                                            </picture>
                                        <?php else:

                                            ?>
                                            <picture>
                                                <img src="<?php echo esc_url($placeholder_image); ?>" loading="lazy" alt="Blog"
                                                    width="498" height="260" class="transition">
                                            </picture>


                                        <?php endif; ?>
                                        <div class="info mt-15">
                                            <div class="w-100 flex justify-between mb-15 md:mb-10">
                                                <span
                                                    class="c-dark-grey fs-14"><?php echo esc_html($reading_time_text); ?></span>
                                                <span class="c-dark-grey fs-14"><?php echo get_the_date(); ?></span>
                                            </div>
                                            <h2 class="h4 transition font-bold"><?php the_title(); ?></h2>
                                        </div>
                                    </a>
                                </div>
                                <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                    <?php
                    $paginate_links = paginate_links(
                        array(
                            'format' => '?paged=%#%',
                            'current' => max(1, get_query_var('paged')),
                            'total' => $blog_query->max_num_pages,
                            'prev_class' => 'prev',
                            'next_class' => 'nexts',
                            'prev_text' => '<i class="icomoon icon-chevron_left"></i>',
                            'next_text' => '<i class="icomoon icon-chevron_right"></i>',
                            'type' => 'array',
                        )
                    );

                    if ($paginate_links):
                        ?>
                        <nav class="pagination w-100 mt-40 flex justify-center">
                            <ul class="mx-auto no-bullets flex fs-16 align-center">
                                <?php foreach ($paginate_links as $link): ?>
                                    <!--Add new classes for links -->
                                    <li class="px-10">
                                        <?php
                                        $paginate_link = '';
                                        if (strpos($link, 'prev') !== false || strpos($link, 'next') !== false) {
                                            $paginate_link = str_replace('page-numbers', 'page-link slider-prev flex align-center justify-center transition no-decoration', $link );
                                        } else {
                                            $paginate_link = str_replace('page-numbers', 'page-link no-decoration', $link );
                                        }
                                        // $paginate_link = str_replace( 'page-numbers', 'page-link slider-next flex align-center justify-center transition no-decoration', $link );
                                        echo $paginate_link;
                                        ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </nav>
                    <?php endif; ?>
                </div>
                <div
                    class="w-30 md:w-100 pl-30 b-0 bl-1 solid bc-hash md:pl-30 md:b-1 solid bc-hash md:p-30 sticky top-120 md:mt-30">
                    <div class="w-100 mb-60 md:mb-30">
                        <div class="title mb-20">
                            <h2 class="h4">Most popular</h2>

                        </div>
                        <div class="content">
                            <ul class="fs-16 no-bullets">
                                <?php
                                $args = array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 4,
                                    'orderby' => 'meta_value_num',
                                    'order' => 'DESC',
                                );
                                $popular_posts = new WP_Query($args);
                                if ($popular_posts->have_posts()):
                                    while ($popular_posts->have_posts()):
                                        $popular_posts->the_post();
                                        ?>
                                        <li class="b-0 bb-1 solid bc-hash mb-20 pb-10">
                                            <a href="<?php the_permalink(); ?>" class="no-decoration"><?php the_title(); ?></a>
                                        </li>
                                        <?php
                                    endwhile;
                                endif;
                                wp_reset_postdata();
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="w-100">
                        <div class="title mb-20">
                            <h2 class="h4">Categories</h2>

                        </div>
                        <div class="content">
                            <ul class="list no-bullets flex wrap cg-20 rg-5">
                                <?php
                                $categories = get_categories();
                                foreach ($categories as $category):
                                    ?>
                                    <li><a href="<?php echo get_category_link($category->term_id); ?>"
                                            class="no-decoration fs-16"><?php echo $category->name; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/blockquote'); ?>
    <?php get_template_part('template-parts/newsletter-form'); ?>

</main>
<?php get_footer(); ?>