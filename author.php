<?php
get_header();

$author = get_queried_object();
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = [
    'author' => $author->ID,
    'posts_per_page' => 9, // Change this to the number of posts you want per page
    'paged' => $paged,
];

$author_query = new WP_Query($args);
?>

<main class="page-wrap inline-block w-100 relative z-0">
    <section class="w-100 bg-dark-primary c-white pt-100 pb-100 xs:pt-80 xs:pb-80">
        <div class="container">
            <div class="title">
                <h1 class="h1-sml">
                    Author: <?php echo get_the_author_meta('first_name', $author->ID); ?>
                </h1>
            </div>
            <div class="content w-80 lg:w-100 flex mt-60 md:mt-40 justify-between align-start gap-80 md:gap-20 md:wrap md:justify-end">
                <div class="avatar-wrap md:w-100 md:mb-20 col">
                <div class="img-wrap bg-light-grey w-px-220 h-px-220 max-w-px-220 min-w-px-220 xs:w-px-150 xs:h-px-150 xs:max-w-px-150 xs:min-w-px-150 over overflow-hidden">
                    <?php $author_image = get_field('user_image', 'user_'.$author->ID); ?>
                    <?php
                    $cropOptions = [
                        '(max-width: 768px)' => [100, 100],
                        '(min-width: 769px)' => [150, 150],
                    ];
                    $attributes = ['class' => 'transition', 'loading' => 'eager', 'fetchPriority' => 'high'];
                    ?>

                    <?php
                    if($author_image):
                    echo hatslogic_get_attachment_picture($author_image['ID'], $cropOptions, $attributes);
                    endif;
                    ?>
                    </div>
                    
                    <?php if (get_field('social_links', 'user_'.$author->ID)) { ?>
                        <?php $social_links = get_field('social_links', 'user_'.$author->ID); ?>
                        <div class="social-media mt-40 md:mt-20 flex align-center justify-center md:justify-start fs-22"> 
                            <?php if ($social_links['linkedin']) { ?>
                                <a href="<?php echo $social_links['linkedin']; ?>" class="flex align-center c-white" target="_blank" aria-label="linkedin"><i class="icomoon icon-linkedin"></i></a>
                            <?php } ?>
                            <?php if ($social_links['instagram']) { ?>
                                <a href="<?php echo $social_links['instagram']; ?>" class="flex align-center c-white ml-20" target="_blank" aria-label="instagram"><i class="icomoon icon-instagram"></i></a>
                            <?php } ?>
                            <?php if ($social_links['twitter']) { ?>
                                <a href="<?php echo $social_links['twitter']; ?>" class="flex align-center c-white ml-20" target="_blank" aria-label="twitter"><i class="icomoon icon-twitter"></i></a>
                            <?php } ?>
                            <!-- <a href="#" class="flex align-center c-white ml-20" target="_blank" aria-label="youtube"><i class="icomoon icon-youtube"></i></a> -->
                            <!-- <a href="#" class="flex align-center c-white ml-20" target="_blank" aria-label="facebook"><i class="icomoon icon-facebook"></i></a> -->
                        </div>
                    <?php } ?>
                </div>
                <div class="quote col w-100">
                    <div class="author mb-30">
                        <h1 class="author-name fs-24 font-bold"><?php echo get_the_author_meta('display_name', $author->ID); ?></h1>
                        <?php if (get_field('designation', 'user_'.$author->ID)) { ?>
                            <span class="designation font-light mt-10 inline-block"><?php echo get_field('designation', 'user_'.$author->ID); ?></span>
                        <?php } ?>

                    </div>
                    <?php if (!empty(get_user_meta($author->ID, 'description', true))) { ?>
                        <blockquote class="font-quote w-100 m-0 fs-20 md:fs-18 lh-1-5"><?php echo get_user_meta($author->ID, 'description', true); ?></blockquote>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <?php if ($author_query->have_posts()) { ?>
    <section class="blog-list overflow-hidden relative pt-100 xs:pt-60 pb-100 md:pb-60">
        <div class="container">
            <div class="title">
                <h2 class="h2">Recent Articles</h2>
            </div>
            <div class="grid grid-3 md:grid-2 xs:grid-1 mt-40 cg-30 rg-50 md:rg-30 w-100 grid grid-2 md:grid-2 xs:grid-1 cg-40 rg-60 md:rg-40">
                <?php while ($author_query->have_posts()) {
                    $author_query->the_post();
                    $reading_time_text = get_reading_time(get_the_ID(), get_the_content()); ?>
                    <div class="col card" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <a href="<?php the_permalink(); ?>" class="item">
                            <?php
                            if (has_post_thumbnail()) {
                                $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'img_498x260');
                                $featured_image_id = get_post_thumbnail_id(get_the_ID());
                                ?>
                                
                               <?php $cropOptions = [
                                   '(max-width: 768px)' => [360, 204],
                                   '(min-width: 769px)' => [360, 188],
                               ];
                                $attributes = ['class' => 'transition', 'loading' => 'lazy'];
                                ?>
                                <?php echo hatslogic_get_attachment_picture($featured_image_id, $cropOptions, $attributes); ?>
                            <?php } else { ?>
                                <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/blog-listing.svg'); ?>"
                                    loading="lazy" alt="<?php the_title_attribute(); ?>" width="498" height="260" class="transition">
                            <?php } ?>
                            <div class="info mt-15">
                                <div class="w-100 flex justify-between mb-15 md:mb-10">
                                    <span class="c-dark-grey fs-14"><?php echo esc_html($reading_time_text); ?></span>
                                    <span class="c-dark-grey fs-14"><?php echo get_the_date(); ?></span>
                                </div>
                                <h2 class="h4 transition font-bold"><?php the_title(); ?></h2>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
            
            
            <nav class="pagination w-100 mt-40 flex justify-center">
                <ul class="mx-auto no-bullets flex fs-16 align-center">
                <?php
                                                $pagination_links = paginate_links([
                                                    'total' => $author_query->max_num_pages,
                                                    'type' => 'array',
                                                    'prev_text' => '<i class="icomoon icon-chevron_left"></i>',
                                                    'next_text' => '<i class="icomoon icon-chevron_right"></i>',
                                                ]);

        if (!empty($pagination_links)) { ?>
                   <nav class="pagination w-100 mt-40 flex justify-center">
                        <ul class="mx-auto no-bullets flex fs-16 align-center">
                            <?php foreach ($pagination_links as $link) {
                                if (strpos($link, 'current') !== false) { ?>
                                    <li class="px-10"><span aria-current="page" class="page-link no-decoration current"><?php echo $link; ?></span></li>
                                <?php } elseif (strpos($link, 'dots') !== false) { ?>
                                    <li class="px-10"><span class="page-link no-decoration dots"><?php echo $link; ?></span></li>
                                <?php } else { ?>
                                    <li class="px-10"><?php echo $link; ?></li>
                                <?php }
                                } ?>
                        </ul>
                    </nav>
                <?php }?>
                </ul>
            </nav>
        </div>
    </section>
    <?php } wp_reset_postdata(); ?>

    <?php get_template_part('template-parts/newsletter-form'); ?>
    
</main>


<?php
get_footer();
