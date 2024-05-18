<?php extract($section);?>
<section class="quote pb-100 xs:pb-80">
                <div class="container xs:p-0">
                    <div class="content">
                        <div class="w-100 shadow max-w-90 md:max-w-100 px-100 py-60 md:px-30 md:py-30 m-auto b-1 solid bc-light-grey xs:pt-40">
                            <blockquote class="font-quote w-100 m-0 fs-20 lh-1-5"><?php echo $quote;?></blockquote>
                            <div class="flex justify-between align-end md:wrap md:justify-end">
                                <div class="avatar-wrap flex mt-30 align-center md:w-100 md:mb-20">
                                    <div class="img-wrap w-px-75 h-px-75 max-w-px-75 min-w-px-75 xs:w-px-50 xs:h-px-50 xs:max-w-px-50 xs:min-w-px-50 over border-radius-100 overflow-hidden">
                                        <img src="<?php echo  $avatar['sizes']['img_100x100']; ?>" alt="CEO" width="100" height="100">
                                    </div>
                                    <div class="author ml-20">
                                        <div class="author-name font-bold"><?php echo $name; ?></div> <span class="designation font-light fs-15 lh-1-2 mt-5 inline-block"><?php echo $desig; ?></span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>