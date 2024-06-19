<?php extract($section); ?>

<section class="connect-us">
    <div class="container">
        <?php if (!empty($title)): ?>
        <div class="title text-center">
            <h2 class="h3 font-regular"><?= $title; ?></h2>
        </div>
        <?php endif; ?>

        <?php if (!empty($social_media_icons)): ?>
        <div class="content mt-60 xs:mt-30">
            <div class="flex xs:wrap justify-center cg-100 xl:cg-80 md:cg-40 xs:cg-30 xs:rg-20">
                <?php foreach ($social_media_icons as $icon): ?>
                <?php if (!empty($icon['link']) && !empty($icon['icon'])): ?>
                <a href="<?= htmlspecialchars($icon['link']); ?>" target="_blank" class="flex justify-center xs:w-30">
                    <img src="<?= htmlspecialchars($icon['icon']); ?>" class="max-w-px-150 xs:max-w-px-100"
                        alt="Social Media Icon" width="100" height="100" loading="lazy">
                </a>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>