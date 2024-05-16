<?php extract($section); ?>

<section class="impact relative pt-100 pb-100 sm:pt-80 sm:pb-80 bg-light-grey">
    <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/background/world-map-dot.svg" alt="world-map-dot" height="100" width="100" fetchpriority="high" class="absolute z-0 inset-0 my-auto w-auto mx-auto max-h-90 max-w-90">
    <div class="container relative z-1">
    <?php if (!empty($title)) : ?>
        <div class="title">
            <h2>
                <?php echo $title ?>
            </h2>
        </div>
        <?php endif ?>
        <div class="content mt-50 gap-40 sm:mt-30">
            <div class="flex nowrap sm:wrap justify-between scroll-x">
            <?php foreach ($items as $key => $item) : ?>
                <div class="col sm:w-50 pr-40 sm:pr-20">
                    <div class="count font-light c-primary fs-55 sm:fs-44"><span class="digit transition" data-target="<?php echo $item['count']; ?>">0</span><?php echo $item['suffix']; ?></div>
                    <p class="mt-10 lh-1-25"><small><?php echo $item['label']; ?></small> </p>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>

