<?php extract($section); ?>

<section class="meet-our-team overflow-hidden">
    <div class="container">

        <?php if($title || $content): ?>
        <div class="title">
            <?php if($title): ?>
                <h2> <?php echo $title; ?> </h2>
            <?php endif; ?>
            <?php if($content): ?>
                <p> <?php echo $content; ?> </p>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        
        <?php if ($select_members): ?>
        <div class="content mt-60 xs:mt-30">
            <div class="grid grid-6 xl:grid-4 md:grid-3 xs:grid-2 cg-10 rg-40" id="members">
                <?php 
                foreach ($select_members as $key => $item):
                if($key > 23) break;
                setup_postdata($item);
                $formatted_key = sprintf("%02d", $key + 1);
                $name = get_field('name', $item->ID);
                $designation = get_field('designation', $item->ID);
                $image = get_the_post_thumbnail_url($item->ID, 'img_250x330');
                $image_id = get_post_thumbnail_id($item->ID);
                ?>
                <div class="item">
                    <div class="card">
                        <div class="img bg-secondary">
                            <?php $cropOptions = [
                                    "fallbackimage-size" => [250,330],
                                    "fallbackimage-class" => "transition",
                                    'aspect-ratio' => [185,243]
                                    ];?>
                            <?php display_responsive_image($image_id,$cropOptions) ?>
                        </div>
                        <div class="info mt-10">
                            <?php if($name): ?>
                                <h3 class="h5 font-bold"><?php echo $name; ?></h3>
                            <?php endif; ?>
                            <?php if($designation): ?>
                                <div class="font-light fs-14 mt-3"><?php echo $designation; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php 
                endforeach;
                wp_reset_postdata();
                ?>
            </div>
        </div>
        <?php endif; ?>

        <div class="btn-group center mt-60"> 
            <a href="#" class="btn btn-secondary" id="view-all-members">View All</a>
        </div>
    </div>
</section>