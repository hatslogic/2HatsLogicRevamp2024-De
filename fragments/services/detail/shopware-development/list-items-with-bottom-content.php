<?php extract($section);?>
<?php $bg_class = $bg_enabled ? 'bg-light-grey pt-100 pb-100 xs:pt-80 xs:pb-80' : 'bg-white'; ?>
<section class="how-works <?php echo $bg_class;?>">
    <div class="container">
        <?php if(!empty($headline)){ ?>
        <div class="title">
            <h2><?php echo $headline;?></h2>
        </div>
        <?php } ?>
        <div class="content mt-60 xs:mt-30">
            <?php if(!empty($listitems)) { ?>
            <div class="points-wrap px-120 sm:px-0">
                <ul class="points b-0 bl-1 solid bc-primary ml-30 pl-30 pb-60 xs:ml-20 xs:pl-20 no-bullets">
                    <?php foreach($listitems as $k => $item) {  ?>
                    <li class="relative pl-40 xs:pl-20 <?php echo $k != 0 ? "mt-40 xs:mt-30" : '' ?>">
                        <?php if(!empty($item['title'])) { ?>
                        <div
                            class="icon-wrap h-px-60 w-px-60 xs:h-px-40 xs:w-px-40 bg-primary c-white flex align-center justify-center absolute -left-60 xs:-left-40 top-0">
                            <i class="icomoon icon-done fs-18"></i>

                        </div>
                        <?php } ?>
                        <div class="info inline-block">
                            <?php if(!empty($item['title'])) { ?>
                            <h3 class="h4"><?php echo $item['title'];?></h3>
                            <?php } ?>
                            <?php if(!empty($item['content'])) { ?>   
                            <p class="mt-10"><?php echo $item['content'];?></p>
                            <?php } ?>    
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <?php } ?>
            <?php if($bottom_enabled) { ?>
            <?php $bottom_bg_class = $bg_enabled ? 'bg-white' : 'bg-light-grey'; ?>
            <div class="advantages <?php echo $bottom_bg_class;?>  px-120 sm:px-60 pt-80 pb-80 xs:px-20 xs:pb-60 xs:pt-60">
                <?php if(!empty($bottom['title'])) { ?>
                <div class="title">
                    <h3 class="h3"><?php echo $bottom['title']; ?></h3>
                </div>
                <?php } ?>
                <?php if(!empty($bottom['listitems'])) { ?>
                <div class="content mt-60 xs:mt-30">
                    <div class="grid grid-2 xs:grid-1 rg-30 cg-80 sm:cg-30 xs:cg-15">
                        <?php foreach($bottom['listitems'] as $_item){ ?>
                        <div class="col">
                            <div class="info flex">
                                <div class="icon-wrap pt-5 c-primary"> <i class="icomoon icon-double-arrow"></i>

                                </div>
                                <div class="content ml-15">
                                    <?php  if(!empty($_item['title'])) { ?>
                                    <h4><?php echo $_item['title']; ?></h4>
                                    <?php } ?>
                                    <?php  if(!empty($_item['content'])) { ?>    
                                    <p><?php echo $_item['content']; ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
</section>