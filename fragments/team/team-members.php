<?php extract($section); ?>

<section class="meet-our-team overflow-hidden">
    <div class="container">

        <?php if ($title || $content) { ?>
        <div class="title">
            <?php if ($title) { ?>
                <h2 class="mb-10"> <?php echo $title; ?> </h2>
            <?php } ?>
            <?php if ($content) { ?>
                <p> <?php echo $content; ?> </p>
            <?php } ?>
        </div>
        <?php } ?>
        
        <?php if ($select_members) { ?>
        <div class="content relative mt-60 xs:mt-30">
            <div class="grid grid-6 xl:grid-4 md:grid-3 xs:grid-2 cg-10 rg-40" id="members">
                <?php
                foreach ($select_members as $key => $item) {
                    if ($key > 35) {
                        break;
                    }
                    setup_postdata($item);
                    $formatted_key = sprintf('%02d', $key + 1);
                    $name = get_field('name', $item->ID);
                    $designation = get_field('designation', $item->ID);
                    $image = get_the_post_thumbnail_url($item->ID, 'img_250x330');
                    $image_id = get_post_thumbnail_id($item->ID);
                    ?>
                <div class="item">
                    <div class="card">
                        <div class="img bg-secondary">
                            
                            <?php
                                $cropOptions = [
                                    '(max-width: 768px)' => [163, 213],
                                    '(min-width: 769px)' => [246, 323],
                                ];
                    $attributes = ['class' => 'transition', 'loading' => 'lazy'];
                    ?>
                            <?php echo hatslogic_get_attachment_picture($image_id, $cropOptions, $attributes); ?>
                        </div>
                        <div class="info mt-10">
                            <?php if ($name) { ?>
                                <h3 class="h6 font-bold"><?php echo $name; ?></h3>
                            <?php } ?>
                            <?php if ($designation) { ?>
                                <div class="font-light fs-14 mt-3"><?php echo $designation; ?></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php
                }
            wp_reset_postdata();
            ?>
            </div>
            <div class="gradient-end-white h-px-300 w-100 block absolute bottom-0"></div>
        </div>
        <?php } ?>

        <div class="btn-group center mt-60"> 
            <a href="#" class="btn btn-secondary" id="view-all-members">View All</a>
        </div>
    </div>
</section>