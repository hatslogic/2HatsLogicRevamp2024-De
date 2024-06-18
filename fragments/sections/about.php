<?php extract($section); ?>
<section class="about">
    <div class="container">
        <div class="content flex sm:wrap align-center">
        <?php if($image): ?>
            <div class="col w-100">
                <?php $cropOptions = [
                    "fallbackimage-size" => [494,328],
                    "fallbackimage-class"=>"h-auto w-100"
                ];?>
                <?php display_responsive_image($image['ID'],$cropOptions) ?>
            </div>
            <?php endif; ?>
            <div class="col w-100 ml-120 xxl:ml-80 xl:ml-60 sm:ml-0 sm:mt-40">
            <?php if($headline['title']): ?>
                <div class="title">
                    <span class="headline c-primary font-bold"><?php echo $headline['sub_title']; ?></span>
                    <h2><?php echo $headline['title']; ?></h2>
                </div>  
                <?php endif; ?>
                <div class="content">
                    <?php echo apply_filters('the_content', $content); ?>
               
                    <?php if($link): ?>
                    <a href="<?php echo $link['url']; ?>" aria-label="<?php echo $link['title']; ?>" class="btn btn-secondary-outline"><?php echo $link['title']; ?></a></a>
                      <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
