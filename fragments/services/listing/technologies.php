<?php extract($section); ?>

<section class="technologies pt-40 pb-40 sm:pt-30 sm:pb-30 b-0 bb-1 solid bc-hash">
    <div class="container-full">
        <div class="flex justify-between align-center">
            <div class="marquee technology-list w-100 flex">
            <?php if ($items): ?>
                <span class="marquee__group flex align-center justify-around">
                <?php foreach ($items as $key => $item): ?>
                    <a href="<?php echo $item['url']; ?>" aria-label="<?php echo $item['label']; ?>">
                        <img src="<?php echo $item['image']['url']; ?>" loading="lazy" alt="<?php echo $item['label']; ?>" width="100px" height="50px">
                    </a>
                        <?php endforeach ?>
                </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
