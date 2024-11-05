<?php extract($section); ?>

<section class="faqs">
    <div class="container">
        <?php if ($title || $description): ?>
            <div class="title">
                <h2><?php echo $title; ?></h2>

                <p><?php echo $description; ?></p>
            </div>
        <?php endif; ?>
        <?php if ($faqs): ?>
            <div class="content mt-40 xs:mt-20">
                <div class="acc">
                    <?php foreach ($faqs as $faq): ?>
                        <div class="acc-item py-20 b-0 bb-1 bc-hash solid">
                            <div class="acc-toggle flex justify-between relative md:pr-0">
                                <h3 class="max-w-80 h6"><?php echo $faq['question']; ?></h3>

                                <div class="wrap-icon absolute right-0 flex fs-30 xs:fs-20">
                                    <div class="icomoon icon-expand_circle_down add"></div>
                                    <div class="icomoon icon-expand_circle_up minus"></div>
                                </div>
                            </div>
                            <div class="acc-content">
                                <div class="inner w-90 xl:w-100">
                                    <p><?php echo $faq['answer']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>