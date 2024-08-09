<?php extract($section); ?>
<section class="hero pt-60 pb-100 md:pt-60 md:pb-80">
    <div class="container relative">
        <div class="caption">
            <?php if (!empty($title)): ?>
                <h1 class="font-bold">
                    <?php echo $title ?>
                    <?php if (!empty($bluetitle)): ?>
                    <mark class="relative inline-block text-center c-primary">
                        <span class="relative z-2"><?php echo $bluetitle ?></span>
                        <svg class="stroke block absolute" viewBox="0 0 154 13">
                            <use href="#line"></use>
                        </svg>
                        <svg class="stroke block absolute" viewBox="0 0 154 13">
                            <use href="#line"></use>
                        </svg>
                    </mark>
                    <?php endif ?>
                </h1>
            <?php endif ?>
            <p class="mt-50 sm:mt-30"> <?php echo ($description ? $description : ''); ?> <br>
                <?php echo ($links ? $links : ''); ?> </p>
                <div class="btn-group flex align-center mt-60 md:mt-40 md:wrap md:column md:align-start">
                <?php if(!empty($cta['label'])) { ?>    
                    <?php if( $cta['action'] == 'modal' ) { ?>    
                        <button onclick="openModal('<?php echo $cta['modal']; ?>')" aria-label="get a quote" class="btn btn-secondary"><?php echo $cta['label'];?></button>
                     <?php } ?>
                     <?php if( $cta['action'] == 'link' ) { ?>    
                        <a href="<?php echo $cta['link']['url']; ?>"  class="btn btn-secondary"><?php echo $cta['label']; ?></a>
                     <?php } ?>
                <?php } ?>    
                <!-- rating -->
                <?php if ($rating): ?>
                    <div class="rating flex align-center row ml-60 md:ml-0 md:mt-40 sm:column sm:align-start">

                        <?php if ($rating && !empty($rating['items'])): ?>
                            <div id="rating" class="logo-wrap grid grid-4 gap-30 ml-10 sm:ml-0 sm:mt-10 sm:flex sm:wrap sm:justify-start">
                                <?php foreach ($rating['items'] as $item): ?>
                                    <a href="<?php echo $item['url']; ?>" aria-label="<?php echo $item['logo']['alt']; ?>"
                                        target="_blank" rel="noopener" class="rating-item flex align-center justify-center nowrap">
                                        <img src="<?php echo $item['logo']['url']; ?>" alt="<?php echo $item['logo']['alt']; ?>" fetchpriority="high" class="md:max-w-px-80" width="120" height="60">
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Free Consultation -->
        <?php if(!empty($animation_section_texts['text1']) && !empty($animation_section_texts['text2']) && !empty($animation_section_texts['text3'])) { ?>
        <?php 
            $cta_action = $animation_section_texts['cta_action'];
            $cta_modal = $animation_section_texts['cta_modal'];
            $cta_link = $animation_section_texts['cta_link'];
        ?>
        <?php if($cta_action == 'modal') { ?>
        <button onclick="openModal('<?php echo $cta_modal ?>')" aria-label="consultation" class="b-0 bg-transparent consultation-btn pointer absolute top-0 right-20 md:hidden">
        <?php } ?> 
        <?php if($cta_action == 'link') { ?>
        <a href="<?php echo $cta_link['url']; ?>" aria-label="consultation" class="b-0 bg-transparent consultation-btn pointer absolute top-0 right-20 md:hidden">
        <?php } ?>   
            <svg width="176px" height="177px" viewBox="0 0 176 177" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="consultation" class="consultation sm:hidden" stroke="none" stroke-width="1" fill="none"
                    fill-rule="evenodd">
                    <g id="hover-wrap" class="hover-wrap transition">
                        <g id="label" class="label transition" transform="translate(-30, -64)" fill="var(--c-primary)">
                            <text id="text" class="font-button"
                                transform="translate(149, 149) rotate(10) translate(-133, -111)">
                                <tspan x="90" y="108"><?php echo $animation_section_texts['text1']; ?></tspan>
                                <tspan x="57" y="122"><?php echo $animation_section_texts['text2']; ?></tspan>
                                <tspan x="76" y="136"><?php echo $animation_section_texts['text3']; ?></tspan>
                            </text>
                        </g>
                        <g id="inner" class="inner transition" fill="var(--c-primary)">
                            <path
                                d="M54.5474,65.2808 L52.6392,63.9973 C62.0842,49.9564 78.92,42.9698 95.5284,46.1982 C111.2514,49.2545 123.6914,60.7446 127.9954,76.1838 L125.7804,76.8008 C121.7124,62.2056 109.9524,51.3443 95.0904,48.4552 C79.3895,45.4034 63.475,52.0078 54.5474,65.2808 Z">
                            </path>
                            <path
                                d="M79.4983,128.6684 C64.7385,125.7994 52.5612,115.1634 47.7191,100.9114 L49.896,100.1724 C54.4745,113.6444 65.9852,123.7004 79.937,126.4114 L79.4983,128.6684 Z">
                            </path>
                            <polygon id="Path"
                                points="73.3636 133.4574 72.0777 131.5514 78.4502 127.2534 73.9167 120.5334 75.8231 119.2484 81.6416 127.8744">
                            </polygon>
                        </g>
                    </g>
                    <g id="outer" class="outer transition" fill="var(--c-secondary)">
                        <polygon
                            points="70.1814 144.9434 61.1899 172.4454 57.1167 170.0524 64.8995 146.7584 63.8207 146.1244 47.4019 164.3454 40.1604 160.0904 48.0825 136.8794 47.0039 136.2444 30.4465 154.3834 26.4421 152.0324 46.0874 130.7894 53.2947 135.0224 45.3715 158.2344 46.5563 158.9304 62.974 140.7094">
                        </polygon>
                        <polygon
                            points="42.588 127.0704 20.3615 145.5944 18.182 141.4024 37.1502 125.8024 36.5724 124.6924 12.9828 131.4074 9.1068 123.9554 28.1492 108.4994 27.5725 107.3884 3.9086 113.9604 1.7655 109.8414 29.6945 102.2794 33.5514 109.6944 14.5088 125.1524 15.1424 126.3704 38.7312 119.6544">
                        </polygon>
                        <polygon
                            points="28.6795 97.2934 3.55271368e-15 101.1194 0.3895 96.4114 24.7537 93.3224 24.8576 92.0754 1.3185 85.1835 2.0115 76.813 26.3623 73.8842 26.465 72.6375 2.9404 65.5848 3.3227 60.9577 30.9849 69.4452 30.295 77.7761 5.9433 80.7046 5.8302 82.0721 29.3693 88.9634">
                        </polygon>
                        <polygon
                            points="32.7558 64.67 6.4212 52.6827 9.2524 48.8998 31.5384 59.2205 32.288 58.2175 16.0014 39.8794 21.033 33.1533 43.2227 43.6033 43.9732 42.6005 27.782 24.1329 30.5641 20.4145 49.4964 42.2959 44.4891 48.9884 22.2995 38.5384 21.4775 39.6388 37.7642 57.9769">
                        </polygon>
                        <polygon
                            points="53.5598 39.2261 37.5911 15.0979 41.9973 13.3919 55.4182 33.9603 56.5853 33.5088 52.5038 9.3237 60.3356 6.2908 73.6064 26.918 74.7737 26.4657 70.843 2.2227 75.1733 0.546 79.6182 29.1369 71.8229 32.1553 58.5532 11.5274 57.2726 12.0233 61.354 36.2084">
                        </polygon>
                        <polygon
                            points="84.5644 28.9117 83.4235 -3.55271368e-15 88.0754 0.8265 88.8834 25.3731 90.1164 25.5912 99.1694 2.7964 107.4384 4.2651 108.0884 28.7829 109.3194 29.0017 118.5314 6.2359 123.1044 7.047 112.0774 33.7988 103.8474 32.3367 103.1984 7.8192 101.8464 7.5788 92.7934 30.3737">
                        </polygon>
                        <polygon
                            points="116.6584 36.3282 131.4824 11.48 134.9294 14.7116 122.2094 35.7208 123.1224 36.5766 143.1494 22.4162 149.2774 28.1606 136.4394 49.059 137.3524 49.9147 157.4964 35.8659 160.8854 39.0412 137.0464 55.4391 130.9474 49.7227 143.7844 28.8234 142.7834 27.885 122.7564 42.0445">
                        </polygon>
                        <polygon
                            points="139.6734 59.8259 165.4204 46.6228 166.6284 51.1908 144.7014 62.2546 145.0224 63.4637 169.5094 62.0831 171.6584 70.2021 149.6894 81.1098 150.0104 82.3189 174.5394 81.0944 175.7264 85.5833 146.8194 86.8394 144.6814 78.7581 166.6504 67.8514 166.2994 66.524 141.8114 67.9073">
                        </polygon>
                        <polygon
                            points="146.6704 91.9124 175.4984 94.3934 174.0974 98.9054 149.6424 96.6404 149.2714 97.8354 170.7564 109.6654 168.2654 117.6864 143.8584 115.2664 143.4874 116.4624 164.9244 128.4464 163.5484 132.8824 138.3844 118.5984 140.8634 110.6154 165.2694 113.0354 165.6774 111.7254 144.1924 99.8954">
                        </polygon>
                        <polygon
                            points="135.5764 122.8444 158.6444 140.3104 155.0534 143.3814 135.5704 128.4284 134.6194 129.2424 146.4924 150.7044 140.1084 156.1634 120.7484 141.1054 119.7964 141.9194 131.5454 163.4854 128.0164 166.5034 114.3404 141.0064 120.6924 135.5734 140.0524 150.6314 141.0964 149.7394 129.2234 128.2764">
                        </polygon>
                        <polygon
                            points="109.7004 143.1454 119.9624 170.1974 115.2904 170.8924 106.7284 147.8734 105.4894 148.0564 104.1454 172.5464 95.8384 173.7804 87.4354 150.7384 86.1964 150.9224 84.6944 175.4354 80.0999 176.1174 82.0592 147.2504 90.3274 146.0224 98.7294 169.0644 100.0884 168.8634 101.4324 144.3734">
                        </polygon>
                    </g>
                </g>
            </svg>
        <?php if($cta_action == 'modal') { ?>    
        </button>
        <?php } else { ?>
        </a> 
        <?php } ?>  
        <?php } ?>
    </div>
    <svg id="stroke" xmlns="http://www.w3.org/2000/svg" width="0" height="0" class="hidden">
        <defs>
            <path id="line" d="M2 2c49.7 2.6 100 3.1 150 1.7-46.5 2-93 4.4-139.2 7.3 45.2-1.5 90.6-1.8 135.8-.6"
                fill="none" stroke-linecap="round" stroke-linejoin="round" vector-effect="non-scaling-stroke" />
        </defs>
    </svg>
</section>