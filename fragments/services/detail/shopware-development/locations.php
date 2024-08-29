<?php extract($section);?>
<section class="locations">
    <div class="container">
        <?php if(!empty($heading)) { ?>
        <div class="title">
            <h2><?php echo $heading;?></h2>

        </div>
        <?php } ?>
        <div class="content mt-60">
            <div class="grid grid-5 md:grid-2 gap-30 xl:gap-20">
                <?php foreach($locations as $location) { ?>
                <div class="col"> 
                    <a href="<?php echo $location['cta']['url'] ? $location['cta']['url'] : "javascript:void(0)" ?>" class="c-secondary hover:c-primary">
                        <div class="item bg-light-grey">
                            
                            <?php
                            $cropOptions = [
                                '(max-width: 768px)' => [185, 126],
                                '(min-width: 769px)' => [207, 141],
                            ];
                            $attributes = ['alt' => $location['title'] ? $location['title'] : 'Location' , 'loading' => 'lazy', 'picturetag_class' => 'loader'];
                            echo hatslogic_get_attachment_picture($location['thumbnail'], $cropOptions, $attributes);
                            ?>
                            <?php if(!empty($location['title'])) { ?>
                            <h3 class="h4 px-30 py-20 text-center fs-18 xs:fs-16 xs:py-15 xs:px-15"><?php echo $location['title'] ?></h3>
                             <?php } ?>   
                        </div>
                    </a>

                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>