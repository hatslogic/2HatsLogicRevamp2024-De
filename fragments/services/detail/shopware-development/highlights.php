<?php extract($section); ?>
<?php $bg_class = $bg_enabled ? 'bg-light-grey pt-100 pb-100 xs:pt-80 xs:pb-80' : 'bg-white'; ?>
<section class="highlights <?php echo $bg_class;?>">
    <div class="container">
        <?php if(!empty($heading) || !empty(!$description)) { ?>
        <div class="title text-center">
            <?php if(!empty($heading)){ ?>
            <h2><?php echo $heading;?></h2>
            <?php } ?>
            <?php if(!empty($description)) { ?>    
            <p> <?php echo $description;?></p>
            <?php } ?>
        </div>
        <?php } ?>
        <?php if(!empty($certificates)) { ?>
        <div class="content mt-60 xs:mt-30">
            <div class="logos-wrap mx-auto flex gap-40 xs:gap-20 align-center justify-center"> 
                <?php foreach($certificates as $cert) { ?>
                <?php if(!empty($cert['image'])) {  ?>
                <a href="<?php echo !empty($cert['link']) ? $cert['link'] : 'javascript:void(0)'  ?>">
                    
                    <img src="<?php echo $cert['image'];?>"
                        class="max-w-px-340 max-h-px-150 xxl:max-w-px-280 xxl:max-h-px-140 w-100" alt="cert"
                        loading="lazy" width="100px" height="100px">
                </a>
                <?php } ?>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
    </div>
</section>