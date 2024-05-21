<?php
/**
 * The template for displaying case study single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package 2HatsLogic
 */

get_header();
?>

<main class="page-wrap inline-block w-100">
    <?php app_render_page_case_studies(); ?>

<?php
if (get_field('show_callout')) {
    app_render_fragment('global-callout');
}
?>

<?php get_template_part('template-parts/related-case-studies'); ?>
<?php get_template_part('template-parts/start-project'); ?>
<?php get_template_part('template-parts/get-started'); ?>

</main>