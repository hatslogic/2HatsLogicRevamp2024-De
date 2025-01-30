<?php $cta_block = get_field('cta_block'); ?>

<section class="get-start relative overflow-hidden">
    <div class="get-start-bg absolute w-100 h-100">
        <?php if($cta_block['background_image']): ?>
            <?php $cropOptions = [
                '(max-width: 768px)' => [1920, 461],
                '(min-width: 769px)' => [1920, 461],
            ];
            $attributes = ['class' => 'transition', 'loading' => 'eager', 'fetchPriority' => 'high', 'picturetag_class' => 'loader'];
            ?>
            <?php echo hatslogic_get_attachment_picture($cta_block['background_image']['ID'], $cropOptions, $attributes); ?>
        <?php endif; ?>
    </div>
    <div class="container z-1 relative">
        <div class="flex wrap justify-between align-center mt-120 mb-120 xs:mt-80 xs:mb-80">
            <div class="title c-white md:mb-30">
                <h3 class="h1-sml"><?php echo $cta_block['headline']; ?></h3>
                <p><?php echo $cta_block['sub_headline']; ?></p>
            </div>
            <?php if($cta_block['button']): ?>
                <div class="btn-group">
                    <button type="submit" aria-label="submit" class="btn btn-light"><?php echo $cta_block['button']['title'] ?></button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>