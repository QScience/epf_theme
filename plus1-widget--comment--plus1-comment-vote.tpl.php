<span class="plus1-widget-comment">

  <div class="plus1-score-comment">
    <?php print 'Score: '. $score; ?>
    <?php if (!isset($use_arrow_down)) : ?>
    <?php if($can_vote&&!$voted) : ?>
        <span class="<?php if (!$voted) print 'plus1-vote';?>">
          | <?php print $widget_message; ?>
        </span>
      <?php endif; ?>
      <?php endif;?>
  </div>

  <?php if (isset($use_arrow_down)) : ?>
    <div class="plus1-msg">
      <div class="plus1-undo-vote">
        <?php print $widget_message; ?>
      </div>
    </div><?php endif;?>
</span>