<?php extract($section); ?>
<?php $bg_class = $bg_enabled ? 'bg-light-grey pt-100 pb-100 xs:pt-80 xs:pb-80' : 'bg-white'; ?>
<section class="why-us <?php echo $bg_class; ?>">
<div class="container">
    <?php if(!empty($headline) ) { ?>
    <div class="title">
         <h2 class="h2"><?php echo $headline;?></h2>

    </div>
    <?php } ?>
    <?php if(!empty($griditems)) { ?>
    <div class="content mt-60 xs:mt-30">
        <div class="grid grid-2 sm:grid-1 gap-30 xs:gap-20">
            <?php foreach($griditems as $col) { ?>
            <div class="col">
                <div class="card b-1 solid bc-hash p-40 xs:p-30 h-100">
                    <div class="header flex xs:wrap xs:column">
                        <?php if(!empty($col['image'])){ ?>
                        <div class="wrap-icon">

                            <div class="p-10 xs:p-0 bg-primary mt-5 c-white min-w-px-80 xs:min-w-px-60 max-w-px-80 xs:max-w-px-60 flex align-start">
                                <img src="<?php echo $col['image'] ?>" alt="forum" loading="lazy" height="100px" width="100px">
                            </div>
                        </div>
                        <?php } ?>
                        <?php if(!empty($col['title'])){ ?>
                        <div class="info -mt-1 ml-40 xs:ml-0 xs:mt-20">
                             <h3 class="fs-24 xs:fs-20 transition font-bold"><mark class="c-primary">Shopware Community:</mark> The Free Foundation/Shopware Gemeinschaft: Die Freie Stiftung</h3>

                        </div>
                        <?php } ?>
                    </div>
                    <?php if(!empty($col['content'])){ ?>
                    <div class="content mt-40 xs:mt-20 pt-10 b-0 bt-1 solid bc-hash">
                        <p><?php echo$col['content']; ?></p>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <?php } ?>
</div>
</section>