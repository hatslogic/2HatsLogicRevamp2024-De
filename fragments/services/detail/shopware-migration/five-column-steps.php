<?php extract($section); ?>
<section class="migration-steps pt-100 pb-100 xs:pt-80 xs:pb-80">
                <div class="container">
                    <div class="title">
                         <h2><?php echo $title; ?></h2>

                    </div>
                    <div class="content mt-60 md:mt-50 xs:mt-30">
                        <div class="grid grid-5 xl:grid-4 md:grid-2 gap-50 xs:gap-20">
                            <?php foreach ($steps as $key =>$step) :
                            $formatted_key = sprintf("%02d", $key + 1);    
                            ?>
                            <div class="col">
                                <div class="item"> <span class="fs-80 opacity-20 font-thin -ml-6 xs:fs-40"><?php echo $formatted_key; ?></span>

                                    <p class="xs:fs-16"><?php echo $step['step']; ?></p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>


