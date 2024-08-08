<?php extract($section);?>

<div class="info py-60 px-60 md:py-20 md:px-20 bg-light-grey mt-60 mb-60 md:mt-40 md:mb-40" <?php if($identifier): ?> id="head<?php echo $identifier; ?>" <?php endif; ?>>
    <?php if($title): ?>
        <p class="mt-0">
            <b><?php echo $title; ?></b>
        </p>
    <?php endif; ?>
    <?php if($content): ?>
    <div class="w-100 block b-1 solid bc-dark-grey p-20">
        <p class="m-0">
            <?php echo $content; ?>
        </p>
    </div>
    <?php endif; ?>
</div>