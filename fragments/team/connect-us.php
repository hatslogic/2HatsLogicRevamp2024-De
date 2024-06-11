<?php extract($section); ?>

<section class="connect-us">
    <div class="container">
        <?php if ($title): ?>
            <div class="title text-center">
                <h2 class="h3 font-regular">
                    <?php echo $title; ?>
                </h2>
            </div>
        <?php endif; ?>
        
        <?php if($social_media): ?>
        <div class="content mt-60 xs:mt-30">
            <div class="flex xs:wrap justify-center cg-100 xl:cg-80 md:cg-40 xs:cg-30 xs:rg-20"> 
                <?php foreach ($social_media as $key => $item): ?>
                    <a href="<?php echo $item['url']; ?>" target="_blank" class="flex justify-center xs:w-30">
                        <?php if($item['icon']): ?>
                            <img src="<?= $item['icon']['url']; ?>" class="max-w-px-150 xs:max-w-px-100" alt="<?= $item['icon']['alt'];  ?>" width="100" height="100" loading="lazy">
                        <?php endif; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>