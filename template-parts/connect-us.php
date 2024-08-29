<?php
$headline = get_field('headline');
$image_1 = get_field('image_1');
$image_2 = get_field('image_2');
$image_1_url = bis_get_attachment_image_src($image_1['ID'], [ 120 , 120],1);
$image_2_url = bis_get_attachment_image_src($image_2['ID'], [ 120 , 120],1);

$name_1 =  get_field('contact_one_name');
$name_2 = get_field('contact_two_name');
$primary_email = get_field('primary_email');
$desig1 = get_field('contact_one_designation');
$desig2 = get_field('contact_two_designation');
$loc1 = get_field('contact_one_location');
$loc2 = get_field('contact_two_location');
$call1 = get_field('call_one_button');
$call1_button_text = get_field('call_one_button_text');
$call2 = get_field('call_two_button');
$call2_button_text = get_field('call_two_button_text');


?>
<section class="connect-us py-60">
                 <div class="container">
                     <div class="title">
                          <h2><?php echo !empty($headline) ? $headline : "Connect Us" ?></h2>
 
                     </div>
                     <div class="content gap-0 xl:mt-40">
                         <div class="flex xl:wrap justify-between align-center xl:align-start gap-30 xl:gap-0">
                             <div class="col w-100 xl:w-50 xs:w-100 pr-40 xl:pr-30 xs:pr-0 b-0 br-1 xs:br-0 solid bc-hash">
                                 <div class="avatar-wrap flex">
                                     <div class="img-wrap w-px-80 h-px-80 max-w-px-80 min-w-px-80 xs:w-px-60 xs:h-px-60 xs:max-w-px-60 xs:min-w-px-60">
                                         <img src="<?php echo $image_1_url['src']; ?>" alt="<?php echo $name_1 ?>" width="80" height="80">
                                     </div>
                                     <div class="author ml-20">
                                         <div class="author-name fs-18 font-bold fs-20"><?php echo $name_1 ?></div> <span class="designation font-regular fs-15 lh-1-35 mt-8 inline-block"><?php echo $desig1; ?><br> <small><?php echo $loc1; ?>&period;</small></span>
 
                                     </div>
                                 </div> 
                                 <?php  if($call1): ?>
                                 <?php $call1 = filter_var($call1, FILTER_VALIDATE_URL) === FALSE ? 'tel:'.$call1  : $call1  ?>   
                                 <a href="<?php echo $call1 ?>" target="_blank" class="bg-transparent px-0 mt-20 xs:mt-10 xs:ml-80 fs-18 xs:fs-16 c-secondary hover:c-primary b-0 font-bold py-10 bc-transparent inline-flex align-center gap-15 xs:gap-10">
                                    <i class="icomoon icon-calendar_month fs-24"></i> <?php echo !empty($call1_button_text) ? $call1_button_text : "Schedule a call" ?>
                                 </a>
                                <?php endif; ?>
                             </div>
                             <div class="col w-100 xl:w-50 xs:w-100 pl-40 xl:pl-30 xs:pl-0 md:mt-30 xs:mt-20 pr-40 xl:pr-20 xs:pr-0 xs:pt-20 b-0 br-1 xs:br-0 md:br-0 solid bc-hash">
                                 <div class="avatar-wrap flex">
                                     <div class="img-wrap w-px-80 h-px-80 max-w-px-80 min-w-px-80 xs:w-px-60 xs:h-px-60 xs:max-w-px-60 xs:min-w-px-60">
                                         <img src="<?php echo $image_2_url['src']; ?>" alt="<?php echo $name_2 ?>" width="80" height="80">
                                     </div>
                                     <div class="author ml-20">
                                         <div class="author-name fs-18 font-bold fs-20"><?php echo $name_2 ?></div> <span class="designation font-regular fs-15 lh-1-35 mt-8 inline-block"><?php echo $desig2; ?><br> <small><?php echo $loc2; ?>&period;</small></span>
 
                                     </div>
                                 </div>
                                 <?php if($call2): ?>
                                 <?php $call2 = filter_var($call2, FILTER_VALIDATE_URL) === FALSE ? 'tel:'.$call2  : $call2  ?>   
                                 <a href="<?php echo $call2 ?>" target="_blank" class="bg-transparent px-0 mt-20 xs:mt-10 xs:ml-80 fs-18 xs:fs-16 c-secondary hover:c-primary b-0 font-bold py-10 bc-transparent inline-flex align-center gap-15 xs:gap-10">
                                    <i class="icomoon icon-calendar_month fs-24"></i> <?php echo !empty($call2_button_text) ? $call2_button_text : "Schedule a call" ?>
                                </a>

                                 <?php endif; ?>
                             </div>
                             <div class="col w-100 b-0 xl:bt-1 xl:mt-40 xl:pt-40 solid bc-hash pl-60 xl:pl-0 md:mt-40">
                                 <div class="card flex align-center">
                                     <div class="wrap-icon min-w-px-30 fs-28"> <i class="icomoon icon-mail"></i>
 
                                     </div>
                                     <div class="info ml-20">
                                          <h3 class="h5 transition font-regular opacity-50 mb-5">Email</h3>
 
                                         <p class="mt-0 mb-0 fs-16 font-regular">E: <a class="c-secondary hover:c-primary hover:text-decoration-underline" href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo $primary_email; ?>" target="_blank"><?php echo $primary_email; ?></a>
 
                                         </p>
                                     </div>
                                 </div>
                                 <div class="card flex align-center mt-30">
                                     <div class="wrap-icon min-w-px-30 fs-28"> <i class="icomoon icon-headphones"></i>
 
                                     </div>
                                     <div class="info ml-20">
                                          <h3 class="h5 transition font-regular opacity-50 mb-5">Career</h3>
 
                                         <p class="mt-0 mb-0 fs-16 font-regular">E: <a class="c-secondary hover:c-primary hover:text-decoration-underline" href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php the_field('contact_mail');?>" target="_blank"><?php the_field('contact_mail'); ?></a>
 
                                         </p>
                                         <p class="mt-0 mb-0 fs-16 font-regular">P: <a class="c-secondary hover:c-primary hover:text-decoration-underline" href="tel:<?php the_field('contact_phone');?>"><?php the_field('contact_phone');?></a>
 
                                         </p>
                                     </div>
                                 </div>
                                 <div class="card flex align-center mt-30">
                                     <div class="wrap-icon min-w-px-30 fs-28"> <i class="icomoon icon-call"></i>
 
                                     </div>
                                     <div class="info ml-20">
                                          <h3 class="h5 transition font-regular opacity-50 mb-5">Office</h3>
                                <?php if(have_rows('office_phone')): 
                                    while(have_rows('office_phone')): the_row(); ?>
                                         <p class="mt-0 mb-0 fs-16 font-regular"><span class="font-bold"><?php the_sub_field('country') ?></span> : <a class="c-secondary hover:c-primary hover:text-decoration-underline" href="tel:+<?php the_sub_field('phone');?>"><?php the_sub_field('phone');?></a>
 
                                         </p>
                                <?php endwhile; 
                            endif; ?>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </section>