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
        <span class="grid md:grid-1 lg:grid-2 grid-3"></span>

         <?php if ($packages) : ?>
            <?php $totalPackages = count($packages);
             ?>
            <div class="packages-wrapper animate mt-50 md:mt-30 gap-20 <?php if($totalPackages > 2) : ?>grid md:grid-1 lg:grid-1 grid-3<?php else : ?>flex row md:column<?php endif; ?>">
                <?php 
                    foreach ($packages as $index => $package) :
                    $isHighlighted = $package['highlight_package'];
                ?>
                    <div class="package-item bg-white w-100 flex column max-w-px-520 lg:max-w-100 b-1 solid h-full hover:bc-primary transition <?php echo $isHighlighted ? 'bc-primary' : 'bc-hash'; ?>">
                        <div class="package-item-header p-34 xl-p-20 md:p-24 <?php echo $isHighlighted ? 'bg-primary-light c-white' : 'bg-light-grey c-black'; ?>"> 
                            <?php if($package['name']) : ?>
                                <h2 class="h4 fs-26 uppercase flex align-center gap-10 xl-column">  
                                    <?php echo $package['name']; ?>
                                    <?php if($package['badge']) : ?>
                                        <span class="bg-orange py-2 px-4 fs-16 c-black capitalize xxl-fs-10"><?php echo $package['badge']; ?></span>
                                    <?php endif; ?>
                                </h2> 
                            <?php endif; ?>
                            <?php if($package['description']) : ?>
                                <p class="mt-10"><?php echo $package['description']; ?></p> 
                            <?php endif; ?>
                            <?php if($package['price']) : ?>
                                <div class="price"> 
                                    <span class="fs-42 font-bold"><?php echo $package['price']['amount']; ?></span> 
                                    <span class="fs-20"><?php echo $package['price']['suffix']; ?></span> 
                                </div> 
                            <?php endif; ?>
                        </div>
                        <div class="package-item-content bg-white p-34 md:p-24">
                           <?php if (!empty($package['package_details'])) : ?>
                            <?php foreach ($package['package_details'] as $index => $package_section) : ?>
                                <div class="package-section mb-20 flex column <?php echo $index > 0 ? ' mt-30' : ''; ?>">
                                    <?php if (!empty($package_section['title'])) : ?>
                                        <h3 class="h4"><?php echo esc_html($package_section['title']); ?></h3>
                                    <?php endif; ?>

                                    <?php if (!empty($package_section['package_details'])) : ?>
                                        <ul class="no-bullets lh-1-1 mt-20 fs-17">
                                            <?php foreach ($package_section['package_details'] as $index => $package_detail) : ?>
                                                <?php if (!empty($package_detail['benefit'])) : ?>
                                                    <li class="relative block  <?php echo $index > 0 ? ' mt-12' : ''; ?>">
                                                        <i class="icomoon icon-done c-primary fs-16 absolute left-0 top-4"></i>
                                                        <span class="inline-block ml-24">
                                                            <?php echo esc_html($package_detail['benefit']); ?>
                                                        </span>
                                                        <?php if (!empty($package_detail['link'])) : ?>
                                                            <a href="#packageDetails" class="link-primary underline">
                                                                <?php echo esc_html($package_detail['link_text']); ?>
                                                            </a>
                                                        <?php endif; ?>
                                                        <?php if (!empty($package_detail['sub-benefits'])) : ?>
                                                            <ul class="lh-1-2 mt-12 fs-16 mb-20 pl-20">
                                                                <?php foreach ($package_detail['sub-benefits'] as $sub) : ?>
                                                                    <?php if (!empty($sub['benefit'])) : ?>
                                                                        <li class="relative block mt-8">
                                                                            
                                                                            <span class="inline-block ml-24">
                                                                                <?php echo esc_html($sub['benefit']); ?>
                                                                            </span>

                                                                            <?php if (!empty($sub['link_to_detail']) && !empty($sub['link_text'])) : ?>
                                                                                <a href="#packageDetails" class="link-primary underline">
                                                                                    <?php echo esc_html($sub['link_text']); ?>
                                                                                </a>
                                                                            <?php endif; ?>
                                                                        </li>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        <?php endif; ?>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                            <?php endif; ?>    
                        </div>
                        <div class="package-item-footer b-0 bt-1 solid bc-hash pt-34 pb-34 md:pt-24 md:pb-24 ml-34 mr-34 md:ml-24 md:mr-24 mt-auto mb-0">
                            <?php 
                            $action = $package['action']; 
                            if ($action === 'link') : 
                                $button = $package['button'];
                                if (is_array($button)) : ?>
                                    <a href="<?php echo esc_url($button['url']); ?>" 
                                    target="<?php echo esc_attr($button['target'] ?: '_self'); ?>" 
                                    class="btn orange-btn w-100" 
                                    aria-label="<?php echo esc_attr($button['title']); ?>">
                                        <?php echo esc_html($button['title']); ?>
                                    </a>
                                <?php elseif (is_string($button) && !empty($button)) : ?>
                                    <a href="<?php echo esc_url($button); ?>" 
                                    class="btn orange-btn w-100" 
                                    aria-label="get a quote">
                                    ABONNIEREN
                                    </a>
                                <?php endif; 
                                elseif ($action === 'modal') : 
                                $modal = $package['modal']; ?>
                                <button onclick="openModal('<?php echo esc_js($modal['value']); ?>'); updatePackageOption('<?php echo esc_js($package['name']); ?>')" 
                                        aria-label="<?php echo esc_attr($modal['label']); ?>" 
                                        class="btn orange-btn w-100">
                                        ABONNIEREN
                                </button>
                                <?php endif; 
                                ?>
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