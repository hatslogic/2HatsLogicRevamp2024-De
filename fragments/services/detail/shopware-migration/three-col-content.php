<?php extract($section); ?>

<?php $bg_class = $bg_enabled ? ' bg-light-grey pt-100 pb-100 xs:pt-80 xs:pb-80 ' : ' bg-white '; ?>
<section class="shopware-migration <?php echo $bg_class;?>">
    <div class="container">
        <div class="title w-70 md:w-100">
            <h2><?php echo $title ?></h2>
            <p><?php echo $description ?></p>
        </div>
        <?php if ($items): ?>
            <div class="content mt-40 xs:mt-30">
                <div class="grid mt-40 grid-3 xl:grid-2 xs:grid-1 gap-60 xs:gap-30 xs:flex xs:wrap">
                    <?php foreach ($items as $item): ?>
                        <div class="col card">
                            <div class="item">
                                <div class="info">
                                    <h3 class="h6 transition font-bold"><?php echo $item['title'] ?></h3>

                                    <p><?php echo $item['content'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>