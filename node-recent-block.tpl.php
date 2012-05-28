<ul>
<?php foreach ($variables['nodes'] as $node): ?>
	<li class="list"><a href="node/<?php print $node->nid?>"><?php print $node->title ?></a><br>
	<?php print t("by "); print theme('username', array('account' => user_load($node->uid)));?> (<?php print format_date($node->created)?>)
	</li>
<?php endforeach ?>
	</ul>
