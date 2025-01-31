<?php
/* Template Name: Template Plugins Store */

get_header();
?>

<main class="page-wrap inline-block w-100 relative z-0">

    <?php get_template_part( 'template-parts/store-hero' );?>
    <?php get_template_part( 'template-parts/store-plugins-listing' );?>
    <?php get_template_part( 'template-parts/store-best-selling' );?>
    <?php get_template_part( 'template-parts/store-testimonials' );?>
    <?php get_template_part( 'template-parts/store-latest-plugin' );?>
    <?php get_template_part( 'template-parts/store-cta-block' );?>
    
</main>
<?php get_footer(); ?>