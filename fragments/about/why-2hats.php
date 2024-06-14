<?php extract($section); ?>

<section class="why-work-with-us">
    <div class="container">
        <?php if ($title || $description): ?>
            <div class="title w-70 xl:w-100">
                <h2><?php echo $title; ?></h2>
                <p class="mt-10"><?php echo $description; ?></p>
            </div>
        <?php endif; ?>
        <?php if ($items): ?>
            <div class="content mt-60 xs:mt-30">
                <div class="grid grid-2 xs:grid-1 gap-60 ml-100 md:ml-0 xl:gap-40 xs:gap-20 xs:flex xs:wrap">
                    <?php foreach ($items as $item): ?>
                        <div class="col">
                            <div class="card xs:w-100 flex align-start">
                                <?php if ($item['icon']): ?>
                                    <div class="wrap-icon min-w-px-60 xs:min-w-px-40 max-w-px-60 xs:max-w-px-40">
                                        <?php if ($item['icon']['url']): ?>
                                            <img src="<?php echo $item['icon']['url']; ?>" alt="2hatslogic" loading="lazy" height="100px" width="100px">
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="info ml-20">
                                    <h3 class="h4 transition font-bold"><?php echo $item['heading']; ?></h3>
                                    <p class="mt-10"><?php echo $item['content']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>