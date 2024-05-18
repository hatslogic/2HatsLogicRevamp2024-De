<?php extract($section); ?>

<section class="the-problem pb-100 md:pb-60">
                <div class="container">
                    <div class="title"> <span class="headline c-primary font-bold"><?php echo $headline['sub_title'] ?></span>

                    <h2><?php echo $headline['title'] ?></h2>

                    </div>
                    <div class="content">
                    <p><?php echo $content; ?></p>
                        <div class="btn-group flex justify-center mt-60"> <a href="<?php echo $cta['url'] ?>" class="btn btn-secondary"><?php echo $cta['title'] ?></a>

                        </div>
                    </div>
                </div>
            </section>