<div id="container">

<div id="header">
    <div id="logo"><?php if ($logo) : ?>
        <a href="<?php print $front_page ?>" title="<?php print t('Home') ?>"><img src="<?php print($logo) ?>" alt="<?php print t('Home') ?>" border="0" /></a>
      <?php endif; ?></div>
    <ul id="globalnav">
     	<?php if ($logged_in) : ?>
     	<li class="first"><?php print t("Hello ") ?> <strong><a href="/user/<?php print $user->uid?>"><?php print $user->name ?></a></strong></li>
        		<li><a href="/logout"><?php print t("Log out") ?></a></li>
     	<?php else: ?>
        <li class="noborder"><strong><a href="/register">{__("Join_Now")}!</a></strong></li>
        <li><a href="/login">{__("Sign_In")}</a></li>
      <?php endif ?>
    </ul>
</div>

<div id="navibar">
    <div id="navigation">
     <?php print theme('links__system_main_menu', array('links' => $main_menu)); ?>  
    </div>
</div>
<div class="Container">
<div class="SCi">
 	<div id="main">
 		<?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
        <a id="main-content"></a>
        <?php print render($title_prefix); ?>
        <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
        <?php print render($title_suffix); ?>
        <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
        <?php print render($page['content']); ?>
        <?php print $feed_icons; ?>

    </div><!-- main -->
</div><!--SCi-->
<div class="SR">
 	<?php if ($page['sidebar_first']): ?>
        <div id="sidebar-first" class="column sidebar"><div class="section">
          <?php print render($page['sidebar_first']); ?>
        </div></div> <!-- /.section, /#sidebar-first -->
    <?php endif; ?>
</div><!--SR-->
</div>
<div class="ExtraBG"><div class="bottomMenu">
 <?php// print render($page['footer']); ?>
<ul class="nav">
	<li><a href="/econophysics/origin/show" style="padding-left: 5px; padding-right: 5px;">Origins</a></li>
	<li><a href="/econophysics/member/show" style="padding-left: 5px; padding-right: 5px;">Our
	team</a></li>
	<li><a href="http://www.unifr.ch/econophysics/symposium/" target="_blank" style="padding-left: 5px; padding-right: 5px;">Fribourg Symposium</a></li>
	<li><a href="/econophysics/mgame/show" target="_blank" style="padding-left: 5px; padding-right: 5px;">Minority Game</a></li>
	<li><a href="https://lists.unifr.ch/wws/info/econophysics-forum/" target="_blank" style="padding-left: 5px; padding-right: 5px;">Mailing-list</a></li>
	<li><a href="/econophysics/feature/data" target="_blank" style="padding-left: 5px; padding-right: 5px;">Download</a></li>
	<li><a href="mailto:econophysics@unifr.ch" target="_blank" style="padding-left: 5px; padding-right: 5px;">Contact us</a></li>
	<li>
	<div class="rr"><a href="/econophysics/event/rss" class="rss">RSS
	feed</a> </div></li>
		<li><div class="rr"><a href="http://www.unifr.ch" class="unifr">University of Fribourg</a></div></li>
	<li><div class="Qlogo"><a href="http://www.qlectives.eu" target="_blank" style="padding-left: 5px; padding-right: 5px;"><img src="/econophysics/images/Qlogo.png" alt="Qlectives"></a></div></li>
</ul>

</div>
</div>

</div><!--container-->

