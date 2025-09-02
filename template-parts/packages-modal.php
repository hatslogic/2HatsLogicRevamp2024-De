<?php
$packages_modal_enable = get_field('packages_modal_enable', 'option');
$packages_modal_image = get_field('packages_modal_image', 'option');
$packages_modal_image_mobile = get_field('packages_modal_image_mobile', 'option');
$packages_modal_title = get_field('packages_modal_title', 'option');
$packages_modal_description = get_field('packages_modal_description', 'option');
$packages_modal_offers = get_field('packages_modal_offers', 'option');
$packages_modal_button_link = get_field('packages_modal_button_link', 'option');
?>

<?php if($packages_modal_enable): ?>
<div id="packages" class="modal fixed packages bg-overlay inset-0 z-14 h-100 w-100 transition">
    <div class="container h-100 xs:p-0">
        <div class="flex align-center h-100">
            <div class="flex xs:wrap w-100 h-80 xs:h-100 align-center relative bg-white z-1 xs:scroll-y">
                <button class="btn btn-secondary absolute xs:fixed z-1 top-20 right-20 close" onclick="closePackageModal()">
                    <i class="icomoon icon-close"></i>
                </button>
                <div class="col w-50 h-100 xs:w-100 xs:h-50 md:hidden xs:visible">
                    <?php if ($packages_modal_image && $packages_modal_image_mobile) { ?>
                    
                    <?php
                    $mobile_aspectratio = [430, 466];
                    if ($packages_modal_image_mobile) {
                        $mobile_aspectratio = [430, 466, $packages_modal_image_mobile['ID']];
                    }
                    ?>

                    <?php
                        $cropOptions = [
                            '(max-width: 768px)' => $mobile_aspectratio,
                            '(min-width: 769px)' => [576, 701],
                        ];
                        $attributes = ['picturetag_class' => 'h-100 w-100 sm:w-100', 'class' => 'h-100 cover', 'loading' => 'lazy'];
                        ?>
                    <?php echo hatslogic_get_attachment_picture($packages_modal_image['ID'], $cropOptions, $attributes); ?>

                    <?php } ?>
                </div>
                <div class="col w-50 h-100 xs:h-auto md:w-100 md:h-auto p-60 md:px-20 xs:py-60 flex align-center">
                    <div class="form-wrap">
                        <?php if($packages_modal_title): ?>
                        <div class="title">
                            <h2 class="h3 uppercase"><?php echo $packages_modal_title; ?></h2>
                            <p><?php echo $packages_modal_description; ?></p>
                        </div>
                        <?php endif; ?>
                        <div class="content">
                            <?php if($packages_modal_offers): ?>
                            <ul class="no-bullets lh-1-2 mt-40 fs-17">
                                <?php foreach($packages_modal_offers as $index => $offer): ?>
                                <li class="relative block<?php echo $index > 0 ? ' mt-12' : ''; ?>">
                                    <i class="icomoon icon-done c-primary fs-16 absolute left-0 top-4"></i>
                                    <span class="inline-block ml-24"><?php echo $offer['package_modal_offer']; ?></span>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>

                            <?php if($packages_modal_button_link): ?>
                            <div class="btn-wrap mt-40">
                                <button onclick="closePackageModal(); redirectToPackages('<?php echo $packages_modal_button_link; ?>')" aria-label="packages" class="btn orange-btn">See our plans</button>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>