<?php extract($section); ?>


<section class="shopware-migration pt-100 xs:pt-80 pb-100 xs:pb-80 b-0 bt-1 solid bc-hash bg-white">
    <div class="container">
        <div class="title w-70 md:w-100">
            <h2><?php echo $title ?></h2>
            <p><?php echo $description ?></p>
        </div>
        <?php if ($items): ?>
            <div class="content mt-60 xs:mt-30">
                <div class="grid mt-40 grid-3 xl:grid-2 xs:grid-1 gap-60 xs:gap-30 xs:flex xs:wrap">
                    <?php foreach ($items as $item): ?>
                        <div class="col card">
                            <div class="item">
                                <div class="info">
                                    <h3 class="h4 transition font-bold"><?php echo $item['title'] ?></h3>

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