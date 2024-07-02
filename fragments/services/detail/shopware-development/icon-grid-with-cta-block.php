<?php extract($section); ?>

<section class="expert-service">
    <div class="container">
        <?php if ($title || $description): ?>
            <div class="title w-70 xl:w-100">
                <h2><?php echo $title; ?></h2>
                <p class="mt-10"><?php echo $description; ?></p>
            </div>
        <?php endif; ?>
        <div class="content mt-60 xs:mt-30">
            <?php if ($items): ?>
                <div class="grid grid-2 xs:grid-1 gap-60 ml-100 xl:ml-60 md:ml-0 xl:gap-40 xs:gap-20 xs:flex xs:wrap">
                    <?php foreach ($items as $item): ?>
                        <div class="col">
                            <?php if(!empty($item['link'])): ?>
                                <a href="<?php echo $item['link']; ?>" class="no-decoration">
                            <?php endif; ?>
                                <div class="card xs:w-100 flex align-start">
                                    <?php if ($item['icon']): ?>
                                        <div class="wrap-icon min-w-px-60 xs:min-w-px-40 max-w-px-60 xs:max-w-px-40">
                                            <img src="<?php echo $item['icon']['url']; ?>" alt="<?php echo $item['title'] ?>"
                                                loading="lazy" height="100px" width="100px">
                                        </div>
                                    <?php endif; ?>
                                    <div class="info ml-20">
                                        <h3 class="h4 transition font-bold"><?php echo $item['title']; ?></h3>

                                        <p class="mt-10 c-secondary"><?php echo $item['content']; ?></p>
                                    </div>
                                </div>
                            <?php if(!empty($item['link'])): ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if ($cta_block): ?>
                <div class="info py-60 xs:py-40 px-130 md:px-20 mt-40 bg-dark-primary c-white">
                    <?php if($cta_block['text']): ?>
                    <div class="max-w-60 xs:max-w-100 mx-auto">
                        <h3 class="h3 text-center block mb-30 md:mb-20">
                            <?php echo $cta_block['text']; ?>
                        </h3>
                    </div>
                    <?php endif; ?>
                    <?php if($cta_block['button']): ?>
                    <div class="w-100 flex justify-center"> 
                        <a href="<?php echo $cta_block['button']['url']; ?>" class="btn btn-primary text-center">
                            <?php echo $cta_block['button']['title']; ?>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>