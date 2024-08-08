<?php extract($section); ?>

<div class="info mb-40" name="section-<?php echo ($identifier) ? $identifier : '0'; ?>">
    <?php if ($image) { ?>
        
        <?php
        $mobile_aspectratio = [390, 120];
        $cropOptions = [
            '(max-width: 768px)' => $mobile_aspectratio,
            '(min-width: 769px)' => [770, 230],
        ];

        $attributes = ['class' => 'transition', 'loading' => 'lazy'];
        ?>
    <?php echo hatslogic_get_attachment_picture($image['ID'], $cropOptions, $attributes); ?>
    <?php } ?>
</div>