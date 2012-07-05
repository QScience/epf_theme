<div class="profile"<?php print $attributes; ?>>
  <?php print render($user_profile); ?>
</div>

<h1 class="title">History of contributions</h1>
<div class="user-history">
<div style="padding-left: 20px;">
<p><a href="<?php print url('/user-history/'.$elements['#account']->name);?>" style="font-weight: bold;">Submissions</a></p>
<p><a href="<?php print url('/user-comments/'.$elements['#account']->name);?>" style="font-weight: bold;">Comments</a></p>
<p><a href="<?php print url('/blog/'.$elements['#account']->uid);?>" style="font-weight: bold;">Blogs </a></p>
</div>
</div>
