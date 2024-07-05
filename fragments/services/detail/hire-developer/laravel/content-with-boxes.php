<?php extract($section); ?>
<?php $bg_class = $bg_enabled ? 'bg-light-grey pt-100 pb-100 xs:pt-80 xs:pb-80' : 'bg-white'; ?>
<?php if (!empty($boxes)): ?>
    <section class="developer-from-india <?php echo $bg_class; ?> c-secondary ">
        <div class="container">
            <div class="title">
                <h2><?php echo $title ?></h2>

                <p><?php echo $content ?></p>
            </div>
            <div class="content mt-50 xs:mt-30">
                <div class="grid grid-3 xl:grid-2 xs:grid-1 gap-35 xs:gap-20 xs:flex xs:nowrap xs:scroll-x xs:-ml-20 xs:-mr-20 scroll-snap">
                    <?php foreach ($boxes as $key => $box): ?>
                        <div class="col card snap-center">
                            <div class="flex text-center bg-white px-30 py-20 h-100">
                                <p><?php echo $box['box_content'] ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </section>
<?php endif; ?>