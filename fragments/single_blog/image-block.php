<?php extract($section); ?>

<div class="info mb-40" name="section-<?php echo ($identifier) ? $identifier : '0'; ?>">
    <?php if($image): ?>
        <?php $cropOptions = [
        "fallbackimage-size" => [751,226],
        "fallbackimage-class" => "transition"
        ];?>
        <?php display_responsive_image($image['ID'],$cropOptions) ?>
    <?php endif; ?>
</div>