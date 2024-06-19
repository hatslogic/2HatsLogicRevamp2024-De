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
           
            <?php $cropOptions = [
                    "fallbackimage-size" => [1920,893],
                    "fallbackimage-class" => "h-auto w-100 transition"
                ];
                if($mobile_image){

                    $cropOptions["mobile-settings"] = [
                        "image" => $mobile_image['ID']
                    ];
                }
            ?>
            <?php display_responsive_image($image['ID'],$cropOptions) ?>
        <?php endif; ?>
    </div>
</section>