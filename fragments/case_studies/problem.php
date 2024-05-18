<?php extract($section); ?>

<section class="the-problem pb-100 md:pb-60">
    <div class="container">
        <div class="title"> <span class="headline c-primary font-bold"><?php echo $headline['sub_title']; ?></span>

            <h2><?php echo $headline['title']; ?></h2>

        </div>
        <div class="content">
            <p><?php echo $content; ?></p>
            <div class="grid grid-2 gap-20 mt-60 xs:flex xs:wrap">
                <div class="col">
                    <picture>
                        <source srcset="<?php echo webp($images['image_1']['sizes']['img_580x540']); ?>" type="image/webp">
                        <source srcset="<?php echo $images['image_1']['sizes']['img_580x540']; ?>" type="image/jpg">
                        <img src="<?php echo webp($images['image_1']['sizes']['img_580x540']); ?>" loading="lazy" alt="about" width="360px"
                            height="280px">
                    </picture>
                </div>
                <div class="col">
                    <picture>
                        <source srcset="<?php echo webp($images['image_2']['sizes']['img_580x540']); ?>" type="image_2/webp">
                        <source srcset="<?php echo webp($images['image_2']['sizes']['img_580x540']); ?>" type="image/jpg">
                        <img src="<?php echo webp($images['image_2']['sizes']['img_580x540']); ?>" loading="lazy" alt="about" width="360px"
                            height="280px">
                    </picture>
                </div>
            </div>
        </div>
    </div>
</section>