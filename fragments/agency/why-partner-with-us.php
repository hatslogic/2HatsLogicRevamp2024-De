<?php extract($section); ?>

<section class="partner-with-us">
    <div class="container"> 
        <?php if($partnering_benefits): ?>
            <?php foreach ($partnering_benefits as $benefits): ?>
                <div class="title w-70 xl:w-100">
                    <?php if($benefits['headline']): ?>
                        <h2><?php echo $benefits['headline']; ?></h2>
                    <?php endif; ?>
                    <?php if($benefits['title']): ?>
                        <h3 class="h4 mt-40"><?php echo $benefits['title']; ?></h3>
                    <?php endif; ?>
                    <?php if($benefits['description']): ?>
                        <p class="mt-20"><?php echo $benefits['description']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="content mt-60 xs:mt-30">
                    <div class="grid grid-2 xs:grid-1 gap-60 ml-100 xl:ml-60 md:ml-0 xl:gap-40 xs:gap-20 xs:flex xs:wrap">
                    <?php if($benefits['items']): ?>
                        <?php foreach ($benefits['items'] as $items): ?>
                            <div class="col">
                                <div class="card xs:w-100 flex align-start">
                                    <?php if($items['icon']): ?>
                                        <div class="wrap-icon min-w-px-60 xs:min-w-px-40">
                                            <img src="<?php echo $items['icon']['url'] ?>" alt="<?php echo $items['icon']['title'] ?>" loading="lazy" height="100px" width="100px">
                                        </div>
                                    <?php endif; ?>
                                    <div class="info ml-20">
                                        <?php if($items['heading']): ?>
                                            <h3 class="h4 transition font-bold"><?php echo $items['heading'] ?></h3>
                                        <?php endif; ?>
                                        <?php if($items['content']): ?>
                                            <p class="mt-10"><?php echo $items['content'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>