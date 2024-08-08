<?php extract($section); ?>
<section class="case-study-solution relative bg-light-grey pt-100 xs:pt-80 pb-100 xs:pb-80 overflow-hidden">

    <div class="container">
        <div class="max-w-75 xs:max-w-100 mx-auto px-60 xs:px-0">
            <?php if (!empty($title) || !empty($content)) {?>
            <div class="title"> 
                <?php if (!empty($headline)) { ?>
                <span class="headline c-primary font-bold"><?php echo $headline; ?></span>
                <?php } ?>  
                <?php if (!empty($title)) { ?>  
                <h2><?php echo $title; ?></h2>
                <?php } ?>      
            </div>
            <?php if (!empty($content)) { ?>
            <div class="content">
                <p><?php echo nl2br($content); ?></p>
            </div>
            <?php }?>
            <?php }?>
            <?php if (!empty($list)) { ?>
            <div class="grid grid-2 md:grid-1 mt-40 cg-30 rg-30 w-100">
            <?php foreach ($list as $key => $list) { ?>
                <?php if (!empty($list['item'])) { ?>
                <div class="col">
                    <div class="info flex">
                        <div class="icon-wrap pt-5 c-primary"> <i class="icomoon icon-double-arrow"></i>

                        </div>
                        <div class="content ml-15">
                            <p class="mt-0 mb-0 fs-15 lh-1-5"><?php echo $list['item']; ?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
</section>