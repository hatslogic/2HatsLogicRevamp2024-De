<?php extract($section); ?>

<section class="lets-get-started bg-dark-primary c-white pt-100 pb-100 xs:pt-80 xs:pb-80 relative">
    <?php if($image): ?>
        <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>" height="100" width="100" fetchpriority="high" class="absolute z-0 inset-0 ml-auto my-auto mr-0 w-auto max-h-90 max-w-90 xs:hidden">
    <?php endif; ?>
    <div class="container">
        <div class="title text-center">
            <div class="max-w-60 xs:max-w-100 mx-auto">
                <?php if($headline): ?>
                    <h2 class="mb-10"><?php echo $headline; ?></h2>
                <?php endif; ?>
                <?php if($content): ?>
                    <p><?php echo $content; ?></p>
                <?php endif; ?>
                <?php if ($button): ?>
                    <div class="btn-group mt-40">
                        <a href="<?php echo $button['url']; ?>" class="btn btn-primary"><?php echo $button['title']; ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>