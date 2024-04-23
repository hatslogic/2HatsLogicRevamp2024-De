<?php extract($section); ?>

<section class="about pt-100 pb-100 xs:pt-80 xs:pb-80">
    <div class="container">
        <div class="content flex sm:wrap align-center">
            <?php if($image): ?>
            <div class="col w-100">
                <picture>
                    <source srcset="<?php echo webp($image['sizes']['img_494x328']); ?>" type="image/webp">
                    <source srcset="<?php echo $image['sizes']['img_494x328']; ?>" type="<?php echo $image['mime_type']; ?>">
                    <img src="<?php echo $image['sizes']['img_494x328']; ?>" loading="lazy" alt="<?php echo $image['alt']; ?>" width="<?php echo $image['sizes']['img_494x328-width']; ?>" height="<?php echo $image['sizes']['img_494x328-height']; ?>" class="h-auto w-100">
                </picture>
            </div>
            <?php endif; ?>
            <div class="col w-100 ml-120 xxl:ml-80 xl:ml-60 sm:ml-0 sm:mt-40">
                <?php if($headline): ?>
                <div class="title">
                    <span class="headline c-primary font-bold"><?php echo $headline['sub_title']; ?></span>
                    <h2><?php echo $headline['title']; ?></h2>
                </div>
                <?php endif; ?>
                <div class="content">
                    <?php echo apply_filters('the_content', $content); ?>
                    <?php if($link): ?>
                        <a href="<?php echo $link['url']; ?>" target="<?php echo ($link['target'])? $link['target'] : '_self'; ?>" aria-label="<?php echo $link['title']; ?>" class="btn btn-secondary-outline"><?php echo $link['title']; ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>