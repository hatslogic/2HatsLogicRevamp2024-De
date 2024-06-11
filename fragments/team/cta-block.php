<?php extract($section); ?>

<section class="online-partner bg-light-grey c-secondary pt-100 pb-100 xs:pt-80 xs:pb-80 relative">
    <img src="<?php echo $background_image['url']; ?>" alt="help" height="100" width="100" class="absolute z-0 inset-0 ml-auto my-auto mr-0 w-auto max-h-90 max-w-90 xs:hidden">
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
                        <a href="<?= $button['url'] ?>" class="btn btn-secondary"><?= $button['title'] ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>