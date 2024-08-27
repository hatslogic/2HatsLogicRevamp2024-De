<?php extract($section);?>
<?php $bg_class = $bg_enabled ? 'bg-light-grey pt-100 pb-100 xs:pt-80 xs:pb-80' : 'bg-white'; ?>
<section class="showpare-agnecy <?php echo $bg_class;?>">
    <div class="container">
        <?php if(!empty($headline)) { ?>
        <div class="title">
            <h2 class="h2"><?php echo $headline;?></h2>
        </div>
        <?php } ?>
        <?php if(!empty($griditems)) { ?>
        <div class="content mt-60 xs:mt-30">
            <div class="grid grid-3 xs:grid-1 gap-30 xs:gap-20">
                <?php foreach($griditems as $col) { ?>
                <div class="col">
                    <div class="card b-1 solid bc-hash p-40 xs:p-30 h-100">
                    <?php if(!empty($col['image']) ) { ?>
                        <div
                            class="wrap-icon p-10 xs:p-0 bg-primary c-white min-w-px-80 xs:min-w-px-60 max-w-px-80 xs:max-w-px-60 flex align-start">
                            
                            <img src="<?php echo $col['image'];?>" alt="<?php echo !empty($col['title']) ? $col['title'] : '2hatslogic' ?>" loading="lazy" height="100px"
                                width="100px">

                        </div>
                       <?php } ?> 
                        <div class="info -mt-1">
                            <?php if(!empty($col['title'])) { ?>
                            <h3 class="h4 transition font-bold mt-30"><?php echo $col['title']; ?></h3>
                            <?php } ?> 
                            <?php if(!empty($col['content'])) { ?>   
                            <p><?php echo $col['content']; ?></p>
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