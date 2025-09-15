<?php extract($section); ?>

<section class="package-details relative" id="packageDetails">
    <div class="container relative z-1">

        <?php if ($headline['title']) : ?>
        <div class="flex align-start justify-between md:wrap">
            <div class="col w-50 md:w-100">
                <div class="service-header">
                    <div class="headline">
                        <h2 class="h2"><?php echo $headline['title']; ?></h1>
                        <p class="mt-20 mb-20"><?php echo $content; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if ($packages) : ?>
        <?php $totalPackages = count($packages); ?>
        <div class="packages-details-wrapper animate mt-20 gap-30 <?php if($totalPackages > 2) : ?>grid md:grid-1 lg:grid-2 grid-3<?php else : ?>flex row md:column<?php endif; ?>">
            <?php 
                foreach ($packages as $index => $package) :
            ?>
            <div class="package-item bg-white w-100 flex column max-w-px-520 md:max-w-100 b-1 solid h-full hover:bc-primary transition bc-hash">
                <?php if($package['description']) : ?>
                <div class="package-item-header p-34 md:p-24 pb-0">
                    <h2 class="h4 fs-26 flex align-center gap-14">
                        <?php echo $package['description']; ?>
                    </h2>
                </div>
                <?php endif; ?>
                <div class="package-item-content bg-white p-34 md:p-24">
                    <?php if($package['package_details']) : ?>
                    <h3 class="h4"><?php echo $package['package_details']['title']; ?></h3>
                    <?php endif; ?>
                    <?php if($package['package_details']['package_details']) : ?>
                    <ul class="no-bullets lh-1-2 mt-20 fs-17">
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
                        SUBSCRIBE FOR <?php echo $package['name']; ?>
                    </button>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>