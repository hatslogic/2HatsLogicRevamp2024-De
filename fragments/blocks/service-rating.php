
<?php if ($review['rating'] || $review['score']): ?>
    <div class="service-rating flex align-center gap-20 xs:wrap xs:gap-10">
    <?php if (!empty($review['rating'])): ?>    
    <div class="logo flex gap-10">
            <img src="<?php echo $review['platform']['url'] ?>" class="w-px-100" alt="google" width="100"
                height="35">
            <img src="<?php echo $review['rating']['url'] ?>" alt="star" class="w-px-80" width="80"
                height="35">
    </div>
    <?php endif; ?>
    <?php if (!empty($review['score'])): ?>
            <div class="label fs-20 xs:fs-14 xs:w-100">
                <?php echo esc_html($review['score']); ?>
                <?php if (!empty($review['total'])): ?>
                    based on <span class="c-primary"><?php echo esc_html($review['total']); ?> reviews</span>
                <?php endif; ?>
            </div>
    <?php endif; ?>

    </div>
<?php endif; ?>