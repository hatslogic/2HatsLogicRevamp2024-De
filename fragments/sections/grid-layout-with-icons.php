<?php extract($section); ?>
<?php $bg_class = $bg_enabled ? ' bg-light-grey pt-100 pb-100 xs:pt-80 xs:pb-80 ' : ' bg-white '; ?>
<?php if ($items): ?>
<section class="what-we-do <?php echo $bg_class;?>">
    <div class="container">
        <div class="title w-70 xl:w-100">
             <h2><?php echo $title ?></h2> 
                        <p class="mt-10"><?php echo $description ?></p>
                    </div>
                    <div class="content mt-60 xs:mt-30">
                        <div class="grid grid-2 xs:grid-1 gap-60 ml-100 xl:ml-60 md:ml-0 xl:gap-40 xs:gap-20 xs:flex xs:wrap">
                            <?php foreach ($items as $item): ?>
                            <div class="col">
                                <div class="card xs:w-100 flex align-start">
                                    <?php if ($item['icon']): ?>
                                        <div class="wrap-icon min-w-px-60 xs:min-w-px-40 max-w-px-60 xs:max-w-px-40">
                                            <img src="<?php echo $item['icon']['url']; ?>" alt="2hatslogic" loading="lazy" height="100px" width="100px">
                                        </div>
                                    <?php endif; ?>
                                    <div class="info ml-20">
                                         <h3 class="h4 transition font-bold"><?php echo $item['title'] ?></h3>

                                        <p class="mt-10"><?php  echo $item['content'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                      
                        </div>
                    </div>
                </div>
            </section>
<?php endif; ?>