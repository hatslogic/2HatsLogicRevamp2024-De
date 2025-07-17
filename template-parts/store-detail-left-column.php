<?php
$image_gallery = get_field('plugin_screenshots');
?>
<div class="col w-50 md:w-100 content">

    <?php if (!empty($image_gallery)): ?>
        <div class="lightbox">
            <div class="lightbox-content">
                <?php $mainImage = $image_gallery[0]; ?>
                <?php
                $cropOptions = [
                    '(max-width: 768px)' => [400, 400],
                    '(min-width: 769px)' => [744, 744],
                ];
                $attributes = ['loading' => 'eager'];
                ?>
                <?php echo hatslogic_get_attachment_picture($mainImage['ID'], $cropOptions, $attributes); ?>
                <button id="prev-btn" type="button"
                    class="nav-btn">&#10094;</button>
                <button id="next-btn" type="button"
                    class="nav-btn">&#10095;</button>
            </div>
            <div class="thumbnails">
                <?php foreach ($image_gallery as $imageRow): ?>
                    <a href="<?php echo wp_get_attachment_image_url($imageRow['ID']) ?>">
                        <?php echo wp_get_attachment_image($imageRow['ID']); ?>
                    </a>
                <?php endforeach; ?>
                <!-- Add more thumbnails as needed -->
            </div>
        </div>
    <?php endif; ?>

</div>