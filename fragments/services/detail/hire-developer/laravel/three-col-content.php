<?php extract($section); ?>
<?php if ($items): ?>
    <section class="remote-developer <?php if($bg_enabled): ?> bg-light-grey pt-100 pb-100 xs:pt-80 xs:pb-80<?php else: ?>  bg-white <?php endif;?>">
        <div class="container">
            <div class="title w-70 md:w-100">
                <h2><?php echo $title; ?></h2>
            </div>
            <div class="content mt-60 xs:mt-30">
                <div class="grid mt-40 grid-3 xl:grid-2 xs:grid-1 gap-60 xs:gap-30 xs:flex xs:wrap">
                    <?php foreach ($items as $item): ?>
                        <div class="col card">
                            <div class="item">
                                <div class="info">
                                    <h3 class="h4 transition font-bold"><?php echo $item['title']; ?></h3>
                                    <p><?php echo $item['content']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                 </div>
            </div>
        </div>
    </section>
<?php endif; ?>