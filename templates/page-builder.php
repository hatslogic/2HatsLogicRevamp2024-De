<?php
/**
 * Template Name: Page Builder
 */
get_header();
?>

<main class="page-wrap inline-block w-100">
    <?php app_render_page_sections(); ?>
</main>

<?php
if ( get_field( 'show_callout' ) ) {
    app_render_fragment( 'global-callout' );
}

 get_template_part('template-parts/get-started'); 
get_template_part( 'template-parts/free-consultation');

get_footer();
