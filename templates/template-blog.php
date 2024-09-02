<?php
/**
 * Template Name: Template Blog.
 *
 * @see https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
get_header();
?>
<main class="page-wrap inline-block w-100 relative z-0">
    <section class="blog-list relative pt-100 xs:pt-60 pb-100 md:pb-60">
        <div class="container relative z-1">
            <div class="title w-100 flex justify-between sm:wrap">
                <h1 class="h1-sml w-100 sm:mb-20"><?php the_title(); ?></h1>
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
$posts_per_page = 16;
$offset = ($paged - 1) * $posts_per_page;
$args = [
    'post_type' => 'post',
    'posts_per_page' => $posts_per_page,
    'paged' => $paged,
    'offset' => $offset,
    'orderby' => 'date',
    'order' => 'DESC',
];

$blog_query = new WP_Query($args);
$placeholder_image = get_template_directory_uri().'/dist/assets/images/blog-listing.svg';

if ($blog_query->have_posts()) {
    while ($blog_query->have_posts()) {
        $blog_query->the_post();
        $reading_time_text = get_reading_time(get_the_ID(), get_the_content());
        ?>

                                <div class="col card">
                                    <a href="<?php the_permalink(); ?>" class="item">
                                        <?php if (has_post_thumbnail()) {
                                            $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'img_498x260');
                                            $featured_image_id = get_post_thumbnail_id(get_the_ID());
                                            ?>
                                       
                                        <?php
                                    $cropOptions = [
                                        '(max-width: 768px)' => [390, 204],
                                        '(min-width: 769px)' => [487, 255],
                                    ];

                                            $attributes = ['class' => 'transition', 'loading' => 'lazy', 'picturetag_class' => 'loader'];
                                            ?>
                                    <?php echo hatslogic_get_attachment_picture($featured_image_id, $cropOptions, $attributes); ?>
                                        <?php } else {
                                            ?>
                                            <picture>
                                                <img src="<?php echo esc_url($placeholder_image); ?>" loading="lazy" alt="Blog"
                                                    width="498" height="260" class="transition">
                                            </picture>


                                        <?php } ?>
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
    }
}
wp_reset_postdata();
?>
                    </div>
                    <?php
                    $paginate_links = paginate_links(
                        [
                            'format' => '?paged=%#%',
                            'current' => max(1, get_query_var('paged')),
                            'total' => $blog_query->max_num_pages,
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
                                    // $paginate_link = str_replace( 'page-numbers', 'page-link slider-next flex align-center justify-center transition no-decoration', $link );
                                    echo $paginate_link;
                                    ?>
                                    </li>
                                <?php } ?>
                            </ul>
                        </nav>
                    <?php } ?>
                </div>
                <div
                    class="w-30 md:w-100 pl-30 b-0 bl-1 solid bc-hash md:pl-20 md:b-1 solid bc-hash md:p-30 sticky top-120 md:mt-30">
                    <div class="w-100 mb-60 md:mb-30">
                        <div class="title mb-20">
                            <h2 class="h4">Most popular</h2>

                        </div>
                        <div class="content">
                            <ul class="fs-16 no-bullets">
                                <?php
                                $args = [
                                    'post_type' => 'post',
                                    'posts_per_page' => 4,
                                    'orderby' => 'meta_value_num',
                                    'order' => 'DESC',
                                ];
$popular_posts = new WP_Query($args);
if ($popular_posts->have_posts()) {
    while ($popular_posts->have_posts()) {
        $popular_posts->the_post();
        ?>
                                        <li class="b-0 bb-1 solid bc-hash mb-20 pb-10">
                                            <a href="<?php the_permalink(); ?>" class="no-decoration"><?php the_title(); ?></a>
                                        </li>
                                        <?php
    }
}
wp_reset_postdata();
?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-shape absolute z-0 right-0 top-0 w-60  h-px-500 md:w-80">
            <picture class="shape w-100 absolute -top-10">
                <source srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg.webp 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg2x.webp 2x" media="(min-width: 768px)" type="image/webp">
                <source srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg-mobile.webp 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg-mobile.webp 2x" media="(max-width: 767px)" type="image/webp">
                <source srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg.jpg 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg2x.jpg 2x" media="(min-width: 768px)" type="image/jpg">
                <source srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg-mobile.jpg 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg-mobile.jpg 2x" media="(max-width: 767px)" type="image/jpg">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg.jpg" alt="help-desk" width="100" height="100">
            </picture>
        </div>
    </section>
    <?php get_template_part('template-parts/newsletter-form'); ?>

</main>
<?php get_footer(); ?>