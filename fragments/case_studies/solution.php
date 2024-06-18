<?php extract($section); ?>
<section class="the-problem pb-100 md:pb-60">
    <div class="container">
        <?php if($headline['title']): ?>
        <div class="title"> <span class="headline c-primary font-bold"><?php echo $headline['sub_title'] ?></span>
           <h2><?php echo $headline['title'] ?></h2>
        </div>
        <?php endif; ?>
        <div class="content">
            <p><?php echo $content; ?></p>
            <?php if($image): ?>
            <div class="banner-wrap mt-40">
                
                <?php $cropOptions = [
                        "fallbackimage-size" => [731,466],
                        "fallbackimage-class" => 'h-auto w-100'
                    ];?>
                    <?php display_responsive_image($image['ID'],$cropOptions) ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>