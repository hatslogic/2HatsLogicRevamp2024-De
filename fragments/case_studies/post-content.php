<?php extract($section); ?>

<section class="case-study-info pt-100 xs:pt-80 pb-100 xs:pb-80">
    <div class="container">
        <?php if ($image) { ?>
        
        <?php $cropOptions = [
            '(max-width: 768px)' => [390, 118],
            '(min-width: 769px)' => [1152, 344],
        ];
            $attributes = ['class' => 'h-auto w-100', 'loading' => 'eager'];
            ?>
             <?php echo hatslogic_get_attachment_picture($image['ID'], $cropOptions, $attributes); ?>
        <?php } ?>
        <div class="title <?php if ($image) { ?>mt-60<?php } ?>">
            <?php if ($client_location) { ?>
                <div class="font-bold capitalize mb-15">Client location&colon; <span class="c-primary"><?php echo $client_location; ?></span></div>
            <?php } ?>
            <?php if ($title) { ?>
                <h2><?php echo $title; ?></h2>
            <?php } ?>
        </div>
        <?php if ($content) { ?>
            <div class="content <?php if ($client_location || $title) { ?>mt-40 xs:mt-30<?php } ?>">
                <p><?php echo $content; ?></p>
            </div>
        <?php } ?>
    </div>
</section>