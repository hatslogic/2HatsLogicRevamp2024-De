<?php extract($section); ?>

<div class="info mb-40" name="section-<?php echo ($identifier) ? $identifier : '0'; ?>">
    <?php if($image): ?>
        <picture>
            <source srcset="<?php echo esc_url($image['url']); ?>" type="image/webp">
            <source srcset="<?php echo esc_url($image['url']); ?>" type="image/jpg">
            <img src="<?php echo esc_url($image['url']); ?>" loading="lazy" alt="<?php the_title_attribute()?>" width="751px" height="226px" class="transition">
        </picture>
    <?php endif; ?>
</div>