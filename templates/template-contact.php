<?php
/**
 * Template Name: Template Contact
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 2HatsLogic
 */

 get_header();
 ?>
 
 <main class="page-wrap inline-block w-100">
<?php get_template_part( 'template-parts/contact-hero' );?>
<?php get_template_part('template-parts/connect-us') ?>
<?php get_template_part( 'template-parts/office-locations' );?>
 </main>
 <?php get_footer(); ?>