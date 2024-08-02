<?php extract($section); ?>
<section class="case-study-problem">
    <?php if (!empty($title) || !empty($content)) {?>
    <div class="container">
        <div class="max-w-75 xs:max-w-100 mx-auto px-60 xs:px-0">
            <?php if (!empty($title)) { ?>
            <div class="title">
                <?php if (!empty($headline)) { ?>
                <span class="headline c-primary font-bold"><?php echo $headline; ?></span>
                <?php } ?>

                <h2><?php echo $title; ?></h2>

            </div>
            <?php } ?>
            <?php if (!empty($content)) { ?>
            <div class="content">
                <p><?php echo $content; ?></p>
            </div>
            <?php } ?>
        </div>
    </div>
    <?php } ?>
    <?php if (!empty($images['image_1']) || !empty($images['image_2']) || !empty($images['image_3'])) { ?>
    <div class="image-wrap mt-0">
        <div class="wrap-inner relative max-w-80 xs:max-w-100 mx-auto h-px-0 rp-b-46 xs:rp-b-100">
<?php
if (!empty($images['image_1'])) {
    $mobile_aspectratio = [129, 220];
    if (!empty($images['image_1']['mobile'])) {
        $mobile_aspectratio = [129, 220, $images['image_1']['mobile']];
    }
    $cropOptions = [
        '(max-width: 768px)' => $mobile_aspectratio,
        '(min-width: 769px)' => [288, 491],
    ];

    $attributes = ['picturetag_class' => 'mobile absolute z-2 top-0 mt-200 xs:mt-200 xs:ml-30 max-w-25 xs:max-w-30', 'class' => 'h-auto w-100', 'loading' => 'lazy'];
    ?>
<?php echo hatslogic_get_attachment_picture($images['image_1']['desktop'], $cropOptions, $attributes);
}?>
<?php
        if (!empty($images['image_2'])) {
            $mobile_aspectratio = [430, 318];
            if (!empty($images['image_2']['mobile'])) {
                $mobile_aspectratio = [430, 318, $images['image_2']['mobile']];
            }
            $cropOptions = [
                '(max-width: 768px)' => $mobile_aspectratio,
                '(min-width: 769px)' => [691, 511],
            ];

            $attributes = ['picturetag_class' => 'desktop absolute xs:relative z-0 top-0 ml-260 xs:ml-0 mt-0 max-w-60 xs:max-w-100', 'class' => 'h-auto w-100', 'loading' => 'lazy'];
            ?>
<?php echo hatslogic_get_attachment_picture($images['image_2']['desktop'], $cropOptions, $attributes);
        } ?>
<?php
        if (!empty($images['image_3'])) {
            $mobile_aspectratio = [215, 168];
            if (!empty($images['image_3']['mobile'])) {
                $mobile_aspectratio = [215, 168, $images['image_3']['mobile']];
            }
            $cropOptions = [
                '(max-width: 768px)' => $mobile_aspectratio,
                '(min-width: 769px)' => [576, 451],
            ];

            $attributes = ['picturetag_class' => 'tablet absolute z-1 right-0 top-0 mt-280 xs:mt-260 xs:mr-30 max-w-50 max-w-50', 'class' => 'h-auto w-100', 'loading' => 'lazy'];
            ?>
<?php echo hatslogic_get_attachment_picture($images['image_3']['desktop'], $cropOptions, $attributes);
        } ?>            
            
        </div>
    </div>
    <?php } ?>
</section>