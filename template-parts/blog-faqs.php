<?php
$enable_faq = get_field('enable_faq');
$faq_title = get_field('faq_title');
?>
<?php if ($enable_faq): ?>
<section class="blogs_faq">
    <?php if($faq_title): ?>
        <div class="title">
            <h3><?php $faq_title; ?></h3>
        </div>
    <?php endif; ?>

    <?php if (have_rows('faq_group')): ?>
    <div class="content mt-20 gap-40 xs:mt-10">
        <div class="acc">
            <?php while (have_rows('faq_group')): the_row(); ?>
            <div class="acc-item py-20 b-0 bb-1 bc-hash solid">
                <div class="acc-toggle flex justify-between relative">
                    <h4 class="max-w-80"><?php the_sub_field('faq_question');?></h4 class="max-w-80">
                    <div class="wrap-icon absolute right-0 flex fs-30 xs:fs-20">
                        <div class="icomoon icon-expand_circle_down add"></div>
                        <div class="icomoon icon-expand_circle_up minus"></div>
                    </div>
                </div>
                <div class="acc-content">
                    <div class="inner w-100">
                        <p><?php the_sub_field('faq_answer');?></p>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
    <?php endif; ?>
</section>
<?php endif; ?>
