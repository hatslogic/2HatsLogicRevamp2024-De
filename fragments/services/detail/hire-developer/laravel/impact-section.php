<?php extract($section); ?>

<?php if ($items): ?>
   
    <section class="impact relative pt-100 pb-100 sm:pt-80 sm:pb-80 bg-white b-0 bt-1 solid bc-hash">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/background/world-map-dot.svg" alt="world-map-dot" height="100" width="100" fetchpriority="high"
             class="absolute z-0 inset-0 my-auto w-auto mx-auto max-h-90 max-w-90">
        <div class="container relative z-1">
            <div class="content mt-50 gap-40 sm:mt-30">
                <div class="flex nowrap sm:wrap justify-between scroll-x">
                    <?php foreach ($items as $key => $item): ?>
                        <?php 
                        
                        $is_last_item = ($key === array_key_last($items));
                        
                        
                        $outer_col_class = $is_last_item ? 'col sm:w-50 pr-40 sm:pr-20 fs-55 sm:fs-44' : 'col sm:w-50 pr-40 sm:pr-20';
                        $inner_div_class = $is_last_item ? 'count font-light c-pigment' : 'count font-light c-pigment fs-55 sm:fs-44';
                        ?>
                        <div class="<?php echo $outer_col_class; ?>">
                            <div class="<?php echo $inner_div_class; ?>">
                                <span class="digit transition" data-target="<?php echo esc_attr($item['count']); ?>">0</span><?php echo $item['suffix']; ?>
                            </div>
                            <p class="mt-10 lh-1-25"><small><?php echo esc_html($item['label']); ?></small></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
