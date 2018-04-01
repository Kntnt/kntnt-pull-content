<?php /* Available variables: $content, $type, $pos, $class, $id */ ?>
<div<?php if ($id): ?> id="<?php echo $id; ?>"<?php endif; ?> class="<?php echo $class; ?>">
  <div>
    <?php if ('quote' === $type) echo '<blockquote>'; ?>
      <?php echo $content; ?>
    <?php if ('quote' === $type) echo '</blockquote>'; ?>
  </div>
</div>
