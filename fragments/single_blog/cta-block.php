<?php extract($section); ?>

<?php if ($title && $cta): ?>
    <div class="info font-bold py-60 px-130 md:py-40 md:px-20 bg-light-grey mb-40">
        <?php if($title): ?>
        <span class="w-100 fs-26 xs:fs-22 lh-1-25 tr text-center mb-30 block md:mb-20">
            <?php echo $title;?>
        </span>
        <?php endif; ?>
        <?php if($cta): ?>
        <div class="w-100 flex justify-center">
            <a href="<?php echo $cta['url']; ?>" class="btn btn-secondary"><?php echo $cta['title']; ?></a>
        </div>
        <?php endif; ?>
    </div>
<?php endif; ?>