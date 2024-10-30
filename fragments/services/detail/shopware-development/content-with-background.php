<?php extract($section); ?>
<?php $bg_class = $bg_enabled ? 'bg-light-grey pt-100 pb-100 xs:pt-80 xs:pb-80' : 'bg-white'; ?>
<section class="online-store <?php echo $bg_class;?>">
    <div class="container relative">
        <?php if ($title): ?>
            <div class="title relative z-1 w-70 md:w-100">
                <h2 class="h2"><?php echo $title; ?></h2>
            </div>
        <?php endif; ?>
        <div class="flex align-center gap-80 md:gap-0 md:wrap">
            <div class="col w-55 md:w-100 relative z-1 md:order-2">
                <div class="headline">
                    <?php if ($repeated_content || $button['url']): ?>
                        <div class="content">
                            <?php if ($repeated_content): ?>
                                <?php foreach ($repeated_content as $content): ?>
                                    <h3 class="h6 mt-40"><?php echo $content['title']; ?></h3>

                                    <p><?php echo $content['content']; ?></p>

                                <?php endforeach; ?>
                            <?php endif; ?>
                            <?php if ($button): ?>
                                <div class="btn-group mt-30">
                                    <a href="<?php echo $button['url']; ?>"
                                        class="btn btn-primary"><?php echo $button['title']; ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php if ($background_image || $mobile_background_image): ?>
                <div class="col w-45 md:w-100 md:hidden"></div>
                <div class="background-col absolute z-0 right-0 -right-50 md:-right-0 w-75 md:w-100 md:mt-40 md:relative md:order-1">
                    <?php
                    $mobile_aspectratio = [320, 220];
                    if ($mobile_background_image) {
                        $mobile_aspectratio = [320, 220, $mobile_background_image['ID']];
                    }
                    $cropOptions = [
                        '(max-width: 768px)' => $mobile_aspectratio,
                        '(min-width: 769px)' => [1480, 824],
                    ];

                    $attributes = ['class' => 'transition', 'loading' => 'lazy'];
                    ?>
                    <?php echo hatslogic_get_attachment_picture($background_image['ID'], $cropOptions, $attributes); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>