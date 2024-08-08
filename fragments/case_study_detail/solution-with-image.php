<?php extract($section); ?>
<section class="case-study-solution relative overflow-hidden bg-light-grey pt-100 xs:pt-80">
<?php if (!empty($title) || !empty($content)) {?>
    <div class="container">
        <div class="max-w-75 xs:max-w-100 mx-auto px-60 xs:px-0">
            
            <div class="title"> 
                <?php if (!empty($headline)) { ?>
                <span class="headline c-primary font-bold"><?php echo $headline; ?></span>
                <?php } ?>   
                <?php if (!empty($title)) { ?>    
                <h2><?php echo $title; ?></h2>
                <?php } ?>    
            </div>
            
            <?php if (!empty($content)) { ?>
            <div class="content">
                <p><?php echo nl2br($content); ?></p>
            </div>
            <?php } ?>
        </div>
    </div>
<?php } ?> 
<?php if (!empty($images['image_then']) || !empty($images['image_now'])) {?>  
    <div class="flip-wrap mt-80 xs:mt-40">
        <div class="wrap-inner relative max-w-85 xs:max-w-100 xs:px-20 mx-auto max-h-px-1000 xs:max-h-px-300">
            <div class="flex gap-60 xs:gap-20 w-100 max-w-100 align-start">
                <?php if (!empty($images['image_then']['desktop'])) { ?>
                <div class="flip-item then transition"> 
                    <h3 class="h3 w-100 text-center"> <?php echo $images['image_then']['title'] ? $images['image_then']['title'] : 'Then'; ?> </h3>
                    <a href="<?php echo $images['image_then']['link'] ? $images['image_then']['link'] : '#'; ?>"
                        class="flip-item-trigger block mt-20 xs:mt-10 frame-shadow overflow-hidden b-2 solid bc-transparent">
                    <?php
                    $mobile_aspectratio = [211, 373];
                    if (!empty($images['image_then']['mobile'])) {
                        $mobile_aspectratio = [211, 373, $images['image_then']['mobile']];
                    }
                    $cropOptions = [
                        '(max-width: 768px)' => $mobile_aspectratio,
                        '(min-width: 769px)' => [676, 1195],
                    ];

                    $attributes = ['class' => 'h-auto w-100', 'loading' => 'lazy'];
                    ?>
                    <?php echo hatslogic_get_attachment_picture($images['image_then']['desktop'], $cropOptions, $attributes); ?>
                    </a>

                </div>
                <?php } ?>
                <?php if (!empty($images['image_now']['desktop'])) { ?>
                <div class="flip-item now transition active">
                    <h3 class="h3 w-100 text-center"><?php echo $images['image_now']['title'] ? $images['image_now']['title'] : 'Now'; ?></h3>
                    <a href="<?php echo $images['image_now']['link'] ? $images['image_now']['link'] : '#'; ?>"
                        class="flip-item-trigger block mt-20 xs:mt-10 frame-shadow overflow-hidden b-2 solid bc-transparent">
                        <?php
                        $mobile_aspectratio = [211, 373];
                    if (!empty($images['image_now']['mobile'])) {
                        $mobile_aspectratio = [211, 373, $images['image_now']['mobile']];
                    }
                    $cropOptions = [
                        '(max-width: 768px)' => $mobile_aspectratio,
                        '(min-width: 769px)' => [676, 1195],
                    ];

                    $attributes = ['class' => 'h-auto w-100', 'loading' => 'lazy'];
                    ?>
                        <?php echo hatslogic_get_attachment_picture($images['image_now']['desktop'], $cropOptions, $attributes); ?>
                    </a>

                </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>      
    <div class="gradient-end-black h-px-300 w-100 block absolute bottom-0"></div>
</section>