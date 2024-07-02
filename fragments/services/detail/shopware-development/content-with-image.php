<?php extract($section); ?>
<?php if($content || $image): ?>
<section class="certified">
                <div class="container">
                    <div class="flex align-center gap-80 md:gap-40 md:wrap">
                        <div class="col w-55 md:w-100">
                            <div class="headline">
                                <?php if($content['title']): ?>
                                <div class="title">
                                     <h2 class="h2"><?php echo $content['title']; ?></h2>

                                </div>
                                <?php endif; ?>
                                <?php if($content['description']): ?>
                                <div class="content">
                                    <p class="mt-30"><?php echo $content['description']; ?></p>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if($image): ?>
                        <div class="col w-45 md:w-100">
                            <?php $cropOptions = [
                                "fallbackimage-size" => [648,445],
                                "fallbackimage-class" => "transition"
                            ];?>
                            <?php display_responsive_image($image['ID'],$cropOptions) ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
<?php endif; ?>