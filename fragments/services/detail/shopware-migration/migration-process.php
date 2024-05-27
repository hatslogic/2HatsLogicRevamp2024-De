<?php extract($section); ?>
<?php if ($steps): ?>
<section class="migration-process pb-100 xs:pb-80">
                <div class="container">
                    <div class="title">
                         <h2><?php echo $title ?> </h2></div>
        <div class="content mt-60 md:mt-50 xs:mt-30">
            <div class="grid grid-3 md:grid-2 xs:grid-1 cg-100 rg-50 mt-60 md:gap-40 xs:gap-20">
                <?php foreach ($steps as $key => $step): 
                $formatted_key = sprintf("%02d", $key + 1);    
                ?>
                <div class="col">
                    <div class="item">
                        <span class="fs-100 opacity-20 font-thin -ml-6 xs:fs-80" role="presentation" aria-hidden="true"><?php echo $formatted_key ?></span>
                        <h4 class="h4 mt-15"><?php echo $step['title'] ?></h4>
                        <?php if($step['items']): ?>
                            <?php  foreach ($step['items'] as $item): ?>
                        <p><?php if($item['label']): ?><strong><?php echo $item['label'] ?>&colon;</strong><?php endif; ?> <?php echo $item['content'] ?></p>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
               <?php endforeach; ?>
    
            </div>
        </div>
    </div>
</section>
<?php endif; ?>