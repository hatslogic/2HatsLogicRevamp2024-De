<?php extract($section); ?>

<section class="hero pt-60 pb-60 relative">
    <div class="container relative z-1">

        <?php if ($headline['title']) : ?>
        <div class="flex align-start justify-between md:wrap">
            <div class="col w-50 md:w-100">
                <div class="service-header">
                    <div class="headline">
                        <h1 class="h1-sml"><?php echo $headline['title']; ?></h1>
                        <?php if($content) : ?>
                        <p class="mt-30"><?php echo $content; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if ($packages) : ?>
        <?php $totalPackages = count($packages); ?>
        <div class="packages-wrapper animate mt-50 md:mt-30 gap-30 <?php if($totalPackages > 2) : ?>grid md:grid-1 lg:grid-2 grid-3<?php else : ?>flex row md:column<?php endif; ?>">
            <?php 
                foreach ($packages as $index => $package) :
                $isHighlighted = $package['highlight_package'];
            ?>
            <div class="package-item bg-white w-100 flex column max-w-px-520 md:max-w-100 b-1 solid h-full hover:bc-primary transition <?php echo $isHighlighted ? 'bc-primary' : 'bc-hash'; ?>">
                <div class="package-item-header p-34 md:p-24 <?php echo $isHighlighted ? 'bg-primary-light c-white' : 'bg-light-grey c-black'; ?>">
                        <?php if($package['name']) : ?>
                        <h2 class="h4 fs-26 uppercase flex align-center gap-14">
                            <?php echo $package['name']; ?>
                            <?php if($isHighlighted) : ?>
                                <span class="bg-orange py-2 px-4 fs-12 c-black capitalize"><?php echo $package['badge']; ?></span>
                            <?php endif; ?>
                        </h2>
                        <?php endif; ?>
                        <?php if($package['description']) : ?>
                        <p class="mt-10"><?php echo $package['description']; ?></p>
                        <?php endif; ?>
                        <?php if($package['price']) : ?>
                            <div class="price"> <span class="fs-42 font-bold"><?php echo $package['price']['amount']; ?></span>
                            <span class="fs-20"><?php echo $package['price']['suffix']; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="package-item-content bg-white p-34 md:p-24">
                    <?php if($package['package_details']) : ?>
                    <h3 class="h4"><?php echo $package['package_details']['title']; ?></h3>
                    <?php endif; ?>
                    <?php if($package['package_details']['package_details']) : ?>
                    <ul class="no-bullets lh-1-2 mt-14 fs-17">
                        <?php foreach($package['package_details']['package_details'] as $index => $package_detail) : ?>
                            <?php if($package_detail['benefit']) : ?>
                            <li class="relative block<?php echo $index > 0 ? ' mt-12' : ''; ?>"> 
                                <i class="icomoon icon-done c-primary fs-16 absolute left-0 top-4"></i>
                                <span class="inline-block ml-24"><?php echo $package_detail['benefit']; ?></span>
                            </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>
                <div class="package-item-footer b-0 bt-1 solid bc-hash pt-34 pb-34 md:pt-24 md:pb-24 ml-34 mr-34 md:ml-24 md:mr-24 mt-auto mb-0">
                    <?php 
                    $action = $package['action']; 
                    if($action === 'link') : 
                    $button = $package['button'];
                    ?>
                    <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>" class="btn orange-btn w-100" aria-label="get a quote">
                        <?php echo $button['title']; ?>
                    </a>
                    <?php endif;
                    ?>

                    <?php 
                    $action = $package['action']; 
                    if($action === 'modal') : 
                    $modal = $package['modal'];
                    ?>
                    <button onclick="openModal('<?php echo $modal['value']; ?>'); updatePackageOption('<?php echo $package['name']; ?>')" aria-label="<?php echo $modal['label']; ?>" class="btn orange-btn w-100">
                        SUBSCRIBE
                    </button>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php if($package_notes): ?>
        <div class="package-info mt-40">
            <?php echo $package_notes; ?>
        </div>
        <?php endif; ?>
    </div>
    <div class="bg-shape h-100 pb-0 overflow-hidden absolute z-0 right-0 top-0 w-50">
        <picture class="shape absolute -top-10">
            <source srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/service-bg.webp 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/service-bg.webp 2x" media="(min-width: 768px)" type="image/webp">
            <source srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/service-bg.webp 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/service-bg.webp 2x" media="(max-width: 767px)" type="image/webp">
            <source srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/service-bg.jpg 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/service-bg.jpg 2x" media="(min-width: 768px)" type="image/jpg">
            <source srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/img/service-bg.jpg 1x, <?php echo get_template_directory_uri(); ?>/dist/assets/img/service-bg.jpg 2x" media="(max-width: 767px)" type="image/jpg">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/service-bg.jpg" alt="shopware" width="100" height="100">
        </picture>
    </div>
</section>