<?php extract($section); ?>
<section class="case-study-intro overflow-hidden relative">
    <div class="container">
        <div class="max-w-75 xs:max-w-100 mx-auto px-60 xs:px-0">
            <?php if (!empty($title)) { ?>
            <div class="title">
                <h2><?php echo $title; ?></h2>
                <?php if (!empty($location)) { ?>    
                <div class="location c-primary mt-20">Client Location: <?php echo $location; ?></div>
                <?php } ?>
            </div>
            <?php } ?>
            <?php if (!empty($content)) { ?>
            <div class="content">
                <p><?php echo $content; ?></p>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="image-wrap mt-60">
        <div class="wrap-inner relative max-w-80 xs:max-w-100 h-px-0 mx-auto rp-b-38 xs:rp-b-48">
            <?php if ($enable_image_frame) { ?>
            <div class="frame-wrap w-100 absolute z-1">
                <?php if (!empty($frame_image['desktop'])) { ?>
                    <?php
                    $mobile_aspectratio = [430, 251];
                    if (!empty($frame_image['mobile'])) {
                        $mobile_aspectratio = [430, 251, $frame_image['mobile']['ID']];
                    }
                    $cropOptions = [
                        '(max-width: 768px)' => $mobile_aspectratio,
                        '(min-width: 769px)' => [1152, 673],
                    ];

                    $attributes = ['class' => 'h-auto w-100', 'loading' => 'lazy', 'picturetag_class' => 'loader'];
                    ?>
                <?php echo hatslogic_get_attachment_picture($frame_image['desktop']['ID'], $cropOptions, $attributes); ?>
             <?php } ?>   
            </div>
            <?php } ?>           
            <?php if (!empty($image)) { ?>
                <div class="screen-wrap flex w-72 mx-auto relative z-0">
                <div class="scroll-img-wrap overflow-hidden w-100 mt-40 xs:mt-20">
                    <?php
                    $mobile_aspectratio = [310, 382];
                if (!empty($mobile_image)) {
                    $mobile_aspectratio = [310, 382, $mobile_image['ID']];
                }
                $cropOptions = [
                    '(max-width: 768px)' => $mobile_aspectratio,
                    '(min-width: 769px)' => [829, 1023],
                ];

                $attributes = ['class' => 'h-auto w-100', 'loading' => 'lazy'];
                ?>
                <?php echo hatslogic_get_attachment_picture($image['ID'], $cropOptions, $attributes); ?>
                </div>
            </div>
             <?php } ?>
        </div>
    </div>
    <div class="gradient-end-black h-px-300 w-100 block absolute bottom-0"></div>
</section>