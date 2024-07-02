<?php extract($section); ?>
<?php $bg_class = $bg_enabled ? ' bg-light-grey pt-100 pb-100 xs:pt-80 xs:pb-80 ' : ' bg-white '; ?>
<?php if ($items): ?>
    <section class="should-you-migrate-to-sw6 <?php echo $bg_class;?>">
        <div class="container">
            <div class="title">
                <h2><?php echo $title; ?></h2>

                <p><?php echo $description; ?></p>
            </div>
            
            <div class="content mt-50">
            <?php if ($grid_title): ?>
                <h3><?php echo $grid_title; ?></h3>
            <?php endif; ?>

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