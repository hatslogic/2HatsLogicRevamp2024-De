<?php extract($section); ?>
<?php $bg_class = $bg_enabled ? 'bg-light-grey pt-100 pb-100 xs:pt-80 xs:pb-80' : 'bg-white'; ?>
<?php if ($content || $image) { ?>
        <section class="certified <?php echo $bg_class; ?>"> <div class="container">
            <div class="flex align-center gap-80 md:gap-40 md:wrap">
                <div class="col w-55 md:w-100 md:order-2">
                    <div
                        class="headline">
                        <?php if ($content['title']) { ?>
                            <div class="title">
                                <h2 class="h2"><?php echo $content['title']; ?></h2>

                            </div>
                        <?php } ?>
                        <?php if ($content['description']) { ?>
                            <div class="content">
                                <p class="mt-30"><?php echo $content['description']; ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <?php if ($image) { ?>
                    <div class="col w-45 md:w-100 md:order-1">
                    <?php $cropOptions = [
                        '(max-width: 768px)' => [390, 335],
                        '(min-width: 769px)' => [486, 417],
                    ];
                    $attributes = ['class' => 'transition', 'loading' => 'lazy', 'picturetag_class' => 'loader'];
                    ?>
             <?php echo hatslogic_get_attachment_picture($image['ID'], $cropOptions, $attributes); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>
