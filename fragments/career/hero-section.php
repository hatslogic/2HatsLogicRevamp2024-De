<?php extract($section); ?>
<section class="hero pt-60">
    <div class="container">
        <div class="flex align-start justify-between md:wrap">
            <div class="col w-50 md:w-100">
                <div class="headline">
                    <?php if ($title) { ?>
                    <h1 class="h1-sml"><?php echo $title; ?></h1>
                    <?php }?>   
                    <?php if ($content) { ?> 
                    <p class="mt-30"><?php echo $content; ?></p>
                    <?php } ?>
                    <?php if ($button) { ?>
                        <div class="btn-group mt-40">
                            <a href="<?php echo $button['url']; ?>" class="btn btn-primary"><?php echo $button['title']; ?></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php if ($image) { ?>
            <div class="col w-40 md:w-100 md:mt-40">
                
                    <?php
                        $cropOptions = [
                            '(max-width: 768px)' => [390, 268],
                            '(min-width: 769px)' => [615, 422],
                        ];
                $attributes = ['class' => 'transition', 'loading' => 'eager', 'fetchPriority' => 'high'];
                ?>
                    <?php echo hatslogic_get_attachment_picture($image['ID'], $cropOptions, $attributes); ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>