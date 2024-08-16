<?php extract($section); ?>

<section class="hire-our-developer">
    <div class="container">
        <div class="title">
            <?php if($headline): ?>
                <h2><?php echo $headline; ?></h2>
            <?php endif; ?>
            <?php if($content): ?>
                <p><?php echo $content; ?></p>
            <?php endif; ?>
        </div>
        <div class="content mt-60 xs:mt-30">
            <div class="flex align-center justify-between md:wrap">
                <?php if ($image): ?>
                    <div class="col w-50 md:w-100">
                        
                        <?php
                            $cropOptions = [
                                '(max-width: 768px)' => [390, 221],
                                '(min-width: 769px)' => [570, 324],
                            ];
                            $attributes = ['class' => 'transition', 'loading' => 'lazy', 'picturetag_class' => 'loader'];
                            echo hatslogic_get_attachment_picture($image['ID'], $cropOptions, $attributes);
                        ?>
                    </div>
                <?php endif; ?>

                <div class="col w-40 md:w-100 md:mt-20">
                    <?php if($page_links): ?>
                        <ul class="no-bullets lh-3">
                            <?php foreach($page_links as $pageLink): ?>
                                <?php if($pageLink['link']): ?>
                                    <li class="b-0 bb-1 solid bc-hash">
                                        <a href="<?php echo $pageLink['link']['url'] ?>" class="c-secondary relative pt-20 pb-20 w-100 block font-bold hover-text-primary">
                                            <h4 class="h4"><?php echo $pageLink['link']['title'] ?></h4>
                                            <i class="icomoon absolute right-0 top-20 fs-26 icon-arrow_circle_right"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>