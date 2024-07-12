<?php extract($section); ?>

<section class="hero relative">
    <div class="hero-bg">
        <?php if ($image || $mobile_image) { ?>
           
           <?php
            $mobile_aspectratio = [375, 262];
            if ($mobile_image) {
                $mobile_aspectratio = [375, 262, $mobile_image['ID']];
            }
            ?>
           
            <?php
            $cropOptions = [
                '(max-width: 768px)' => $mobile_aspectratio,
                '(min-width: 769px)' => [1920, 893],
            ];
            $attributes = ['class' => 'h-auto w-100', 'loading' => 'eager', 'fetchPriority' => 'high'];
            ?>
            <?php echo hatslogic_get_attachment_picture($image['ID'], $cropOptions, $attributes); ?>
       <?php } ?>
    </div>

    <div class="hero-content absolute md:relative md:mt-60 z-1 h-100 w-100 top-0 bottom-0">
        <div class="container h-100 flex align-center">
            <div class="title c-white md:c-secondary">
            <?php if ($headline) { ?>
                    <?php if ($headline['subtitle']) { ?>
                        <h1 class="h1-sml"><?php echo $headline['subtitle']; ?></h1>
                    <?php } ?>
                    <?php if ($headline['title']) { ?>
                        <h2 class="h3"><?php echo $headline['title']; ?></h2>
                    <?php } ?>
                <?php } ?>
                <?php if ($content) { ?>
                    <p><?php echo $content; ?></p>
                <?php } ?>
                <?php if ($button) { ?>
                    <div class="btn-group mt-40">
                        <a href="<?php echo $button['url']; ?>" class="btn btn-light md:btn-primary"><?php echo $button['title']; ?></a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>