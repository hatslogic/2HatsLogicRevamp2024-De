<?php extract($section); ?>
<?php $bg_class = $bg_enabled ? ' bg-light-grey pt-100 pb-100 xs:pt-80 xs:pb-80 ' : ' bg-white '; ?>
<?php if ($faqs): ?>
    <section class="faqs <?php echo $bg_class;?>">
        <div class="container">
            <?php if ($faq_title): ?>
                <div class="title">
                    <h2><?php echo $faq_title; ?></h2>

                </div>
            <?php endif; ?>

            <div class="content mt-40 xs:mt-20">
                <div class="acc">
                    <?php foreach ($faqs as $faq): ?>
                        <div class="acc-item py-20 b-0 bb-1 bc-hash solid">
                            <div class="acc-toggle flex justify-between relative">
                                <h3 class="max-w-80 h4"><?php echo $faq['question']; ?></h3>

                                <div class="wrap-icon absolute right-0 flex fs-30 xs:fs-20">
                                    <div class="icomoon icon-expand_circle_down add"></div>
                                    <div class="icomoon icon-expand_circle_up minus"></div>
                                </div>
                            </div>
                            <div class="acc-content">
                                <div class="inner w-60 xl:w-100">
                                    <p><?php echo $faq['answer']; ?></p>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>