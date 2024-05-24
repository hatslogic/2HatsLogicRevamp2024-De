<?php extract($section); ?>
<section class="expertise pb-100 xs:pb-80">
    <div class="container">
        <div class="flex justify-between md:wrap">
            <div class="col w-40 md:w-100"> <a href="<?php echo $link; ?>" target="_blank">
                    <img src="<?php echo $image['url']; ?>" class="w-100 md:w-80" alt="shopware-partner" loading="lazy"
                        width="100" height="100">
                </a>

            </div>
            <div class="col ml-60 sm:ml-0 w-60 md:w-100 md:mt-60 xs:mt-40">
                <h2><?php echo $title ?></h2>

                <p><?php echo $description ?></p>

                <ul class="no-bullets split-2 sm:split-1 fs-20 lh-1-2 mt-40 sm:fs-16">
                    <?php foreach ($lists as $key => $list): ?>
                        <li class="relative block <?php echo ($key >= 1) ? ' mt-20 xs:mt-15' : ''; ?>"><i
                                class="icomoon icon-priority fs-15 absolute left-0 top-6"></i>
                            <span class="inline-block ml-30"><?php echo $list['list_item'] ?></span>
                        </li>

                    <?php endforeach; ?>

                </ul>
            </div>
        </div>
    </div>
</section>