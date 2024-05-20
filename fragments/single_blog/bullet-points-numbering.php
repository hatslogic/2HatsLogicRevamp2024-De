
<?php extract($section); ?>

<?php if($items):?>
<div class="info mb-40 md:mb-20">
            <ol class="no-bullets">
            <?php foreach ($items as $key => $item) : ?>
                <li>

                    <h4><span class="c-primary"><?php echo $key+1?>&period;</span> <?php echo $item['title']; ?></h4>
                    <p> <?php echo $item['content']; ?>   </p>
                </li>
            <?php endforeach; ?>
            </ol>
        </div>
<?php endif; ?>