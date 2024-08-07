<?php extract($section); ?>
<section class="case-study-result relative overflow-hidden">
    <div class="container relative z-1">
        <?php if (!empty($title) || !empty($content)) {?>
        <div class="title text-center"> 
            <?php if (!empty($headline)) { ?>
            <span class="headline c-primary font-bold"><?php echo $headline; ?></span>
            <?php } ?> 
            <?php if (!empty($title)) { ?>
            <h2><?php echo $title; ?></h2>
            <?php } ?> 
            <?php if (!empty($content)) { ?>    
                <p><?php echo nl2br($content); ?></p>
            <?php } ?>    
        </div>
        <?php } ?>   
        <?php if (!empty($cta)) { ?>  
        <div class="btn-group mt-40 center"> <a href="<?php echo $cta['url'] ? $cta['url'] : '#'; ?>" <?php if ($cta['target'] != '') { ?> target="_blank" <?php } ?> class="btn btn-secondary">
        <?php echo $cta['title'] ? $cta['title'] : 'Click'; ?></a>
        </div>
        <?php } ?>
    </div>
    <?php if (!empty($image['desktop'])) { ?>
    <div class="mockups-wrap -mt-60 xs:mt-20 relative z-0">
                
                <?php
                $mobile_aspectratio = [430, 276];
        if (!empty($image['mobile'])) {
            $mobile_aspectratio = [430, 276, $image['mobile']];
        }
        $cropOptions = [
            '(max-width: 768px)' => $mobile_aspectratio,
            '(min-width: 769px)' => [1440, 926],
        ];

        $attributes = ['picturetag_class' => 'overflow-hidden', 'class' => 'h-auto w-100', 'loading' => 'lazy'];
        ?>
<?php echo hatslogic_get_attachment_picture($image['desktop'], $cropOptions, $attributes); ?>
        </div>
        <div class="gradient-end-black h-px-300 w-100 block absolute bottom-0"></div>
    <?php } ?>        
</section>