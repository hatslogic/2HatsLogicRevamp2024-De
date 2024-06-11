<?php extract($section); ?>
<section class="hero relative">
    <div class="hero-content absolute z-1 h-100 w-100 top-0 bottom-0">
        <div class="container h-100 flex align-center">
            <div class="title c-white">
                <?php if ($headline): ?>
                    <?php if($headline['subtitle']): ?>
                        <h1 class="h1-sml"><?php echo $headline['subtitle']; ?></h1>
                    <?php endif; ?>
                    <?php if($headline['title']): ?>
                        <h2 class="h3"><?php echo $headline['title']; ?></h2>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if ($content): ?>
                    <p><?php echo $content ?></p>
                <?php endif; ?>
                <?php if ($button): ?>
                    <div class="btn-group mt-40">
                        <a href="<?php echo $button['url']; ?>" class="btn btn-light"><?php echo $button['title']; ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="hero-bg">
        <?php if ($image || $mobile_image): ?>
            <picture>
                <source srcset="<?php echo webp($mobile_image['sizes']['img_649x734']); ?>" media="(max-width: 768px)" type="image/webp">
                <source srcset="<?php echo $mobile_image['sizes']['img_649x734']; ?>" media="(max-width: 768px)" type="<?php echo $mobile_image['mime_type']; ?>">
                <source srcset="<?php echo webp($image['sizes']['img_1920x893']); ?>" type="image/webp">
                <source srcset="<?php echo $image['sizes']['img_1920x893']; ?>" type="<?php echo $image['mime_type']; ?>">
                <img src="<?php echo $image['sizes']['img_1920x893']; ?>" alt="<?php echo $image['alt']; ?>" width="1920px" height="893px" class="h-auto w-100 transition">
            </picture>
        <?php endif; ?>
    </div>
</section>