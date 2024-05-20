<section class="impact relative pt-100 pb-100 sm:pt-80 sm:pb-80 bg-light-grey">
                 <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/background/world-map-dot.svg" alt="world-map-dot" height="100" width="100" fetchpriority="high" class="absolute z-0 inset-0 my-auto w-auto mx-auto max-h-90 max-w-90">
                 <div class="container relative z-1">
                     <div class="title">
                          <h2>Visit us</h2>
 
                     </div>
                     <div class="content mt-50 gap-40 sm:mt-30">
                         <div class="flex nowrap sm:wrap justify-between scroll-x">
                            <?php if(have_rows('office_locations')): ?>
                             <?php while(have_rows('office_locations')): the_row(); 
                             $flag = get_sub_field('country_flag')
                             ?>
                             <div class="col w-100 pr-40 sm:pr-0">
                                <div class="col w-100 pr-40 sm:pr-0 sm:mt-30">
                                   
                                 <div class="card w-100 flex align-start">
                                     <div class="wrap-icon min-w-px-50 xs:min-w-px-30 max-w-px-50 xs:max-w-px-30 mt-5">
                                         <img src="<?php echo $flag['url']; ?>" alt="2hatslogic" loading="lazy" height="100px" width="100px">
                                     </div>
                                     <div class="info ml-20 w-100">
                                         <p class="fs-16 mt-0 mb-0 lh-1-30"><?php the_sub_field('address'); ?></p>
                                     </div>
                                 </div>
                             </div>
                             </div>
                             <?php endwhile; ?>
                             <?php endif; ?>

                         </div>
                     </div>
                 </div>
             </section>