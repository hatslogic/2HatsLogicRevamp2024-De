<?php extract($section); ?>

<?php if ($items): ?>
    <section class="hire-items <?php if($bg_enabled) : ?>bg-light-grey<?php endif; ?> pt-100 pb-100 xs:pt-80 xs:pb-80">
        <div class="container">
            <div class="title">
                <h2><?php echo $title; ?></h2>
            </div>
            <div class="content mt-60 md:mt-50 xs:mt-30">
                <?php if($sub_title): ?>
                <h3><?php echo $sub_title; ?></h3>
                <?php endif; ?>

                <?php if($description): ?>
                <p><?php echo $description; ?></p>
                <?php endif; ?>

                <div class="grid grid-3 md:grid-2 xs:grid-1 gap-100 mt-60 md:gap-40 xs:gap-20">
                    <?php foreach ($items as $key => $item):
                        $formatted_key = sprintf('%02d', $key + 1);
                        ?>
                        <div class="col">
                            <div class="item">
                                <span class="fs-100 opacity-20 font-thin -ml-6 xs:fs-80" role="presentation"
                                    aria-hidden="true"><?php echo $formatted_key; ?></span>
                                <h4 class="h4 mt-15"><?php echo $item['title']; ?></h4>
                                <p><?php echo $item['content']; ?></p>
                                <?php if ($item['button']): ?>
                                <a href="<?php echo $item['button']['url']; ?>" class="link link-primary"><?php echo $item['button']['title']; ?> <i class="icomoon icon-chevron_right"></i> </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </section>
<?php endif; ?>