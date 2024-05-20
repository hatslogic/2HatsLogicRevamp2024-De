<?php extract($section); ?>

<?php if ($items): ?>
    <?php foreach ($items as $key => $item): ?>
    <div class="info mb-40 md:mb-20">
       
            <h4><?php echo $item['title']; ?></h4>
            <p><?php echo $item['content']; ?> </p>
        </div>
      
      <?php endforeach; ?>
<?php endif; ?>