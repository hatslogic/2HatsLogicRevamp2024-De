<?php extract($section); ?>

<section class="services bg-light-grey pt-100 pb-100 xs:pt-80 xs:pb-80">
    <div class="container">
        <div class="gap flex xs:wrap justify-between">
            <?php if($sticky['headline']): ?>
            <div class="col relative">
                <div class="sticky top-200">
                    <div class="title">
                        <?php if($sticky['headline']['sub_title']): ?>
                            <span class="headline c-primary font-bold">
                                <?php echo $sticky['headline']['sub_title']; ?>
                            </span>
                        <?php endif; ?>
                        <?php if($sticky['headline']['title']): ?>
                            <h2><?php echo $sticky['headline']['title']; ?></h2>
                        <?php endif; ?>
                    </div>
                    <div class="content">
                        <?php if($sticky['content']): ?>
                            <p><?php echo $sticky['content']; ?></p>
                        <?php endif; ?>
                        <?php if($sticky['link']): ?>
                            <a href="<?php echo $sticky['link']['url']; ?>" target="<?php echo ($sticky['link']['target'])? $sticky['link']['target'] : '_self'; ?>" aria-label="<?php echo $sticky['link']['title']; ?>" class="btn btn-primary-outline"><?php echo $sticky['link']['title']; ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            
            <?php if($items): ?>
            <div class="col ml-100 xs:ml-0 xs:mt-80 scroll-snap">
                <?php
                    foreach ($items as $key => $item) :
                    $classes = ($key == count($items) - 1) ? 'xs:pt-60 xs:pb-0' : 'pb-150 xs:pt-60 xs:pb-60';
                ?>
                    <div class="service relative pt-150 <?php echo $classes; ?>">
                        <?php if($item['title']): ?>
                        <div class="title">
                            <h3><?php echo $item['title']; ?></h3>
                        </div>
                        <?php endif; ?>
                        
                        <?php if($item['content'] || $item['link']): ?>
                        <div class="content">
                            <?php echo apply_filters('the_content', $item['content']); ?>
                            <?php if($item['link']): ?>
                                <a href="<?php echo $item['link']['url']; ?>" target="<?php echo ($item['link']['target'])? $item['link']['target'] : '_self'; ?>" aria-label="<?php echo $item['link']['title']; ?>" class="link link-primary">
                                    <?php echo $item['link']['title']; ?> <i class="icomoon icon-chevron_right"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>