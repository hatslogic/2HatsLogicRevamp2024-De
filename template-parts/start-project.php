<!-- Start a project  -->
<section class="start-project pt-100 md:pt-80 pb-100 md:pb-80 b-0 bt-1 bc-hash solid">
    <?php
    $title = get_field('start_a_project_headline', 'option');
    $desc = get_field('start_a_project_desc', 'option');
    $button = get_field('start_a_project_cta', 'option');
    ?>
    <div class="container">
        <div class="title flex md:wrap md:column align-center justify-between">
            <div class="col w-70 md:w-100">
                <div class="title-inner">
                    <h2><?php echo $title ?></h2>
                    <p><?php echo $desc ?></p>
                </div>
            </div>
            <div class="col w-30 md:w-100 flex justify-end md:justify-start md:mt-30">
                <div class="btn-wrap">
                    <a href="<?php echo $button['url'] ?>" class="btn btn-secondary"><?php echo $button['title'] ?></a>
                </div>
            </div>
        </div>
    </div>
</section>