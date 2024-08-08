<?php extract($section); ?>

<section class="online-partner bg-dark-primary c-white pt-100 pb-100 xs:pt-80 xs:pb-80 relative">
    <?php if($background_image['url']): ?>
        <img src="<?php echo $background_image['url']; ?>" alt="<?php echo $background_image['alt']; ?>" height="<?php echo $background_image['height']; ?>" width="<?php echo $background_image['width']; ?>" class="absolute z-0 inset-0 ml-auto my-auto mr-0 w-auto max-h-90 max-w-90 xs:hidden">
    <?php else: ?>
        <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/background/help.svg" alt="help" height="100" width="100" class="absolute z-0 inset-0 ml-auto my-auto mr-0 w-auto max-h-90 max-w-90 xs:hidden">
    <?php endif; ?>
    <div class="container">
        <div class="title text-center">
            <div class="max-w-60 xs:max-w-100 mx-auto">
                <?php if($title): ?>
                    <h2><?= $title ?></h2>
                <?php endif; ?>
                <?php if($content): ?>
                    <p><?= $content ?></p>
                <?php endif; ?>
                <?php if($button): ?>
                    <div class="btn-group mt-40"> 
                        <a href="<?= $button['url'] ?>" class="btn btn-primary"><?= $button['title'] ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>