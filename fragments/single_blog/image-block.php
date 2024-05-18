<?php extract($section); ?>

<div class="info mb-40 md:mb-20" name="section-<?php echo $identifier; ?>">
           <picture>
               <source srcset="<?php echo esc_url($image['url']); ?>" type="image/webp">
               <source srcset="<?php echo esc_url($image['url']); ?>" type="image/jpg">
               <img src="<?php echo esc_url($image['url']); ?>" loading="lazy" alt="<?php the_title_attribute()?>" width="751px" height="226px"
                   class="transition">
           </picture>
</div>