<?php extract($section); ?>
<section class="the-problem pb-100 md:pb-60">
    <div class="container">
        <div class="title"> <span class="headline c-primary font-bold"><?php echo $headline['sub_title'] ?></span>

            <h2><?php echo $headline['title'] ?></h2>

        </div>
        <div class="content">
            <p><?php echo $content; ?></p>
            <div class="banner-wrap mt-40">
                <picture>
                <source srcset="<?php echo webp($image['sizes']['img_1140x348']); ?>" type="image/webp">
                        <source srcset="<?php echo $image['sizes']['img_1140x348']; ?>" type="image/jpg">
                    <img src="<?php echo $image['sizes']['img_1140x348']; ?>" alt="<?php  the_title_attribute(); ?>" width="731px" height="466px"
                        class="h-auto w-100">
                </picture>
            </div>
        </div>
    </div>
</section>