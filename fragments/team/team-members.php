<?php extract($section); ?>

<section class="meet-our-team">
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
        <div class="content mt-60">
            <div class="grid grid-6 xxl:grid-5 xl:grid-4 md:grid-3 xs:grid-2 cg-10 rg-40">
                <?php 
                    foreach ($select_members as $key => $item):
                    setup_postdata($item);
                    $formatted_key = sprintf("%02d", $key + 1);
                    $name = get_field('name', $item->ID);
                    $designation = get_field('designation', $item->ID);
                    $image = get_the_post_thumbnail_url($item->ID, 'img_250x330');
                ?>
                <div class="item">
                    <div class="card">
                        <div class="img">
                            <picture>
                                <source srcset="<?php echo webp($image); ?>" type="image/webp">
                                <source srcset="<?php echo $image; ?>" type="">
                                <img src="<?php echo $image; ?>" loading="lazy" alt="<?php the_title_attribute(); ?>" width="250px" height="250px" class="transition">
                            </picture>
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
            <a href="#" class="btn btn-secondary">View All</a>
        </div>
    </div>
</section>