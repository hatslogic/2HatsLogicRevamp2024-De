<?php extract($section); ?>

<section class="career-benefits bg-light-grey pt-100 pb-100 xs:pt-80 xs:pb-80">
    <div class="container">
        <div class="flex align-center md:wrap">
            <div class="col w-50 md:w-100 md:order-2 md:mt-40">
                <div class="block mr-auto max-w-80 lg:max-w-100">
                    <?php if (!empty($benefits['title'])): ?>
                    <div class="title">
                        <h2><?= $benefits['title']; ?></h2>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($benefits['list'])): ?>
                    <div class="content mt-60">
                        <div class="flex column gap-20">
                            <?php foreach ($benefits['list'] as $item): ?>
                            <?php if (empty($item['title'])) continue; ?>
                            <div class="card xs:w-100 flex align-center">
                                <?php if (!empty($item['icon'])): ?>
                                <div class="wrap-icon min-w-px-50">
                                    <img src="<?= htmlspecialchars($item['icon']); ?>" alt="2hatslogic" loading="lazy"
                                        height="100px" width="100px">
                                </div>
                                <?php endif; ?>
                                <div class="info ml-20">
                                    <h3 class="h4 transition font-bold"><?= $item['title']; ?></h3>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php if (!empty($benefits['right_image'])): ?>
            <div class="col w-50 md:w-100 md:order-1">
                <div class="img-wrap">
                    <img src="<?= htmlspecialchars($benefits['right_image']); ?>" alt="vector" width="360" height="180"
                        class="w-100">
                </div>
            </div>
            <?php endif; ?>
        </div>

        <div class="flex align-center md:wrap mt-80">
            <?php if (!empty($why_choose_us['left_image'])): ?>
            <div class="col w-50 md:w-100 md:order-1">
                <div class="img-wrap">
                    <img src="<?= htmlspecialchars($why_choose_us['left_image']); ?>" alt="vector" width="360"
                        height="180" class="w-100">
                </div>
            </div>
            <?php endif; ?>

            <div class="col w-50 md:w-100 md:order-2 md:mt-40">
                <div class="block ml-auto max-w-80 lg:max-w-100">
                    <?php if (!empty($why_choose_us['title'])): ?>
                    <div class="title">
                        <h2><?= $why_choose_us['title']; ?></h2>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($why_choose_us['list'])): ?>
                    <div class="content mt-60">
                        <div class="flex column gap-30">
                            <?php foreach ($why_choose_us['list'] as $item): ?>
                            <?php if (empty($item['title'])) continue; ?>
                            <div class="card xs:w-100 flex align-center">
                                <?php if (!empty($item['icon'])): ?>
                                <div class="wrap-icon min-w-px-50">
                                    <img src="<?= htmlspecialchars($item['icon']); ?>" alt="2hatslogic" loading="lazy"
                                        height="100px" width="100px">
                                </div>
                                <?php endif; ?>
                                <div class="info ml-20">
                                    <h3 class="h4 transition font-bold"><?= $item['title']; ?></h3>
                                    <?php if (!empty($item['description'])): ?>
                                    <p class="mt-10 mb-0"><?= $item['description']; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>