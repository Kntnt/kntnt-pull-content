<?php /* Available variables: $content, $type, $pos, $class, $id */ ?>
<div<?php if ($id): ?> id="<?php echo $id; ?>"<?php endif; ?> class="<?php echo $class; ?>"<?php if ($style): ?> style="<?php echo $style; ?>"<?php endif; ?>>
  <div<?php if ($inner_style): ?> style="<?php echo $inner_style; ?>"<?php endif; ?>>
      <?php if ('quote' === $type) {
          echo '<blockquote>';
      } ?>
      <?php echo $content; ?>
      <?php if ('quote' === $type) {
          echo '</blockquote>';
      } ?>
  </div>
</div>
