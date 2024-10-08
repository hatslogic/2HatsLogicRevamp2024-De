<?php extract($section); ?>

<section class="the-problem pb-100 md:pb-60">
    <div class="container">
        <?php if ($headline['title']) { ?>
        <div class="title"> <span class="headline c-primary font-bold"><?php echo $headline['sub_title']; ?></span>
             <h2><?php echo $headline['title']; ?></h2>
        </div>
        <?php } ?>
        <div class="content">
            <p><?php echo $content; ?></p>
            <?php if ($list) { ?>
                <ul class="no-bullets split-2 mt-30 xs:split-1 xs:fs-14">
                    <?php foreach ($list as $item) { ?>
                        <li class="mb-10 flex"><i class="icomoon icon-check_circle fs-16 c-primary mt-4"></i> 
                        <span class="ml-8"><?php echo $item['list_item']; ?></span>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
            <?php if ($bottom_content) { ?>
                <p><?php echo $bottom_content; ?></p>
            <?php } ?>
            <?php if ($images['image_1'] || $images['image_2']) { ?>
            <div class="grid grid-2 gap-20 mt-60 xs:flex xs:wrap">
                <?php if ($images['image_1']) { ?>
                <div class="col">
                    
                    <?php
                        $cropOptions = [
                            '(max-width: 768px)' => [280, 220],
                            '(min-width: 769px)' => [560, 442],
                        ];
                    $attributes = ['loading' => 'lazy'];
                    ?>
                    <?php echo hatslogic_get_attachment_picture($images['image_1']['ID'], $cropOptions, $attributes); ?>
                </div>
                <?php } ?>
                <?php if ($images['image_2']) { ?>
                <div class="col">
                   
                    <?php
                        $cropOptions = [
                            '(max-width: 768px)' => [280, 220],
                            '(min-width: 769px)' => [560, 442],
                        ];
                    $attributes = ['loading' => 'lazy'];
                    ?>
                    <?php echo hatslogic_get_attachment_picture($images['image_2']['ID'], $cropOptions, $attributes); ?>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
</section>