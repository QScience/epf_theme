<?php

/*
 * override theme_links__system_main_menu()
 */
function epf_links__system_main_menu($variables) {
	$links = $variables['links'];
	global $language_url;
	$output = '';

	if (count($links) > 0) {
		$output = '';

		$output .= '<ul>';

		$num_links = count($links);
		$i = 1;

		foreach ($links as $key => $link) {
			$class = array (
				$key
			);

			if (isset ($link['href']) && $link['href'] == $_GET['q'] && !drupal_is_front_page() && (empty ($link['language']) || $link['language']->language == $language_url->language)) {
				$class[] = 'selected';
			}
			$output .= '<li>';

			if (isset ($link['href'])) {
				// Pass in $link as $options, they share the same keys.
				$output .= '<a href="' . check_plain(url($link['href'])) . '"' . drupal_attributes(array (
					'class' => $class
				)) . '><span>' . $link['title'] . '</span></a>';
			}
			elseif (!empty ($link['title'])) {
				// Some links are actually not links, but we wrap these in <span> for adding title and class attributes.
				if (empty ($link['html'])) {
					$link['title'] = check_plain($link['title']);
				}
				$output .= '<span>' . $link['title'] . '</span>';
			}
			if (isset ($link['below'])) {
				$output .= '<ul>';
				foreach ($link['below'] as $keyb => $linkb) {
					$class = array (
						$keyb
					);
					$output .= '<li>';

					if (isset ($linkb['href'])) {
						// Pass in $link as $options, they share the same keys.
						$output .= '<a href="' . check_plain(url($linkb['href'])) . '"' . drupal_attributes(array (
							'class' => $class
						)) . '>' . $linkb['title'] . '</a>';
					}
					elseif (!empty ($linkb['title'])) {
						// Some links are actually not links, but we wrap these in <span> for adding title and class attributes.
						if (empty ($linkb['html'])) {
							$linkb['title'] = check_plain($linkb['title']);
						}
						$output .= $linkb['title'];
					}
					$output .= "</li>\n";
				}
				$output .= '</ul>';
			}

			$i++;
			$output .= "</li>\n";
		}

		$output .= '</ul>';
	}

	return $output;
}
/*
 * implements main_menu with hoot_preprocess_page()
 */
function epf_preprocess_page(& $variables) {

	$menus = menu_tree_page_data('main-menu');
	$router_item = menu_get_item();
	$links = array ();
	foreach ($menus as $item) {
		if (!$item['link']['hidden']) {
			$l = $item['link']['localized_options'];
			$l['href'] = $item['link']['href'];
			$l['title'] = $item['link']['title'];
			if ($item['link']['has_children'] > 0 && $item['below']) {
				foreach ($item['below'] as $itemb) {
					$lb = $itemb['link']['localized_options'];
					$lb['href'] = $itemb['link']['href'];
					$lb['title'] = $itemb['link']['title'];
				}
				$l['below']['menu-' . $itemb['link']['mlid']] = $lb;

			}
			// Keyed with the unique mlid to generate classes in theme_links().
			$links['menu-' . $item['link']['mlid']] = $l;
		}
	}
	$variables['main_menu'] = $links;
}
/*
 * override theme_username(), add user picture info
 */
function epf_username($variables) {

	if (variable_get('user_pictures', 0)) {
		$account = $variables['account'];
		if (!empty ($account->picture)) {
			// @TODO: Ideally this function would only be passed file objects, but
			// since there's a lot of legacy code that JOINs the {users} table to
			// {node} or {comments} and passes the results into this function if we
			// a numeric value in the picture field we'll assume it's a file id
			// and load it for them. Once we've got user_load_multiple() and
			// comment_load_multiple() functions the user module will be able to load
			// the picture files in mass during the object's load process.
			if (is_numeric($account->picture)) {
				$account->picture = file_load($account->picture);
			}
			if (!empty ($account->picture->uri)) {
				$filepath = $account->picture->uri;
			}
		}
		elseif (variable_get('user_picture_default', '')) {
			$filepath = variable_get('user_picture_default', '');
		}
		if (isset ($filepath)) {
			$alt = t("@user's picture", array (
				'@user' => format_username($account)
			));
			// If the image does not have a valid Drupal scheme (for eg. HTTP),
			// don't load image styles.
				$variables['user_picture'] = theme('image', array (
					'path' => $filepath,
					'alt' => $alt,
					'title' => $alt,
					'width' => 15, 
				));
			if (!empty ($account->uid) && user_access('access user profiles')) {
				$attributes = array (
					'attributes' => array (
						'title' => t('View user profile.'),
						'class'=>array(t('user_icon'))
					),
					'html' => TRUE,
					
				);
				$variables['user_picture'] = l($variables['user_picture'], "user/$account->uid", $attributes);
			}
		}
	}
	$output='';
	if (isset ($variables['link_path'])) {
		// We have a link path, so we should generate a link using l().
		// Additional classes may be added as array elements like
		// $variables['link_options']['attributes']['class'][] = 'myclass';
		if(isset($variables['user_picture'])){
			$output= $variables['user_picture'];
		}
		$output .= l($variables['name'] . $variables['extra'], $variables['link_path'], $variables['link_options']);
	} else {
		// Modules may have added important attributes so they must be included
		// in the output. Additional classes may be added as array elements like
		// $variables['attributes_array']['class'][] = 'myclass';
		$output = '<span' . drupal_attributes($variables['attributes_array']) . '>' . $variables['name'] . $variables['extra'] . '</span>';
	}
	return $output;
}
/*
 * implements main_menu with hoot_preprocess_comment()
 */
function epf_preprocess_comment(&$variables) {

  $variables['submitted'] = t('!username said on !datetime: ', array('!username' => $variables['author'], '!datetime' => $variables['created']));
}