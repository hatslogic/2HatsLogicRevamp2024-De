<?php
extract($section);
$bg_class = $bg_enabled ? ' bg-light-grey pt-100 pb-100 xs:pt-80 xs:pb-80 ' : ' bg-white '; 
$background_image =  $cta_block['background_image'];
$dir = get_template_directory_uri();
?>

<section class="expert-service <?php echo $bg_class;?>">
    <div class="container">
        <?php if ($title || $description): ?>
            <div class="title w-70 xl:w-100">
                <h2><?php echo $title; ?></h2>
                <p class="mt-10"><?php echo $description; ?></p>
            </div>
        <?php endif; ?>
        <div class="content mt-40 xs:mt-30">
            <?php if ($items): ?>
                <div class="grid grid-2 xs:grid-1 gap-60 ml-100 xl:ml-60 md:ml-0 xl:gap-40 xs:gap-20 xs:flex xs:wrap">
                    <?php foreach ($items as $item): ?>
                        <div class="col">
                            <?php if(!empty($item['link'])): ?>
                                <a href="<?php echo $item['link']; ?>" class="no-decoration">
                            <?php endif; ?>
                                <div class="card xs:w-100 flex align-start">
                                    <?php if ($item['icon']): ?>
                                        <div class="wrap-icon min-w-px-60 xs:min-w-px-40 max-w-px-60 xs:max-w-px-40 mr-20">
                                            <img src="<?php echo $item['icon']['url']; ?>" 
                                                loading="lazy" height="100px" width="100px">
                                        </div>
                                    <?php endif; ?>
                                    <div class="info">
                                        <h3 class="h6 transition font-bold"><?php echo $item['title']; ?></h3>

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
        </div>
                        
        <?php if ($enable_cta): ?>
            <div class="info bg-dark-primary c-white pt-100 pb-100 xs:pt-80 xs:pb-80 relative mt-80"> 

                <?php if($background_image): ?>
                    <img src="<?php echo $background_image['url']; ?>" alt="<?php echo $background_image['alt']; ?>" height="<?php echo $background_image['height']; ?>" width="<?php echo $background_image['width']; ?>" class="absolute z-0 inset-0 ml-auto my-auto mr-0 w-auto max-h-90 max-w-90 xs:hidden" loading="lazy">
                <?php else: ?>
                    <img src="<?php echo $dir; ?>/dist/assets/img/background/help.svg" alt="help" height="100" width="100" class="absolute z-0 inset-0 ml-auto my-auto mr-0 w-auto max-h-90 max-w-90 xs:hidden" loading="lazy">
                <?php endif; ?>

                <div class="container">
                    <div class="title text-center">
                        <?php if($cta_block['text']): ?>
                            <h3 class="h3 block mb-30 md:mb-20"><?php echo $cta_block['text']; ?></h3>
                        <?php endif; ?>
                        <?php if($cta_block['button']): ?>
                            <div class="w-100 flex justify-center"> 
                                <a href="<?php echo $cta_block['button']['url']; ?>" class="btn btn-primary text-center">
                                    <?php echo $cta_block['button']['title']; ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>