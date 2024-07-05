<?php extract($section); ?>

<section class="hero pt-60">
        <div class="container">
          <div class="flex align-center justify-between md:wrap">
            <div class="col w-50 md:w-100">
              <div class="headline">
                <?php if ($headline['title']): ?>
                    <h1 class="h1-sml"><?php echo $headline['title'] ?></h1>
                <?php endif; ?>
                <?php if ($headline['subtitle']): ?>
                    <h2 class="h4 mt-15"><?php echo $headline['subtitle'] ?></h2>
                <?php endif; ?>
                <?php if ($content): ?>
                    <p class="mt-30"><?php echo $content ?></p>
                <?php endif; ?>

                <?php if ($button): ?>
                    <div class="btn-group mt-40">
                        <a href="<?php echo $button['url']; ?>" class="btn btn-primary"><?php echo $button['title']; ?></a>
                    </div>
                <?php endif; ?>
              </div>
            </div>

            <?php if ($image): ?>
                <div class="col w-40 md:w-100 md:mt-40">
                    <picture>
                        <source srcset="<?php echo webp($image['sizes']['img_648x445']); ?>" type="image/webp">
                        <source srcset="<?php echo $image['sizes']['img_648x445']; ?>" type="image/jpg">
                        <img src="<?php echo $image['sizes']['img_648x445']; ?>" loading="lazy" alt="Agency" width="648px"
                            height="445px" class="transition">
                    </picture>
                </div>
            <?php endif; ?>
            
          </div>
        </div>
      </section>