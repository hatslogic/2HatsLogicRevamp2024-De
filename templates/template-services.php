<?php
/**
 * Template Name: Template Services
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 2HatsLogic
 */

get_header();
?>
 <main class="page-wrap inline-block w-100">
 <?php app_render_page_services(); ?>
 </main>

 <?php
if ( get_field( 'show_callout' ) ) {
    app_render_fragment( 'global-callout' );
}?>
 <?php get_footer(); ?>