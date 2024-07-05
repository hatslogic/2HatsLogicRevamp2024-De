<?php
/**
 * Template Name: Template Shopware Agency
 * Template Post Type: post, page, service
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 2HatsLogic
 */

get_header();
?>

<main class="page-wrap inline-block w-100 relative z-0">
    <?php app_render_page_service_shopware_development(); ?>

    <?php get_template_part('template-parts/get-started'); ?>
</main>
<?php
if (get_field('show_callout')) {
    app_render_fragment('global-callout');
} 
//get_template_part( 'template-parts/free-consultation');
?>

<?php get_footer(); ?>