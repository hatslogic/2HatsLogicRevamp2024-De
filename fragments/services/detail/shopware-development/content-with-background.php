<?php extract($section); ?>

<section class="online-store">
    <div class="container relative">
        <div class="flex align-center gap-80 md:gap-40 md:wrap">
            <div class="col w-55 md:w-100 relative z-1 md:order-2">
                <div class="about-header">
                    <?php if ($title): ?>
                    <div class="title">
                        <h2 class="h2"><?php echo $title; ?></h2>

                    </div>
                    <?php endif; ?>
                    <?php if ($repeated_content || $button['url']): ?>
                    <div class="content">
                        <?php if ($repeated_content): ?>
                            <?php foreach ($repeated_content as $content): ?>
                                <h3 class="h4 mt-40"><?php echo $content['title']; ?></h3>

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
            <?php if ($background_image): ?>
                <div class="col w-45 md:w-100 md:hidden"></div>
                <div class="background-col absolute right-0 -right-50 md:-right-0 w-75 md:w-100 md:relative md:order-1">
                    <picture>
                        <source srcset="<?php echo webp($background_image['url']); ?>" type="image/webp">
                        <source srcset="<?php echo $background_image['url']; ?>" type="image/jpg">
                        <img src="<?php echo $background_image['url']; ?>" class="w-100" loading="lazy" alt="shops"
                            width="648px" height="445px" class="transition">
                    </picture>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>