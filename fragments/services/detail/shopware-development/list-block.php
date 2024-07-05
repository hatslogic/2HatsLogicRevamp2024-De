<?php extract($section); ?>
<?php $bg_class = $bg_enabled ? ' bg-light-grey pt-100 pb-100 xs:pt-80 xs:pb-80 ' : ' bg-white '; ?>
<section class="official-shopware-partner <?php echo $bg_class; ?>">
    <div class="container">
        <div class="flex justify-between align-center md:wrap max-w-80 md:max-w-100 mx-auto md:mx-0">
            <div class="col w-20 md:w-100"> <a href="https://shopware.com" target="_blank">
                    <img src="<?php echo $image['url']; ?>" class="md:max-w-px-120 xs:max-w-px-120"
                        alt="shopware-partner" loading="lazy" width="100" height="100">
                </a>

            </div>
            <div class="col ml-30 sm:ml-0 w-70 md:w-100 md:mt-60 xs:mt-20">
                <h2><?php echo $title ?></h2>
                <?php if ($lists): ?>
                <ul class="acc no-bullets fs-20 lh-1-2 mt-40 sm:fs-16">
                    <?php foreach ($lists as $key => $list): ?>

                        <li class="<?php echo ($list['list_content']) ? 'acc-item' : '' ?> relative block <?php if($key > 0) { echo 'mt-20 xs:mt-15'; } ?>">
                        <div class="acc-toggle">
                            <div class="wrap-icon fs-15 absolute left-0 top-6"> <i class="icomoon icon-add add"></i>
                            <?php if($list['list_content']): ?>
                                <i class="icomoon icon-remove minus"></i>
                            <?php endif; ?>

                            </div> <span class="inline-block ml-30"> <?php echo $list['list_item']; ?></span>

                        </div>
                        <?php if($list['list_content']): ?>
                            <div class="acc-content">
                                <p><?php echo $list['list_content']; ?></p>
                            </div>
                        <?php endif; ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>