<?php extract($section); ?>

<?php if ($items): ?>
    <section class="pricing-packages <?php if($bg_enabled) : ?>bg-light-grey pt-100 pb-100 xs:pt-80 xs:pb-80<?php endif; ?>">
        <div class="container">
            <div class="title w-70 xl:w-100">
                <h2><?php echo $title ?></h2>
                <p class="mt-10"><?php echo $description ?></p>
            </div>
            <div class="content mt-60 xs:mt-30">
                <div class="grid grid-4 xl:grid-2 xs:grid-1 gap-20">
                    <?php foreach ($items as $key => $item): ?>
                        <div class="col">
                            <div class="card w-100 py-40 px-30 b-1 solid bc-hash hover:bc-pigment transition flex text-center">
                                <div class="card-inner">
                                    <h3 class="h4 fs-24 min-h-px-90 md:min-h-auto"><?php echo $item['heading'] ?></h3>
                                    <div class="content">
                                        <div class="price-wrap mt-40 mb-30 md:mt-30">
                                            <div class="label">Starting from</div>
                                            <div class="price fs-30 mt-10"><?php echo $item['price'] ?></div>
                                        </div>
                                        <p class="min-h-px-230 md:min-h-auto"><?php echo $item['description'] ?></p>
                                    </div>
                                    <?php if ($item['button']): ?>
                                        <div class="btn-wrap mt-40"> <a href="<?php echo $item['button']['url'] ?>"
                                                class="btn btn-secondary"><?php echo $item['button']['title'] ?></a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>