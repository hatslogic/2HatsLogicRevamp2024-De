<?php extract($section); ?>
<?php if($items):?>
<?php foreach ($items as $key => $item) : ?>
<div class="info mb-40 md:mb-20">
            <h4 class="flex"><i class="icomoon icon-arrow_right c-primary fs-17 mr-5 lh-1-5"></i><?php echo $item['title']; ?></h4>
            <p> <?php echo $item['content']; ?> 
            </p>
<?php endforeach; ?>
        </div>
<?php endif; ?>