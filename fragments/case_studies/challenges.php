<?php extract($section); ?>
<section class="the-challenge pb-100 md:pb-60">
    <div class="container">
        <div class="title"> <span class="headline c-primary font-bold"><?php echo $headline['sub_title']; ?></span>
            <h2><?php echo $headline['title']; ?></h2>
        </div>
        <div class="content">
            <div class="challenge">
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
                
                <?php if ($slider) { ?>
                <div id="case-study-slider" class="hats-slider mt-60 horizontal">
                    <?php foreach ($slider as $item) { ?>
                    <div class="hats-slider__slide">
                        <div class="slide-item">
                            <?php $image = $item['slide_image']; ?>
                            <?php
                            $cropOptions = [
                                '(max-width: 768px)' => [520, 325],
                                '(min-width: 769px)' => [520, 325],
                            ];
                        $attributes = ['class' => 'w-px-556 h-auto max-w-100r', 'loading' => 'lazy'];
                        ?>
                            <?php echo hatslogic_get_attachment_picture($image['ID'], $cropOptions, $attributes); ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>

            </div>
            <?php if ($facts) { ?>
                <div class="facts mt-60">
                    <h3><?php echo $facts_title; ?></h3>
                    <div class="grid grid-5 xl:grid-4 md:grid-2 mt-30 gap-50 xs:gap-20">
                        <?php if ($facts) { ?>
                            <?php foreach ($facts as $key => $fact) {
                                $formatted_key = sprintf('%02d', $key + 1); ?>
                                <div class="col">
                                    <div class="item"> <span class="fs-80 opacity-20 font-thin -ml-6 xs:fs-44"><?php echo $formatted_key; ?></span>
                                      <p class="xs:fs-16"><?php echo $fact['fact']; ?></p>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>