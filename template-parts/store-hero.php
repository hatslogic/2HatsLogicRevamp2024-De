<?php

$hero_image = get_field('hero_image');
$headline = get_field('headline');
$sub_headline = get_field('sub_headline');
?>
<section class="hero relative overflow-hidden">
    <div class="hero-bg absolute z-0 w-100 h-100">
        <?php if($hero_image): ?>
            <?php $cropOptions = [
                '(max-width: 768px)' => [1920, 461],
                '(min-width: 769px)' => [1920, 461],
            ];
            $attributes = ['class' => 'transition cover w-100 h-100', 'loading' => 'eager', 'fetchPriority' => 'high', 'picturetag_class' => 'loader h-100 cover'];
            ?>
            <?php echo hatslogic_get_attachment_picture($hero_image['ID'], $cropOptions, $attributes); ?>
        <?php endif; ?>
    </div>
    <div class="container relative z-1">
        <div class="title w-60 md:w-100 c-white mt-130 mb-130 xs:mt-80 xs:mb-80">
            <h1 class="h1-sml"><?php echo $headline; ?></h1>
            <p><?php echo $sub_headline; ?></p>
        </div>
    </div>
</section>