<?php extract($section); ?>
<?php $bg_class = $bg_enabled ? 'pt-100 pb-100 xs:pt-80 xs:pb-80 bg-light-grey' : 'bg-white'; ?>
<?php 
    $profile_message_title = get_field('profile_message_title','option');
    $profile_message = get_field('profile_message','option');
    $profile_name = get_field('profile_name','option');
    $profile_designation = get_field('profile_designation','option');
    $profile_picture = get_field('profile_picture','option');
?>

<section class="hero <?php echo $bg_class;?>">
    <div class="container">
        <div class="flex align-center justify-between md:wrap">
            <div class="col w-50 md:w-100 md:order-1">
            <?php
                $cropOptions = [
                    '(max-width: 768px)' => [374, 275],
                    '(min-width: 769px)' => [552, 406],
                ];
                $attributes = ['class' => 'transition', 'loading' => 'lazy'];
            ?>
             <?php echo hatslogic_get_attachment_picture($profile_picture['ID'], $cropOptions, $attributes); ?>   
            </div>
            <div class="col w-45 md:w-100 md:mt-40 md:order-2">
                <?php if( $profile_message_title || $profile_message) : ?>
                <div class="headline">
                    <h2 class="h2"><?php echo $profile_message_title;?></h2>
                    <p class="mt-30"><?php echo $profile_message;?></p>
                </div>
                <?php endif;?>
                <?php if($profile_name || $profile_designation): ?>
                <div class="block w-100 mt-30">

                    <div
                        class="author-name fs-23 font-bold mb-5"><?php echo $profile_name?></div>
                    <span
                        class="designation fs-16 lh-1-2 mt-5 inline-block"><?php echo $profile_designation?></span>
                </div>
                <?php endif;?>
            </div>

        </div>
    </div>
</section>