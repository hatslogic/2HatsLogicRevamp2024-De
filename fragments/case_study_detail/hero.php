<?php extract($section); ?>
<section class="case-study-hero mt-40">
    <div class="container">
        <div class="banner-block relative">
            <div class="img-wrap relative">
                <?php if (!empty($image)) { ?>
                <?php
            $mobile_aspectratio = [390, 200];
                    if ($mobile_image) {
                        $mobile_aspectratio = [390, 200, $mobile_image['ID']];
                    }
                    $cropOptions = [
                        '(max-width: 768px)' => $mobile_aspectratio,
                        '(min-width: 769px)' => [1152, 592],
                    ];

                    $attributes = ['class' => 'h-auto w-100', 'loading' => 'eager', 'fetchPriority' => 'high'];
                    ?>
                <?php echo hatslogic_get_attachment_picture($image['ID'], $cropOptions, $attributes); ?>
                <?php }?>
                <?php if (!empty($technologies_used)) { ?>
                <div
                    class="technologies col b-0 bl-1 solid bc-white pl-40 py-10 flex align-start md:justify-center column md:row md:pl-0 md:bl-0 cg-30 md:cg-20 rg-30 absolute z-2 right-60 md:right-0 md:left-0 bottom-100 md:bottom-20 md:mt-40">
                    <?php foreach ($technologies_used as $tech) { ?>
                    <a href="<?php echo $tech['link']; ?>">
                        <img src="<?php echo $tech['image']; ?>" alt="technologies"
                            class="max-w-px-140 max-h-px-35 xs:max-h-px-22 xs:max-w-px-100 w-100 h-auto" width="200px"
                            height="60px">
                    </a>
                    <?php } ?>
                </div>
                <?php } ?>
                <div class="img-overlay absolute h-100 w-100 top-0 z-1"></div>
            </div>
            <div
                class="content-wrap h-100 w-100 c-white md:c-secondary absolute top-0 md:relative h-100 w-100 z-2 flex align-end p-60 md:p-0 md:mt-40">
                <div class="headline-content">
                    <div class="title">
                        <?php
                            $categories = get_the_terms(get_the_ID(), 'category');
if ($categories && !is_wp_error($categories)) { ?>
                        <span class="headline font-bold"><?php echo esc_html($categories[0]->name); ?></span>
                        <?php } ?>

                        <h1 class="h1-sml mt-20">
                            <?php
                        if ($title) {
                            echo $title;
                        } else {
                            echo get_the_title();
                        } ?>
                        </h1>
                        <?php if ($short_description) { ?>
                        <p><?php echo $short_description; ?></p>
                        <?php } ?>
                        <div class="actions flex gap-15">
                            <div class="action-btn btn-share">
                                <div class="dropdown relative"> <a href="#"
                                        class="share bg-white md:bg-secondary b-0 p-10 radius-50 fs-18 flex align-center justify-center h-px-45 w-px-45 c-secondary md:c-white hover:c-white hover:bg-primary">
                                        <i class="icon icon-share"></i>
                                    </a>

                                    <div
                                        class="dropdown-content fs-14 bg-white transition b-1 solid bc-hash absolute left-0 top-60 z-1 min-w-px-120">
                                        <a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>"
                                            target="_blank"
                                            class="flex align-center p-10 hover:bg-primary hover:c-white">
                                            <i class="icomoon icon-facebook"></i> <span class="ml-10">Facebook</span>
                                        </a>
                                        <a href="https://www.linkedin.com/cws/share?url=<?php echo get_permalink(); ?>"
                                            target="_blank"
                                            class="flex align-center p-10 hover:bg-primary hover:c-white b-0 bt-1 bc-hash solid">
                                            <i class="icomoon icon-linkedin"></i> <span class="ml-10">LinkedIn</span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <!-- <div class="action-btn btn-bookmark"> <a href="#"
                                    class="bookmark bg-white xs:bg-secondary b-0 p-10 radius-50 fs-18 flex align-center justify-center h-px-45 w-px-45 c-secondary xs:c-white hover:c-white hover:bg-primary">
                                    <i class="icon icon-bookmark"></i>
                                </a>

                            </div> -->
                        </div>
                    </div>
                    <div class="technologies xs:mt-40 hidden">&nbsp;

                    </div>
                </div>
            </div>
            <div class="img-overlay absolute h-100 w-100 top-0 z-1 xs:hidden"></div>
        </div>
    </div>
</section>