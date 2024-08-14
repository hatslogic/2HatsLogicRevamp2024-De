<!-- Start a project  -->
<?php
$title = get_field('start_a_project_headline', 'option');
$desc = get_field('start_a_project_desc', 'option');
$button = get_field('start_a_project_cta', 'option');
?>

<?php if ($title || $desc || $button) { ?>
<section class="start-project pt-100 md:pt-80 pb-100 md:pb-80 b-0 bt-1 bc-hash solid">
    <div class="container">
        <div class="title text-center">
            <?php if ($title) { ?>
                <h2><?php echo $title ?></h2>
            <?php } ?>
            <?php if ($desc) { ?>
                <p><?php echo $desc ?></p>
            <?php } ?>
            <?php if ($button) { ?>
            <div class="btn-group center mt-60">
            <a href="<?php echo $button['url'] ?>" class="btn btn-secondary"><?php echo $button['title'] ?></a>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>