<div id="comments" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php if ($content['comments'] && $node->type != 'forum'): ?>
    <?php print render($title_prefix); ?>
    <h2 class="title"><?php print t('Discussion'); ?></h2>
    <?php print render($title_suffix); ?>
  <?php endif; ?>
  
  <div class="comments">
  <?php print render($content['comments']); ?>
  </div>
  
  <?php if ($content['comment_form']): ?>
    <h2 class="title comment-form"><?php print t('The Econophysics Forum welcomes your comments'); ?></h2>
    <?php print render($content['comment_form']);?>
  <?php endif; ?>
</div>