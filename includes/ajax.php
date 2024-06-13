<?php
add_action('wp_ajax_load_more_team_members', 'load_more_team_members');
add_action('wp_ajax_nopriv_load_more_team_members', 'load_more_team_members'); // For non-logged-in users

function load_more_team_members() {

    $select_members = get_field('team', 963);
    $offset = $_POST['offset'];
    $members_html = '';

    foreach ($select_members as $key => $item):
        if ($item['acf_fc_layout'] == 'team_members'):
            
            $members = $item['select_members'];
            
            if ($members){
                ob_start();
                foreach ($members as $key => $item):
                    if($key < $offset) continue;
                    
                    setup_postdata($item);
                    $formatted_key = sprintf("%02d", $key + 1);
                    $name = get_field('name', $item->ID);
                    $designation = get_field('designation', $item->ID);
                    $image = get_the_post_thumbnail_url($item->ID, 'img_250x330');
                    ?>

                    <div class="item">
                        <div class="card">
                            <div class="img bg-secondary">
                                <picture>
                                    <source srcset="<?php echo webp($image); ?>" type="image/webp">
                                    <source srcset="<?php echo $image; ?>" type="">
                                    <img src="<?php echo $image; ?>" loading="lazy" alt="<?php the_title_attribute(); ?>" width="250px" height="330px" class="transition">
                                </picture>
                            </div>
                            <div class="info mt-10">
                                <?php if($name): ?>
                                    <h3 class="h5 font-bold"><?php echo $name; ?></h3>
                                <?php endif; ?>
                                <?php if($designation): ?>
                                    <div class="font-light fs-14 mt-3"><?php echo $designation; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                <?php
                endforeach;
                wp_reset_postdata();

                $members_html = ob_get_clean();
                echo $members_html; // Send the HTML to the JS script

            } else {
                echo 'no_more_members'; // Signal no more members available
            }

        break;
        endif;
    endforeach;

  die(); // Required to terminate after sending data
}