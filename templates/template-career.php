<?php
/**
 * Template Name: Template Career
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 2HatsLogic
 */

get_header();
?>

<main class="page-wrap inline-block w-100 relative z-0">
    <?php app_render_page_career(); ?>
    <?php get_template_part( 'template-parts/get-started');?>
</main>

<?php
if ( get_field( 'show_callout' ) ) {
    app_render_fragment( 'global-callout' );
}
?>

<?php get_footer(); ?>