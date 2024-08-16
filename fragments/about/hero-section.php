<?php extract($section); ?>
<section class="hero pt-60">
    <div class="container">
        <div class="flex align-center justify-between md:wrap">
            <div class="col w-50 md:w-100 md:mt-40 md:order-2">
                <div class="headline">
                    <?php if ($headline['title']) { ?>
                        <h1 class="h3"><?php echo $headline['subtitle']; ?></h1>
                        <h2 class="h1-sml"><?php echo $headline['title']; ?></h2>
                        <p class="mt-30"><?php echo $content; ?></p>
                    <?php } ?>
                    <?php if ($button) { ?>
                        <div class="btn-group mt-40">
                            <a href="<?php echo $button['url']; ?>" class="btn btn-primary"><?php echo $button['title']; ?></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php if ($image) { ?>
                <div class="col w-40 md:w-100 md:order-1">
                <?php
                    $cropOptions = [
                        '(max-width: 768px)' => [335, 232],
                        '(min-width: 769px)' => [615, 420],
                    ];
                $attributes = ['class' => 'transition', 'loading' => 'eager', 'fetchPriority' => 'high', 'picturetag_class' => 'loader'];
                ?>
                    <?php echo hatslogic_get_attachment_picture($image['ID'], $cropOptions, $attributes); ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>