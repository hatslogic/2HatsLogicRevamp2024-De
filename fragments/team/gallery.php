<?php extract($section); ?>
<?php 

$aspectRatio = [
    [496,606],
    [496,284],
    [496,284],
    [500,613],
    [496,594],
    [496,606],
    [496,284],
    [236,286],
    [236,286],
];
foreach ($images as $key => $item){
    ${"picture" . $key} = $item['ID'];

    $cropOptions[$key] =  [
        "fallbackimage-size" => [360, 360],
        'fallbackimage-class' => 'transition',
        'aspect-ratio' => $aspectRatio[$key]
    ];
}

?>
<section class="meet-our-team">
    <div class="container">
        <?php if ($title || $content): ?>
            <div class="title  text-center">
                <?php if ($title): ?>
                    <h2> <?php echo $title; ?> </h2>
                <?php endif; ?>
                <?php if ($content): ?>
                    <p> <?php echo $content; ?> </p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if ($images): ?>
            <div class="content mt-60 xs:mt-30">
                
                <div class="split-3 xs:split-2 xs:gap-5 xs:split-1 gap-20">
                <?php foreach ($images as $key => $item): ?>
                <?php if(${"picture" . $key} && $key < 7 ): ?>
                <div class="col break-in:ac <?= $key > 0 ? 'mt-20 xs:mt-5' : ''; ?>">
                    <div class="album">
                        <?php display_responsive_image(${"picture" . $key}, $cropOptions[$key]); ?>
                    </div>
                </div>
                <?php endif; ?>
                <?php endforeach; ?>
                <?php if($picture7 && $picture8): ?>
                <div class="col break-in:ac mt-20 xs:mt-5 flex cg-20 xs:cg-5">
                    <div class="album">
                        <?php display_responsive_image($picture7, $cropOptions[7]) ?>
                    </div>
                    <div class="album">

                        <a href="<?php echo $button ? $button['url'] : "#" ?>" target="<?php echo $button['target']; ?>"class="w-100 h-100 relative">

                            <div
                                class="overlay absolute h-100 w-100 c-white flex column gap-10 align-center justify-center">
                                <i class="icomoon fs-28 icon-plus"></i>
                                <span><?php echo $button ? $button['title'] : "See More" ?></span>
                            </div>
                            <?php display_responsive_image($picture8, $cropOptions[8]) ?>
                        </a>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            </div>
        <?php endif; ?>
    </div>
</section>