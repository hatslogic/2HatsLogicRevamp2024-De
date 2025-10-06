<?php
/**
 * The template for displaying products detail page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package 2HatsLogic
 */

get_header();
?>
<main class="page-wrap inline-block w-100 relative z-0 relative transition">

    <?php get_template_part('template-parts/store-breadcrumb'); ?>

    <div class="container">
        <div class="flex align-start justify-between md:wrap gap-40">
            <?php get_template_part('template-parts/store-detail-left-column'); ?>
            <?php get_template_part('template-parts/store-detail-right-column'); ?>
        </div>
    </div>

    <?php get_template_part('template-parts/store-detail-description-tab'); ?>
    <?php get_template_part('template-parts/store-detail-recommended-for-you'); ?>
    <?php get_template_part( 'template-parts/store-cta-block' );?>

</main>

<?php get_template_part( 'template-parts/store-modal-make-an-enquiry' );?>
<?php get_template_part( 'template-parts/store-modal-book-a-demo' );?>



<?php
get_footer();