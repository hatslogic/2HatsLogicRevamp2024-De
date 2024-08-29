<?php extract($section); ?>
<?php $bg_class = $bg_enabled ? 'bg-light-grey pt-100 pb-100 xs:pt-80 xs:pb-80' : 'bg-white'; ?>
<section class="intro-2hats <?php echo $bg_class;?>">
    <div class="container">
        <div class="content flex sm:wrap align-start justify-between sm:column-reverse">
            <div class="col w-50 md:w-100 sm:mt-40">
                <div class="title">
                    <?php  if(!empty($left['heading'])) { ?>
                        <h2><?php echo $left['heading'];?></h2>
                    <?php } ?>    
                </div>
                <?php if(!empty($left['list'])) { ?>
                <div class="content mt-60 xs:mt-30">
                    <div class="points-wrap">
                        <ul class="points b-0 bl-1 solid bc-primary ml-30 pl-30 xs:ml-20 xs:pl-20 no-bullets">
                            
                            <?php foreach( $left['list'] as $k => $item) {?>   
                                
                            <li class="relative pl-40 xs:pl-20 <?php echo $k != 0 ? "mt-40 xs:mt-30" : '' ?>">
                            <?php if(!empty($item['title']) || !empty($item['content'])){ ?>
                                <div
                                    class="icon-wrap h-px-60 w-px-60 xs:h-px-40 xs:w-px-40 bg-primary c-white flex align-center justify-center absolute -left-60 xs:-left-40 top-0">
                                    <i class="icomoon icon-done fs-18"></i>

                                </div>
                                <div class="info">
                                    <?php if(!empty($item['title'])){ ?> 
                                    <h3 class="h4 -mt-5"><?php echo $item['title'];?></h3>
                                    <?php } ?>
                                    <?php if(!empty($item['content'])) { ?>
                                    <p class="mt-10"><?php echo $item['content'];?></p>
                                    <?php } ?>    
                                </div>
                                <?php } ?>
                            </li>
                            
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <?php } ?>
            </div>
            <?php if($enable_right) { ?>
            <div class="col w-40 md:w-100 ml-120 md:ml-0 xxl:ml-80 xl:ml-60 sm:ml-0 sm:mt-0">
                <div class="card bg-primary c-white sticky top-0">
                    <?php if(!empty($right['image'])) { ?>
                    <div class="thumbnail">

                    <?php $cropOptions = [
                            '(max-width: 768px)' => [390, 278],
                            '(min-width: 769px)' => [456, 326],
                        ];
                    $attributes = ["picturetag_class" =>'loader','class' => 'transition', 'loading' => 'lazy'];
                    ?>
                    <?php echo hatslogic_get_attachment_picture($right['image'], $cropOptions, $attributes); ?>
                    </div>
                    <?php } ?>
                    <?php if(!empty($right['heading']) && ( !empty($right['telephone']) || !empty($right['whatsapp']) || !empty($right['email']) ) ) {?>
                    <div class="info py-60 px-50 xs:px-30 xs:py-40 h-100">
                        <?php if(!empty($right['heading']) ) {?>
                        <h3 class="h3"><?php echo $right['heading']; ?></h3>
                        <?php } ?>
                        <div class="block mt-30">
                            <?php if(!empty($right['telephone']) ) { ?>
                            <div class="flex align-center c-white"> <i class="icomoon icon-call fs-22"></i>
                                <a href="tel:<?php echo $right['telephone'] ;?>" class="c-white underline ml-20 block"><?php echo $right['telephone'] ;?></a>

                            </div>
                            <?php } ?> 
                            <?php if(!empty($right['whatsapp'])) { ?>   
                            <div class="flex align-center c-white mt-20"> <i class="icomoon icon-whatsapp fs-22"></i>
                                <a href="http://wa.me/<?php echo $right['whatsapp'];?>" class="c-white ml-20"><?php echo $right['whatsapp_text'];?> </a>

                            </div>
                            <?php } ?>
                            <?php if( !empty($right['email']) ) { ?>
                            <div class="flex align-center c-white mt-20"> <i class="icomoon icon-mail fs-22"></i>
                                <a href="#" class="underline c-white ml-20 block"><?php echo $right['email']; ?></a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>