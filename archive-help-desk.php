<?php
/**
 * Template Name: Template Help desk.
 *
 * @see https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
get_header();

$headline = get_field('headline');
$sub_headline = get_field('sub_headline');
$search_placeholder = get_field('search_placeholder');
$show_all_link_label = get_field('show_all_link_label');
$backgroundImage = get_field('background_image');
$get_started = get_field('section_get_started');
?>

<main class="page-wrap inline-block w-100 relative z-0">
    <section class="help-desk overflow-hidden relative pt-100 xs:pt-60 pb-100 md:pb-60">
        <div class="container relative z-1">
          <div class="title w-100 flex justify-between sm:wrap">
            <div class="header w-100 sm:mb-20">
                <?php if ($headline) { ?>
                    <h1 class="h1-sml w-100"><?php echo $headline; ?></h1>
                <?php } ?>
                <?php if ($sub_headline) { ?>
                    <p><?php echo $sub_headline; ?></p>
                <?php } ?>
            </div>
            <div class="flex w-100 justify-end gap-20 align-end">
              <div class="form-group max-w-58 md:max-w-100">
                <form role="search" method="get" id="searchform" class="searchform"
                    action="<?php echo home_url('/'); ?>">
                    <input type="search" class="form-control lined" placeholder="<?php echo ($search_placeholder) ? $search_placeholder : 'Search here'; ?>"
                        value="<?php echo get_search_query(); ?>" name="s" id="s" aria-label="Search">
                    <input type="hidden" name="post_type" value="help-desk">
                </form>
              </div>
            </div>
          </div>
          <div class="content mt-60 sm:mt-40 xs:mt-30 align-start md:wrap flex gap-40">
            <div class="w-70 md:w-100 md:w-100">
                <div class="filter btn-group flex gap-15 scroll-snap xs:nowrap xs:scroll-x">
                    <?php
                    $terms = get_terms([
                        'taxonomy' => 'help_desk_category',
                        'hide_empty' => false,
                    ]);

foreach ($terms as $term) { ?> 
                        <a href="<?php echo get_term_link($term); ?>" class="snap-center btn btn-secondary-outline"><?php echo $term->name; ?></a>
                    <?php } ?>
                
                </div>
                <div class="split-2 mt-60 xs:split-1 gap-30">
                    <?php
$termCount = 0;
foreach ($terms as $term) { ?>
                        <div class="<?php echo ($termCount == 0) ? 'col break-in:ac animate' : 'col mt-30 xs:mt-40 break-in:ac'; ?>">
                            <div class="card b-1 xs:b-0 p-30 xs:p-0 bc-hash solid transition">
                                <div class="title b-0 bb-1 solid bc-hash pb-12 mb-20">
                                    <h3 class="h4 uppercase"><?php echo $term->name; ?></h3>
                                </div>
                                <div class="content">
                                <ul class="no-bullets fs-16">
                                    <?php
                // Query posts for the current term
                $args = [
                    'post_type' => 'help-desk',
                    'posts_per_page' => 6,
                    'tax_query' => [
                        [
                            'taxonomy' => 'help_desk_category',
                            'field' => 'slug',
                            'terms' => $term->slug,
                        ],
                    ],
                ];
    $query = new WP_Query($args);
    while ($query->have_posts()) {
        $query->the_post(); ?>
                                        <li class="mt-15">
                                        <a href="<?php echo get_the_permalink(); ?>" class="no-decoration">
                                            <span><?php echo get_the_title(); ?></span>
                                        </a>
                                        </li>
                                    <?php }
    // Reset post data
    wp_reset_postdata(); ?>
                                </ul>
                                <div class="btn-group mt-30">
                                    <a href="<?php echo get_term_link($term); ?>" class="link link-primary"><?php echo ($show_all_link_label) ? $show_all_link_label : 'Show All Articles'; ?><i class="icomoon icon-chevron_right"></i>
                                    </a>
                                </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        ++$termCount;
} ?>

              </div>
            </div>
            <div class="w-30 md:w-100 pl-30 b-0 bl-1 solid bc-hash md:pl-20 md:b-1 solid bc-hash md:p-30 sticky top-120 md:mt-30">
              <div class="w-100 mb-60 md:mb-30">
                <div class="title mb-20">
                  <h2 class="h4">Recent articles</h2>
                </div>
                <div class="content">
                  <ul class="fs-16 no-bullets">
                      <?php
  $args = [
      'post_type' => 'post',
      'posts_per_page' => 4,
      'orderby' => 'post_date',
      'order' => 'DESC',
  ];
$popular_posts = new WP_Query($args);
if ($popular_posts->have_posts()) {
    while ($popular_posts->have_posts()) {
        $popular_posts->the_post(); ?>
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
        
        <div class="bg-shape absolute z-0 right-0 top-0 w-60 md:w-80">
            <?php if ($backgroundImage) { ?>
              
              <?php
                $cropOptions = [
                    '(max-width: 768px)' => [390, 204],
                    '(min-width: 769px)' => [375, 195],
                ];

                $attributes = ['class' => 'shape w-100 absolute -top-10', 'loading' => 'lazy'];
                ?>
                <?php echo hatslogic_get_attachment_picture($backgroundImage['ID'], $cropOptions, $attributes); ?>
            <?php } ?>
        </div>
    </section>
    
    <?php get_template_part('template-parts/get-started'); ?>

</main>

<?php get_footer(); ?>