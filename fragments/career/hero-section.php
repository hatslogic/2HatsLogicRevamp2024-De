<?php extract($section); ?>
<section class="hero pt-60">
    <div class="container">
        <div class="flex align-center justify-between md:wrap">
            <div class="col w-50 md:w-100">
                <div class="about-header">
                    <?php if($title) :?>
                    <h1 class="h1-sml"><?php echo $title ?></h1>
                    <?php endif;?>   
                    <?php if($content): ?> 
                    <p class="mt-30"><?php echo $content ?></p>
                    <?php endif; ?>
                    <?php if ($button): ?>
                        <div class="btn-group mt-40">
                            <a href="<?php echo $button['url']; ?>" class="btn btn-primary"><?php echo $button['title']; ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php if ($image): ?>
            <div class="col w-40 md:w-100 md:mt-40">
                <?php $cropOptions = [
                        "fallbackimage-size" => [648,445],
                        'fallbackimage-class'=> 'transition'
                    ];?>
                    <?php display_responsive_image($image['ID'],$cropOptions) ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>