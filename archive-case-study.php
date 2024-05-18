<?php
/* Template Name: Case Study Archive */

get_header();
?>
<?php
$title = get_field('case_studies_page_title', 'option');
$desc = get_field('case_studies_page_description', 'option');
?>
<main class="page-wrap inline-block w-100">
    <?php get_template_part( 'template-parts/content', get_post_type() ); ?>
    <?php get_template_part('template-parts/start-project'); ?>
    <?php get_template_part('template-parts/get-started'); ?>
</main>
<?php get_footer(); ?>