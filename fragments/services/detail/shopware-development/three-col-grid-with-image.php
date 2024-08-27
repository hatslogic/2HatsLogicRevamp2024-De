<?php extract($section);?>
<section class="journal">
    <div class="container">
        <?php if(!empty($headline)) { ?>
        <div class="title">
            <h2><?php echo $headline;?> </h2>
        </div>
        <?php } ?>
        <?php if(!empty($griditems)) {?>
        <div class="content mt-50 xs:mt-30">
            <div
                class="grid grid-3 xl:grid-3 md:grid-2 xs:grid-1 gap-30 xs:gap-15 xs:flex xs:nowrap xs:scroll-x xs:-ml-20 xs:-mr-20 scroll-snap">
                <?php foreach($griditems as $col) {?>
                <div class="col card snap-center">
                    <div class="item">
                    <?php if(!empty($col['image'])) { ?>    
                    <?php $cropOptions = [
                            '(max-width: 768px)' => [362, 214],
                            '(min-width: 769px)' => [362, 214],
                        ];
                    $attributes = ['class' => 'transition', 'loading' => 'lazy'];
                    ?>
                    <?php echo hatslogic_get_attachment_picture($col['image'], $cropOptions, $attributes); ?>
                    <?php } ?>
                        <div class="info mt-30 xs:pl-20 xs:pr-20">
                            <?php if(!empty($col['title'])){ ?>
                                <h3 class="h4 transition font-bold"><?php echo $col['title']?></h3>
                            <?php } ?>
                            <?php if(!empty($col['list'])) { ?>
                            <?php foreach($col['list'] as $_item){ ?>   
                            <div class="info flex animate">
                                <div class="icon-wrap mt-25 c-primary"> <i class="icomoon icon-double-arrow"></i>

                                </div>
                                <div class="content ml-15">
                                    <p><?php echo $_item['content'];?></p>
                                </div>
                            </div>
                            <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
    </div>
</section>