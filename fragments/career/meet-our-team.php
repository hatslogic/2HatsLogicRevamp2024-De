<?php
extract($section);

// Define cropOptions before the loop to avoid repeated declarations
$cropOptions = [
"fallbackimage-size" => [360, 360],
'fallbackimage-class' => 'transition'
];
?>

<section class="meet-our-team">
    <div class="container">
        <div class="title text-center">
            <?php if($title): ?>
            <h2><?= $title; ?></h2>
            <?php endif; ?>
            <?php if($content): ?>
            <p><?= $content; ?></p>
            <?php endif; ?>
        </div>
        <?php if($album): ?>
        <div class="content mt-60 xs:mt-30">
            <div class="split-3 xs:split-2 xs:gap-5 xs:split-1 gap-20">
                <?php foreach($album as $key => $image): ?>
                <?php ${"picture" . $key} = $image['pictures'];?>
                <?php if(${"picture" . $key}): ?>
                <div class="col break-in:ac <?= $key > 0 ? 'mt-20 xs:mt-5' : ''; ?>">
                    <div class="album">
                        <?php display_responsive_image(${"picture" . $key}, $cropOptions); ?>
                    </div>
                </div>
                <?php endif; ?>
                <?php endforeach; ?>
                <?php if($picture7 && $picture8): ?>
                <div class="col break-in:ac mt-20 xs:mt-5 flex cg-20 xs:cg-5">
                    <div class="album">
                        <?php display_responsive_image($picture7, $cropOptions) ?>
                    </div>
                    <div class="album">

                        <a href="<?php echo $see_more ? $see_more['url'] : "#" ?>" class="w-100 h-100 relative">

                            <div
                                class="overlay absolute h-100 w-100 c-white flex column gap-10 align-center justify-center">
                                <i class="icomoon fs-28 icon-plus"></i>
                                <span><?php echo $see_more ? $see_more['title'] : "See More" ?></span>
                            </div>
                            <?php display_responsive_image($picture8, $cropOptions) ?>
                        </a>

                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>