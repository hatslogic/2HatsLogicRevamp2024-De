<?php extract($section); ?>

<section class="services bg-light-grey pt-100 pb-100 xs:pt-80 xs:pb-80">
    <div class="container">
        <div class="gap flex xs:wrap justify-between">
            <?php if ($sticky['headline']): ?>
                <div class="col relative">
                    <div class="sticky headline pb-0">
                        <div class="title">
                            <?php if ($sticky['headline']['sub_title']): ?>
                                <span class="headline c-primary font-bold"><?php echo $sticky['headline']['sub_title']; ?></span>
                            <?php endif; ?>
                            <?php if ($sticky['headline']['title']): ?>
                                <h2><?php echo $sticky['headline']['title']; ?></h2>
                            <?php endif; ?>
                        </div>
                        <div class="content">
                            <?php if ($sticky['content']): ?>
                                <p><?php echo $sticky['content']; ?></p>
                            <?php endif; ?>
                            <?php if ($sticky['link']): ?>
                                <a href="<?php echo $sticky['link']['url']; ?>"
                                    aria-label="<?php echo $sticky['headline']['title']; ?>"
                                    class="btn btn-primary-outline"><?php echo $sticky['link']['title']; ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($items): ?>
                <div class="col ml-100 xs:ml-0 xs:mt-60 relative">
                    <?php foreach ($items as $key => $item):
                        $formatted_key = sprintf("%02d", $key + 1);
                        $classes = ($key == count($items) - 1) ? 'pt-0 pb-0 xs:pt-0 xs:pb-0' : 'pt-0 pb-200 xs:pt-0 xs:pb-40';
                        ?>
                        <div class="service bg-light-grey relative top-0 pl-50 xs:pl-0 <?php echo $classes; ?>">
                            <span class="counter fs-280 xs:fs-80 font-thin relative lh-1 -mb-80 c-hash opacity-30 -left-50 -top-50 xs:-left-10 xs:-top-0"><?php echo $formatted_key ?></span>
                            <?php if ($item['title']): ?>
                                <div class="title -mt-100 xs:mt-0">
                                    <h3><?php echo $item['title']; ?></h3>
                                </div>
                            <?php endif; ?>
                            <?php if ($item['content'] || $item['link']): ?>
                                <div class="content">
                                    <?php echo apply_filters('the_content', $item['content']); ?>
                                    <?php if ($item['link']): ?>
                                        <a href="<?php echo $item['link']['url']; ?>" aria-label="<?php echo $item['title']; ?>" class="link link-primary"><?php echo $item['link']['title']; ?> 
                                         <i class="icomoon icon-chevron_right"></i>
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