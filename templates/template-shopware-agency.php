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

<main class="page-wrap inline-block w-100">
    <?php app_render_page_service_shopware_development(); ?>

</main>
<?php
if (get_field('show_callout')) {
    app_render_fragment('global-callout');
} ?>