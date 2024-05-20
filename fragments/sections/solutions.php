<?php extract($section); ?>

<section class="solutions pt-100 pb-100 xs:pt-80 xs:pb-80 b-0 bb-1 bc-hash solid">
    <div class="container">
        <?php if($title):?>
        <div class="title">
            <h2><?php echo $title?></h2>
        </div>
        <?php endif;?>
        <div class="content mt-60 xs:mt-30">
        <?php if ($technologies): ?>
            <div class="grid grid-4 xl:grid-2 xs:grid-1 gap-40 xs:flex xs:wrap">
            <?php foreach ($technologies as $key => $technology) : ?>
                <div class="col card xs:mt-20">
                    <div class="technology">
                        <div class="logo-wrap flex align-center">
                            <img src="<?php echo $technology['image']['url']; ?>" loading="lazy" alt="<?php echo $technology['title']; ?>" width="100px" height="100px" class="transition">
                        </div>
                        <div class="info mt-30">
                            <h3 class="h4 transition font-bold"><?php echo $technology['title']; ?></h3>
                            <p class="font-light"><?php echo truncate_text($technology['content'], 80, '...'); ?></p>
                            <?php if($technology['read_more']): ?>
                            <a href="<?php echo $technology['read_more']['url']; ?>" aria-label="<?php echo $technology['read_more']['title']; ?>" class="link link-primary"><?php echo $technology['read_more']['title']; ?><i class="icomoon icon-chevron_right"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
                <?php endif; ?>
        </div>
    </div>
</section>