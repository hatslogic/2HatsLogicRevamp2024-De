<?php extract($section); ?>
<section class="hero py-100 xs:py-80 b-0 bb-1 bc-hash solid">
    <div class="container">
        <div class="flex align-center justify-between md:wrap xl:column">
            <div class="col w-50 xl:w-100">
                <div class="service-header">
                    <div class="title">
                        <?php
                        $categories = get_the_terms(get_the_ID(), 'category');
                        if ($categories && !is_wp_error($categories)):

                        ?>
                        <span class="headline block c-primary font-bold mb-10"><?php echo esc_html($categories[0]->name); ?></span>
                        <?php endif; ?>
                        <h1 class="h1-sml"><?php
                        if ($title):
                            echo $title;
                        else:
                            echo get_the_title();
                        endif; ?>
                        </h1>
                        <?php if ($description): ?>
                            <p class="mt-30"><?php echo $description; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if ($counter): ?>
                <div class="col w-40 xl:w-100 md:mt-40 xl:mt-40">
                    <div class="grid grid-2 gap-20 xs:gap-10 justify-between scroll-x xs:flex">
                        <?php foreach ($counter as $key => $count): ?>
                            <div class="col xs:w-33">
                                <div class="count fs-44 xs:fs-32 font-regular c-secondary"><span class="digit transition"
                                        data-target="<?php echo $count['count']; ?>"><?php echo $count['count']; ?></span><?php echo $count['suffix']; ?>
                                </div>
                                <p class="mt-10 xs:fs-12 lh-1-25"><small><?php echo $count['label']; ?></small>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <?php if ($technologies_used): ?>
            <div class="flex xs:wrap align-center justify-start mt-60 md:mt-40">
                <?php foreach ($technologies_used as $key => $technology_used): ?>
                    <div class="col w-25 xs:w-50<?php echo ($key >= 2) ? ' xs:mt-20' : ''; ?>">
                        <img src="<?php echo esc_url($technology_used['image']['url']); ?>" alt="<?php echo esc_attr($technology_used['image']['title']); ?>" width="100" height="100" class="w-50">
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>