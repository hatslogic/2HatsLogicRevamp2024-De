<?php extract($section); ?>
<section class="error-404 overflow-hidden b-0 bb-1 solid bc-hash not-found relative pt-100 xs:pt-60 pb-100 md:pb-60">
    <div class="container relative z-1">
        <div class="row">
            <div class="content-404 p-20 text-center w-100">    
            <?php if ($title) { ?>
                <div class="title">
                    <h1 class="mb-40 mx-auto fs-100 c-primary"><?php echo $title; ?><span class="c-primary-hover"> !</span></h1>

                </div>
            <?php } ?>
            <?php if ($content) { ?>
                <div class="content max-w-58 m-auto">
                    <p class="mt-10"><?php echo $content; ?></p>
                </div>
            <?php } ?>
            <?php if ($button) { ?>
                <div class="btn-group mt-60"> <a class="btn btn-primary" href="<?php echo $button['url']; ?>"><?php echo $button['title']; ?></a>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
    <div class="bg-shape absolute z-0 right-0 top-0 w-60 h-px-500 md:w-80">
        <picture class="shape w-100 absolute -top-10">
            <source srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg.webp, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg2x.webp 2x"
                media="(min-width: 768px)" type="image/webp">
            <source srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg-mobile.webp, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg-mobile.webp 2x"
                media="(max-width: 767px)" type="image/webp">
            <source srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg.jpg, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg2x.jpg 2x"
                media="(min-width: 768px)" type="image/jpg">
            <source srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg-mobile.jpg, <?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg-mobile.jpg 2x"
                media="(max-width: 767px)" type="image/jpg">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/shapes/blog-bg.jpg" alt="404" width="100" height="100">
        </picture>
    </div>
</section>