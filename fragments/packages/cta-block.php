<?php extract($section); ?>

<section class="enterprise-cta">
    <div class="container">
        <div class="enterprise-cta-content bg-light-grey w-100 md:px-20 py-30 px-50 py-60">
            <?php if ($headline['title']) : ?>
            <div class="title text-center">
                <h3><?php echo $headline['title']; ?></h3>
                <?php if ($content) : ?>
                    <p><?php echo $content; ?></p>
                <?php endif; ?>
                <div class="btn-group mt-40">
                    <?php 
                    if($action === 'link') :
                    ?>
                    <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>" class="btn orange-btn" aria-label="get a quote">
                        <?php echo $button['title']; ?>
                    </a>
                    <?php endif;
                    ?>

                    <?php 
                    if($action === 'modal' && $modal) : 
                    ?>
                    <button onclick="openModal('<?php echo $modal['value']; ?>')" aria-label="<?php echo $modal['label']; ?>" class="btn orange-btn">
                        CONTACT
                    </button>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>