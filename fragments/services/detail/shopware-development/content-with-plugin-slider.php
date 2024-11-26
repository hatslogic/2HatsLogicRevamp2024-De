<?php extract($section); ?>
<?php $title_tg = (!empty($title_tag)) ? $title_tag : 'h2'; ?>
<?php $bg_class = $bg_enabled ? 'bg-light-grey pt-100 pb-100 xs:pt-80 xs:pb-80' : 'bg-white pt-60'; ?>
<section class="hire-developer <?php echo $bg_class; ?>">
    <div class="container">
        <div class="flex align-center gap-80 md:gap-40 md:wrap">
            <div class="col w-55 md:w-100 md:order-2">
                <div class="headline">
                    <div class="title">
                        <<?php echo $title_tg; ?> <?php if(!empty($title_tag) && $title_tag == 'h2') { echo "class='h2'";} ?> <?php if(!empty($title_tag) && $title_tag == 'h1') { echo "class='h1-sml'";} ?> ><?php echo $title; ?></<?php echo $title_tg; ?>>

                    </div>
                    <div class="content">
                        <p class="mt-30"><?php echo $content; ?></p>
                        <?php if ($cta) { ?>
                        <div class="btn-group mt-30"> 
                            <a href="<?php echo $cta['url']; ?>" class="btn btn-primary"><?php echo $cta['title']; ?></a>

                        </div>
                        <?php } ?>
                        <?php if ($list) { ?>
                        <h3 class="h4 mt-40"><?php echo $list_title; ?></h3>

                        <ul class="no-bullets mt-30">
                            <?php foreach ($list as $list_item) { ?>
                            <li class="mb-10 flex"> <i class="icomoon icon-check_circle fs-16 c-primary mt-4"></i> <span
                                    class="ml-8"><?php echo $list_item['list_item']; ?> </span>

                            </li>

                            </li>
                            <?php } ?>
                        </ul>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col w-45 md:w-100 md:order-1">
                <?php if ($image) { ?>
               
                <?php
                     $cropOptions = [
                         '(max-width: 768px)' => [390, 335],
                         '(min-width: 769px)' => [486, 417],
                     ];
                    $attributes = ['class' => 'transition', 'loading' => 'lazy'];
                    ?>
                <?php echo hatslogic_get_attachment_picture($image['ID'], $cropOptions, $attributes); ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php if ($plugin['slider']) { ?>
    <div class="container mt-80 extend md:mt-40">
        <div class="content plugins flex xl:wrap slider-wrapper">
            <div class="slider-label w-min-30 flex align-center">
                <h3 class="h3 b-0 br-2 xl:br-0 bc-primary h-auto solid pr-40"><?php echo $plugin['title']; ?></h3>

            </div>
            <div id="plugins" class="hats-slider horizontal ml-40 xl:ml-0 xl:mt-40">
              <?php foreach ($plugin['slider'] as $plugin) { ?>
                <div class="hats-slider__slide h-100"> 
                    <a href="<?php echo $plugin['url']; ?>" target="_blank" class="plugin c-secondary hover:c-primary min-w-px-340 sm:min-w-100 inline-flex h-100 mr-40 sm:mr-0 align-center b-1 bc-hash solid p-30 sm:p-20">
                        <div class="icon-wrap w-px-100 min-w-px-80">
                            <img src="<?php echo $plugin['logo']['url']; ?>" class="max-w-px-80 max-h-px-80 w-100" alt="logo" loading="lazy" width="100px" height="100px">
                        </div>
                        <div class="item-title ml-20">
                            <h4 class="fs-18 font-regular lh-1-25"><?php echo $plugin['name']; ?></h4>
                        </div>
                    </a>

                </div>
              <?php } ?>

            </div>
        </div>
    </div>
    <?php } ?>
</section>