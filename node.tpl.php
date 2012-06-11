<?php
// default? need to delete if use default template
?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

<div class="VoteHead">
<!-- <div class="PostHeadVote">
<div class="VoteCount" id="voteCount">
	<?php print render($title_prefix); ?>
</div>
</div> -->
<div class="PostHeadTitle"> 
  <?php if($page):?>
    <h2 class="title"<?php print $title_attributes; ?>><?php print $title; ?></h2>
  <?php else:?>
     <h2 <?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif?>

  <?php if ($display_submitted): ?>
    <div class="submitted">
      <?php print $submitted; ?>
    </div>
  <?php endif; ?>
    <?php print render($title_suffix); ?>
  
</div>

  <div class="content"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>
   </div>


  <?php print render($content['comments']); ?>

</div>