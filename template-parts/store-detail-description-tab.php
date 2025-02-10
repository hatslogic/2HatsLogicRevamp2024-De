<?php 
$description_tab = get_field('description_tab'); 
$enable_faq = get_field('enable_faq');
$faq_title = get_field('faq_title');
$identifier = get_field('identifier');
?>
<section>
    <div class="container">
        <div class="w-100 mt-80">
            <div class="contact-wrap transition show" id="description-tab">
                <div class="switch-form-actions xl:mt-30 b-0 bb-1 border-grey-3 solid md:flex">
                    <button data-target="description-tab" class="w-20 md:w-50 fs-18 bg-transparent px-0  active c-secondary opacity-100 font-bold b-0 bb-2 py-10 bc-secondary c-secondary solid">Description</button>
                    <button data-target="faq-tab" class="w-20 md:w-50 fs-18 bg-transparent px-0 c-secondary opacity-50 b-0 bb-2 font-bold py-10 bc-transparent solid">FAQ</button>
                </div>
                <div class="col w-100 xl:ml-30 md:ml-0 mt-50 md:mt-40 md:w-100">
                    <div class="flex align-start justify-between md:wrap">
                        <?php if($description_tab['about_the_extension']): ?>
                            <div class="col w-60 md:w-100 md:order-2 md:mt-40">
                                <div class="form-wrap">
                                    <div>
                                        <h2 class="h3 mb-20">About the Extension</h2>
                                        <?php echo $description_tab['about_the_extension']; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if($description_tab['image']): ?>
                            <div class="col w-40 md:w-100 ml-50 xl:ml-30 md:ml-0 md:mr-0 md:w-100 md:order-1">                      
                                <?php $cropOptions = [
                                    '(max-width: 768px)' => [648, 445],
                                    '(min-width: 769px)' => [648, 445],
                                ];
                                $attributes = ['class' => 'transition', 'loading' => 'eager', 'fetchPriority' => 'high', 'picturetag_class' => 'loader'];
                                ?>
                                <?php echo hatslogic_get_attachment_picture($description_tab['image']['ID'], $cropOptions, $attributes); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <a href="#" aria-label="show-full-description" class="link link-primary underline mt-30 md:mt-20 block">Show full description</a>
                </div>
            </div>

             <div class="contact-wrap transition" id="faq-tab">
                <div class="switch-form-actions xl:mt-30 b-0 bb-1 border-grey-3 solid md:flex">
                    <button data-target="description-tab" class="w-20 md:w-50 fs-18 bg-transparent px-0 c-secondary opacity-50 b-0 bb-2 font-bold py-10 bc-transparent solid">Description</button>
                    <button data-target="faq-tab" class="w-20 md:w-50 fs-18 bg-transparent px-0 active c-secondary opacity-100 font-bold b-0 bb-2 py-10 bc-secondary c-secondary solid">FAQ</button>
                </div>
                <?php if ($enable_faq): ?>
                    <div class="col w-100 xl:ml-30 md:ml-0 mt-50 md:mt-40 md:w-100">
                        <div class="flex align-start justify-between md:wrap">
                            <div class="col md:order-2">
                                <div class="acc">
                                    <?php if (have_rows('faq_group')): ?>
                                        <?php while (have_rows('faq_group')): the_row(); ?>
                                            <div class="acc-item py-20 b-0 bb-1 bc-hash solid">
                                                <div class="acc-toggle flex justify-between relative">
                                                    <h3 class="max-w-80 h4"><?php the_sub_field('faq_question');?></h3>
                                                    <div class="wrap-icon absolute right-0 flex fs-30 xs:fs-20">
                                                        <div class="icomoon icon-expand_circle_down add"></div>
                                                        <div class="icomoon icon-expand_circle_up minus"></div>
                                                    </div>
                                                </div>
                                                <div class="acc-content max-h-auto">
                                                    <div class="inner w-60 xl:w-100">
                                                        <p><?php the_sub_field('faq_answer');?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>