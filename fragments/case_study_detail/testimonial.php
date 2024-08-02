<?php extract($section); ?>
<section class="testimonial-case-study">
    <div class="container xs:p-0 xs:m-0">
        <div class="max-w-75 xs:max-w-100 mx-auto bg-light-grey p-60 xs:px-20">
            <div class="top flex justify-between align-center mb-20">
                <?php if (!empty($image)) {?>
                <img class="order-2 max-w-px-80 max-h-px-40 md:max-w-px-60 md:max-h-px-30"
                    src="<?php echo $image['sizes']['img_100x100']; ?>" alt="nike" loading="lazy" width="100" height="100">
                 <?php } ?>   
                <?php if ($headline) {?> 
                <span class="service font-bold c-primary order-1 fs-14 uppercase"><?php echo $headline; ?></span>
                <?php } ?>    
            </div>
            <?php if (!empty($content)) {?>
            <blockquote class="font-quote m-0 fs-22 lh-1-25 sm:fs-18 sm:lh-1-24"> 
                <?php echo $content; ?>
            </blockquote>
            <?php }?>  
            <?php if (!empty($author)) { ?>  
            <div class="author mt-30">
                <div class="author-name fs-18 font-bold"><?php echo $author; ?></div> <span
                    class="designation font-light fs-15 lh-1-2 mt-5 inline-block"><?php echo $details; ?></span>
            </div>
            <?php } ?>
        </div>
    </div>
</section>