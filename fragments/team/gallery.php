<?php extract($section); ?>

<section class="meet-our-team">
    <div class="container">
        <?php if ($title || $content): ?>
            <div class="title  text-center">
                <?php if ($title): ?>
                    <h2> <?php echo $title; ?> </h2>
                <?php endif; ?>
                <?php if ($content): ?>
                    <p> <?php echo $content; ?> </p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if ($images): ?>
            <div class="content mt-60">
                <div class="split-3 xs:split-2 xs:gap-5 xs:split-1 gap-20">
                    <?php
                    foreach ($images as $key => $item): ?>

                        <?php
                        if ($key == 0):
                            $image_url = $item['sizes']['img_500x611'];
                            ?>
                            <div class="col break-in:ac">
                                <div class="album">
                                    <picture>
                                        <source srcset="<?php echo webp($image_url); ?>" type="image/webp">
                                        <source srcset="<?php echo $image_url; ?>" type="<?php echo $item['mime_type']; ?>">
                                        <img src="<?php echo $image_url; ?>" loading="lazy" alt="album-01" width="500px"
                                            height="611px" class="transition">
                                    </picture>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php
                        if ($key == 1):
                            $image_url = $item['sizes']['img_500x288'];
                            ?>
                            <div class="col break-in:ac mt-20 xs:mt-5">
                                <div class="album">
                                    <picture>
                                        <source srcset="<?php echo webp($image_url); ?>" type="image/webp">
                                        <source srcset="<?php echo $image_url; ?>" type="<?php echo $item['mime_type']; ?>">
                                        <img src="<?php echo $image_url; ?>" loading="lazy" alt="album-01" width="500px"
                                            height="288px" class="transition">
                                    </picture>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php
                        if ($key == 2):
                            $image_url = $item['sizes']['img_500x286'];
                            ?>
                            <div class="col break-in:ac mt-20 xs:mt-5">
                                <div class="album">
                                    <picture>
                                        <source srcset="<?php echo webp($image_url); ?>" type="image/webp">
                                        <source srcset="<?php echo $image_url; ?>" type="<?php echo $item['mime_type']; ?>">
                                        <img src="<?php echo $image_url; ?>" loading="lazy" alt="album-01" width="500px"
                                            height="286px" class="transition">
                                    </picture>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php
                        if ($key == 3):
                            $image_url = $item['sizes']['img_500x613'];
                            ?>
                            <div class="col break-in:ac xs:mt-5">
                                <div class="scroll-down h-px-100 justify-start flex column align-center rg-12 hidden">
                                    <span class="block">Scroll Down for More</span>
                                    <i class="icomoon fs-22 icon-expand_circle_down"></i>
                                </div>
                                <div class="album">
                                    <picture>
                                        <source srcset="<?php echo webp($image_url); ?>" type="image/webp">
                                        <source srcset="<?php echo $image_url; ?>" type="<?php echo $item['mime_type']; ?>">
                                        <img src="<?php echo $image_url; ?>" loading="lazy" alt="album-01" width="500px"
                                            height="613px" class="transition">
                                    </picture>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php
                        if ($key == 4):
                            $image_url = $item['sizes']['img_500x599'];
                            ?>
                            <div class="col break-in:ac mt-20 xs:mt-5">
                                <div class="album">
                                        <picture>
                                            <source srcset="<?php echo webp($image_url); ?>" type="image/webp">
                                            <source srcset="<?php echo $image_url; ?>" type="<?php echo $item['mime_type']; ?>">
                                            <img src="<?php echo $image_url; ?>" loading="lazy" alt="album-01" width="500px"
                                                height="599px" class="transition">
                                        </picture>
                                </div>
                            </div>
                        <?php endif; ?>


                        <?php
                        if ($key == 5):
                            $image_url = $item['sizes']['img_500x611'];
                            ?>
                            <div class="col break-in:ac xs:mt-5">
                                <div class="album">
                                    <picture>
                                        <source srcset="<?php echo webp($image_url); ?>" type="image/webp">
                                        <source srcset="<?php echo $image_url; ?>" type="<?php echo $item['mime_type']; ?>">
                                        <img src="<?php echo $image_url; ?>" loading="lazy" alt="album-01" width="500px"
                                            height="611px" class="transition">
                                    </picture>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php
                        if ($key == 6):
                            $image_url = $item['sizes']['img_500x286'];
                            ?>
                            <div class="col break-in:ac mt-20 xs:mt-5">
                                <div class="album">
                                    <picture>
                                        <source srcset="<?php echo webp($image_url); ?>" type="image/webp">
                                        <source srcset="<?php echo $image_url; ?>" type="<?php echo $item['mime_type']; ?>">
                                        <img src="<?php echo $image_url; ?>" loading="lazy" alt="album-01" width="500px"
                                            height="286px" class="transition">
                                    </picture>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php
                        if ($key == 7):
                            $image_url = $item['sizes']['img_238x288'];
                            ?>
                            <div class="col break-in:ac mt-20 xs:mt-5 flex cg-20 xs:cg-5">
                            <div class="album">
                                <picture>
                                    <source srcset="<?php echo webp($image_url); ?>" type="image/webp">
                                    <source srcset="<?php echo $image_url; ?>" type="<?php echo $item['mime_type']; ?>">
                                    <img src="<?php echo $image_url; ?>" loading="lazy" alt="album-01" width="238px"
                                        height="288px" class="transition">
                                </picture>
                            </div>
                        <?php endif; ?>
                        
                        <?php
                        if ($key == 8):
                            $image_url = $item['sizes']['img_238x288'];
                            ?>
                            <div class="album">
                                <a href="#" class="w-100 h-100 relative">
                                    <div
                                        class="overlay absolute h-100 w-100 c-white flex column gap-10 align-center justify-center">
                                        <i class="icomoon fs-28 icon-plus"></i>
                                        <span>See More</span>
                                    </div>
                                    <picture>
                                        <source srcset="<?php echo webp($image_url); ?>" type="image/webp">
                                        <source srcset="<?php echo $image_url; ?>" type="<?php echo $item['mime_type']; ?>">
                                        <img src="<?php echo $image_url; ?>" loading="lazy" alt="album-01" width="238px"
                                            height="288px" class="transition">
                                    </picture>
                                </a>
                            </div>
                        </div>
                        <?php endif; ?>

                    <?php endforeach; ?>


                </div>
            </div>
        <?php endif; ?>
    </div>
</section>