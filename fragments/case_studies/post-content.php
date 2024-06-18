<?php extract($section); ?>

<section class="case-study-info pt-100 xs:pt-80 pb-100 xs:pb-80">
    <div class="container">
        <?php if ($image): ?>
        <?php $cropOptions = [
            "fallbackimage-size" => [731,466],
            'fallbackimage-class'=> 'h-auto w-100'
        ];?>
        <?php display_responsive_image($image['ID'],$cropOptions) ?>
        <?php endif; ?>
        <div class="title <?php if ($image): ?>mt-60<?php endif; ?>">
            <?php if ($client_location): ?>
                <div class="font-bold capitalize mb-15">Client location&colon; <span class="c-primary"><?php echo $client_location; ?></span></div>
            <?php endif; ?>
            <?php if ($title): ?>
                <h2><?php echo $title; ?></h2>
            <?php endif; ?>
        </div>
        <?php if ($content): ?>
            <div class="content <?php if ($client_location || $title): ?>mt-40 xs:mt-30<?php endif; ?>">
                <p><?php echo $content; ?></p>
            </div>
        <?php endif; ?>
    </div>
</section>