<?php extract($section); ?>

<div class="info py-60 px-130 md:py-20 md:px-20 bg-light-grey mb-40 md:mb-20">
            <span class="w-100 fs-26 tr text-center mb-30 block md:mb-20"><?php echo $title;?></span>
            <div class="w-100 flex justify-center">
                <a href="<?php echo $cta['url']; ?>" class="btn btn-secondary"><?php echo $cta['title']; ?></a>
            </div>
        </div>