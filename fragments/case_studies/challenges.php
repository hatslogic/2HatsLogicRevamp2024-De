<?php extract($section); ?>
<section class="the-challenge pb-100 md:pb-60">
    <div class="container">
        <div class="title"> <span class="headline c-primary font-bold"><?php echo $headline['sub_title']; ?></span>
            <h2><?php echo $headline['title']; ?></h2>
        </div>
        <div class="content">
            <p><?php echo $content; ?></p>
            <?php if ($list): ?>
            <ul class="no-bullets split-2 mt-30 xs:split-1 xs:fs-14">
            <?php foreach ($list as $item): ?>
                <li class="mb-10 flex"><i class="icomoon icon-check_circle fs-16 c-primary mt-4"></i> 
                  <span class="ml-8"><?php echo $item['list_item']; ?></span>
                </li>
            <?php endforeach; ?>
            </ul>
            <?php endif; ?>

            <?php if ($facts): ?>
                <div class="facts mt-60">
                    <h3><?php echo $facts_title; ?></h3>
                    <div class="grid grid-5 xl:grid-4 md:grid-2 mt-30 gap-50 xs:gap-20">
                        <?php if ($facts): ?>
                            <?php foreach ($facts as $key => $fact):
                                $formatted_key = sprintf("%02d", $key + 1); ?>
                                <div class="col">
                                    <div class="item"> <span class="fs-80 opacity-20 font-thin -ml-6 xs:fs-44"><?php echo $formatted_key; ?></span>
                                      <p class="xs:fs-16"><?php echo $fact['fact']; ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>