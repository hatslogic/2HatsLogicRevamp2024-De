<?php extract($section); ?>

<?php if ($title && $cta): ?>
    <div class="info font-bold py-60 px-130 md:py-40 md:px-20 bg-dark-primary c-white mb-40">
        <?php if ($title): ?>
            <div class="max-w-60 xs:max-w-100 mx-auto">
                <h3 class="h3 text-center block mb-30 md:mb-20">
                <?php echo $title; ?>
                </h3>
            </div>
        <?php endif; ?>
        <?php if ($cta): ?>
            <div class="w-100 flex justify-center">
                <a href="<?php echo $cta['url']; ?>" class="btn btn-primary"><?php echo $cta['title']; ?></a>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>