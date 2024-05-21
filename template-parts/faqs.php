<!-- <?php
if (get_field('enable_faq')): ?>
    <section class="faqs pt-100 pb-100 xs:pt-80 xs:pb-80 @@bg">
        <div class="container">
            <div class="title">
                <h2><?php the_field('faq_title'); ?></h2>
            </div>
            <?php if (have_rows('faq_group')): ?>
                <div class="content mt-60 xs:mt-30">
                    <div class="acc">
                        <?php
                        while (have_rows('faq_group')):
                            the_row(); ?>
                            <div class="acc-item py-20 b-0 bb-1 bc-hash solid">
                                <div class="acc-toggle flex justify-between relative">
                                    <h3 class="max-w-80 h4"><?php the_sub_field('faq_question');?></h3>
                                    <div class="wrap-icon absolute right-0 flex fs-30 xs:fs-20">
                                        <div class="icomoon icon-expand_circle_down add"></div>
                                        <div class="icomoon icon-expand_circle_up minus"></div>
                                    </div>
                                </div>
                                <div class="acc-content">
                                    <div class="inner w-60 xl:w-100">
                                        <p> <?php the_sub_field('faq_answer');?> </p>
                                    </div>
                                </div>
                            </div>

                        <?php endwhile; ?>
                    </div>
            </div>

            <?php
            endif; ?>
        </div>
    </section>
<?php endif; ?> -->