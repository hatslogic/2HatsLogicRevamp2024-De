<?php 
$get_quote_form = get_field('get_quote_contact_form'); 
 $partnership_form = get_field('get_parrnership_form'); 
$contact_form_image_1 = get_field('contact_form_image_1');
$contact_form_image_2 = get_field('contact_form_image_2');
$form_1_title = get_field('form_1_title');
$form_2_title = get_field('form_2_title');
$form_1_description = get_field('form_1_description');
$form_2_description = get_field('form_2_description');
?>
<?php if($get_quote_form || $partnership_form): ?>
<section class="hero pt-60">
    <div class="container">
        <div class="contact-wrap transition show" id="get-a-quote">
            <div class="flex align-start justify-between md:wrap">
                <div class="col w-50 mr-50 xl:mr-30 md:mr-0 md:w-100 md:mt-0">
                    
                    <?php $cropOptions = [
                                    "fallbackimage-size" => [606,749],
                                    "fallbackimage-class" => "transition"
                                    ];?>
                    <?php display_responsive_image($contact_form_image_1["ID"],$cropOptions) ?>
                </div>
                <div class="col w-50 ml-50 xl:ml-30 md:ml-0 md:mt-40 md:w-100">
                    <div class="form-wrap">
                        <div class="title">
                            <h2> <?php echo $form_1_title; ?></h2>

                            <p class="opacity-70"><?php echo $form_1_description; ?></p>
                        </div>
                        <div class="content">
                            <div class="switch-form-actions mt-40 xl:mt-30">
                                <button data-target="get-a-quote"
                                    class="fs-18 bg-transparent px-0 active c-secondary opacity-100 font-bold b-0 bb-2 py-10 bc-secondary c-secondary solid">Get
                                    a Quote</button>
                                <button data-target="partnership"
                                    class="fs-18 bg-transparent px-0 c-secondary opacity-50 b-0 bb-2 font-bold py-10 bc-transparent solid ml-40 xl:ml-20">Partnership</button>
                            </div>
                            <?php
                            if ($get_quote_form): ?>
                                <?php echo do_shortcode('[contact-form-7 id="' . $get_quote_form->ID . '"]'); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-wrap transition" id="partnership">
            <div class="flex align-start justify-between md:wrap" id="partnership">
                <div class="col w-50 mr-50 xl:mr-30 md:mr-0 md:w-100 md:mt-40">
                    <?php $cropOptions = [
                        "fallbackimage-size" => [648,445],
                        "fallbackimage-class" => "transition"
                        ];?>
                    <?php display_responsive_image($contact_form_image_2["ID"],$cropOptions) ?>
                </div>
                <div class="col w-50 ml-50 xl:ml-30 md:ml-0 md:mt-40 md:w-100">
                    <div class="form-wrap">
                        <div class="title">
                            <h2><?php echo $form_2_title; ?></h2>

                            <p class="opacity-70"><?php echo $form_2_description; ?></p>
                        </div>
                        <div class="content">
                            <div class="switch-form-actions mt-40 xl:mt-30">
                                <button data-target="get-a-quote"
                                    class="fs-18 bg-transparent px-0 c-secondary opacity-50 b-0 bb-2 font-bold py-10 bc-transparent solid">Get
                                    a Quote</button>
                                <button data-target="partnership"
                                    class="fs-18 bg-transparent px-0 active c-secondary opacity-100 font-bold b-0 bb-2 py-10 bc-secondary c-secondary solid ml-40 xl:ml-20">Partnership</button>
                            </div>
                            <?php if($partnership_form): ?>
                                <?php echo do_shortcode('[contact-form-7 id="' . $partnership_form->ID . '"]'); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>