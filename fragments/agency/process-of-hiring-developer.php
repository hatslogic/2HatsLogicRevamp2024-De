<?php extract($section); ?>

<section class="hire-developer-agency">
    <div class="container">
        <div class="title">
            <?php if($headline): ?>
                <h2 class="h2"><?php echo $headline; ?></h2>
            <?php endif; ?>
        </div>
        <div class="content mt-60 xs:mt-30">
            <div class="flex md:wrap">
                <div class="col w-50 md:w-100 md:order-2 md:mt-40">
                    <div class="flex column gap-30 md:gap-20 max-w-70 md:max-w-100">
                        <?php if($steps): ?>
                            <?php foreach ($steps as $step): ?>    
                                <div class="card xs:w-100 flex align-start">
                                    <div class="wrap-icon min-w-px-60 xs:min-w-px-40">
                                        <?php if($step['icon']): ?>
                                            <img src="<?php echo $step['icon']['url'] ?>" alt="<?php echo $step['icon']['title'] ?>" loading="lazy" height="100px" width="100px">
                                        <?php endif; ?>      
                                    </div>
                                    <div class="info ml-20">
                                        <?php if($step['title']): ?>
                                            <h3 class="h4 transition font-bold"><?php echo $step['title']?></h3>
                                        <?php endif; ?>  
                                        <?php if($step['description']): ?>  
                                            <p class="mt-10"><?php echo $step['description']?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>      
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col w-50 md:w-100 md:order-1">
                    <?php if($image): ?>
                        <div class="img-wrap">
                            <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>" width="360" height="180" class="w-100">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php if($button): ?>
                <div class="btn-group center mt-60 xs:mt-40">
                    <a href="<?php echo $button['url'] ?>" class="btn btn-secondary"><?php echo $button['title'] ?></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>