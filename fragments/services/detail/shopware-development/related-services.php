<?php extract($section); ?>

<section class="related-services">
    <div class="container">
        <?php if($title): ?>
        <div class="title">
            <h2><?php echo $title; ?></h2>
        </div>
        <?php endif; ?>
        <?php if($services): ?>
        <div class="content mt-50">
            <div class="grid grid-4 gap-40 md:grid-2 xs:grid-1 md:gap-30 xs:gap-20">
                <?php 
                foreach($services as $service):
                ?>
                <a href="<?php echo get_the_permalink($service); ?>" class="flex align-center justify-center b-1 c-secondary hover:c-primary solid bc-hash hover:bc-primary p-20 text-center font-bold transition">
                    <?php echo get_the_title($service); ?>
                </a>
                <?php endforeach; ?>
            </div>  
        </div>
        <?php endif; ?>
    </div>
</section>