<?php extract($section); ?>

<?php if ($heading || $content): ?>
<div name="section-<?php echo ($identifier) ? $identifier : '0'; ?>" <?php if($identifier): ?> id="head<?php echo $identifier; ?>" <?php endif; ?> class="info mb-40">
    <h3><?php echo $heading; ?></h3>
    <p><?php echo $content; ?> </p>
</div>
<?php endif; ?>