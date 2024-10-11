<?php extract($section); ?>
<?php if ($get_quote_contact_form ) { ?>
<section class="hero pt-60">
    <div class="container">
        <div class="contact-wrap transition show" id="get-a-quote">
            <div class="flex align-start justify-between md:wrap">
                <div class="col w-50 mr-50 xl:mr-30 md:mr-0 md:w-100 md:mt-0">
                   
                    <?php $cropOptions = [
                        '(max-width: 768px)' => [390, 480],
                        '(min-width: 769px)' => [531, 654],
                    ];
    $attributes = ['class' => 'transition', 'loading' => 'eager', 'fetchPriority' => 'high'];
    ?>
             <?php echo hatslogic_get_attachment_picture($contact_form_image_1['ID'], $cropOptions, $attributes); ?>
                </div>
                <div class="col w-50 ml-50 xl:ml-30 md:ml-0 md:mt-40 md:w-100">
                    <div class="form-wrap">
                        <div class="title">
                            <h1 class="h2"> <?php echo $form_1_title; ?></h1>
                            <p class="opacity-70"><?php echo $form_1_description; ?></p>
                        </div>
                        <div class="content">
                            
                            <?php
            if ($get_quote_contact_form) { ?>
                                <?php echo do_shortcode('[contact-form-7 id="'.$get_quote_contact_form->ID.'"]'); ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>