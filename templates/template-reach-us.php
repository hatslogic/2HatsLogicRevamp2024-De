<?php
/**
 * Template Name: Template Reach Us
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 2HatsLogic
 */

 get_header();
 ?>
 
 <main class="page-wrap inline-block w-100 relative z-0">
 <?php app_render_page_reach_us(); ?>
<?php get_template_part( 'template-parts/reach-us/hero' );?>
<?php get_template_part('template-parts/reach-us/connect-us') ?>
 </main>
 <?php get_footer(); ?>