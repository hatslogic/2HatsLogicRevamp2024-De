<?php extract($section);?>
<section class="comparision">
    <div class="container">
        <?php if(!empty($heading)) { ?>
        <div class="title">
            <h2> <?php echo $heading; ?> </h2>
        </div>
        <?php } ?>
        
        <div class="content mt-40">
            <div class="grid grid-2 gap-120 xl:gap-60 md:grid-1 md:gap-40">
                <div class="col">
                    <?php if(!empty($table['column_1']['column_title'])) { ?>
                    <h3 class="h4"><?php echo $table['column_1']['column_title']; ?></h3>
                    <?php } ?>
                    <?php foreach($table['column_1']['values']  as $value){ ?>   
                    <?php if(!empty($value['row'])) { ?> 
                    <div class="info flex mt-30 xs:mt-20">
                        <div class="icon-wrap pt-5 c-primary"> <i class="icomoon icon-double-arrow"></i>

                        </div>
                        <div class="content ml-15">
                            <p class="mt-0 mb-0"><?php echo $value['row']; ?></p>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                </div>
                <div class="col">
                    <?php if(!empty($table['column_2']['column_title'])) { ?>
                        <h3 class="h4"><?php echo $table['column_2']['column_title']; ?></h3>
                    <?php } ?>

                    <?php foreach($table['column_2']['values']  as $value){ ?>   
                    <?php if(!empty($value['row'])) { ?> 
                    <div class="info flex mt-30 xs:mt-20">
                        <div class="icon-wrap pt-5 c-primary"> <i class="icomoon icon-double-arrow"></i>

                        </div>
                        <div class="content ml-15">
                            <p class="mt-0 mb-0"><?php echo $value['row']; ?></p>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>