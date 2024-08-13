<?php extract($section); ?>
<section class="quote pb-100 xs:pb-80">
    <div class="container">
        <div class="content">
            <div class="w-100 shadow max-w-90 md:max-w-100 px-100 py-60 md:px-20 md:py-30 m-auto b-1 solid bc-light-grey xs:pt-40">
                <blockquote class="font-quote w-100 m-0 fs-20 lh-1-5"><?php echo $quote; ?></blockquote>
                <?php if($name || $desig): ?>
                <div class="flex justify-between align-end md:wrap md:justify-end">
                    <div class="avatar-wrap flex align-center mt-30 md:w-100 md:mb-20">
                        <?php if($avatar): ?>
                        <div class="img-wrap bg-light-grey w-px-75 h-px-75 max-w-px-75 min-w-px-75 xs:w-px-50 xs:h-px-50 xs:max-w-px-50 xs:min-w-px-50 over border-radius-100 overflow-hidden">
                            <?php
                                $cropOptions = [
                                    '(max-width: 768px)' => [34, 34],
                                    '(min-width: 769px)' => [90, 90],
                                ];
                                $attributes = ['class' => 'transition', 'loading' => 'eager', 'fetchPriority' => 'high'];
                                echo hatslogic_get_attachment_picture($avatar['ID'], $cropOptions, $attributes);
                            ?>
                        </div>
                        <?php endif; ?>
                        <div class="author ml-20">
                            <div class="author-name fs-18 font-bold"><?php echo $name; ?></div> 
                            <span class="designation font-light fs-15 lh-1-2 mt-5 inline-block"><?php echo $desig; ?></span>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>