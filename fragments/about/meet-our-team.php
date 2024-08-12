<?php
extract($section);

// Define cropOptions before the loop to avoid repeated declarations
$breakpoints = [
    [
        '(max-width: 768px)' => [265,324],
        '(min-width: 769px)' => [522,626]
    ],
    [
        '(max-width: 768px)' => [265,152],
        '(min-width: 769px)' => [496,284]
    ],
    [
        '(max-width: 768px)' => [265,152],
        '(min-width: 769px)' => [522,298]
    ],
    [
        '(max-width: 768px)' => [265,324],
        '(min-width: 769px)' => [522,626]
    ],
    [
        '(max-width: 768px)' => [265,324],
        '(min-width: 769px)' => [522,626]
    ],
    [
        '(max-width: 768px)' => [265,324],
        '(min-width: 769px)' => [522,626]
    ],
    [
        '(max-width: 768px)' => [265,152],
        '(min-width: 769px)' => [522,298]
    ],
    [
        '(max-width: 768px)' => [180,218],
        '(min-width: 769px)' => [300,364]
    ],
    [
        '(max-width: 768px)' => [180,218],
        '(min-width: 769px)' => [300,364]
    ]
];
foreach($album as $key => $image){
    ${"picture" . $key} = $image['pictures'];

    $cropOptions[$key] =  $breakpoints[$key];
    $attributes[$key] = ["class" => "transition","loading" => "lazy"];
}
?>

<section class="meet-our-team block overflow-hidden">
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
                <?php if(${"picture" . $key} && $key < 7 ): ?>
                <div class="col break-in:ac <?= $key > 0 ? 'mt-20 xs:mt-5' : ''; ?>">
                    <div class="album">
                    <?php echo hatslogic_get_attachment_picture(${"picture" . $key}, $cropOptions[$key],$attributes[$key]); ?>
                    </div>
                </div>
                <?php endif; ?>
                <?php endforeach; ?>
                <?php if($picture7 && $picture8): ?>
                <div class="col break-in:ac mt-20 xs:mt-5 flex cg-20 xs:cg-5">
                    <div class="album">
                    <?php echo hatslogic_get_attachment_picture($picture7, $cropOptions[7],$attributes[7]) ?>
                    </div>
                    <div class="album">

                        <a href="<?php echo $see_more ? $see_more['url'] : "#" ?>" target="<?php echo $see_more ? $see_more['target'] : "_self" ?>" class="w-100 h-100 relative">
                            <div
                                class="absolute z-2 h-100 w-100 c-white flex column gap-10 align-center justify-center">
                                <i class="icomoon fs-28 icon-plus"></i>
                                <span><?php echo $see_more ? $see_more['title'] : "See More" ?></span>
                            </div>
                            <?php echo hatslogic_get_attachment_picture($picture8, $cropOptions[8],$attributes[8]) ?>
                            <span class="absolute z-0 bg-black opacity-70 top-0 h-100 w-100"></span>
                        </a>

                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>