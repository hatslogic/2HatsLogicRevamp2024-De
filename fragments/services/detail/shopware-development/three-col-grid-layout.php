<?php extract($section); ?>

<?php if($items): ?>
<section class="benefits">
                <div class="container">
                    <?php if ($title || $description): ?>
                    <div class="title">
                         <h2><?php echo $title; ?></h2>

                        <p><?php echo $description; ?></p>
                    </div>
                    <?php endif; ?>
                    <div class="content mt-50">
                        <div class="grid grid-3 xl:grid-2 xs:grid-1 gap-60 xs:gap-30 xs:flex xs:wrap">
                            <?php foreach ($items as $item): ?>
                            <div class="col card">
                                <div class="item">
                                    <div class="info">
                                         <h3 class="h4 transition font-bold"><?php echo $item['heading']; ?></h3>

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