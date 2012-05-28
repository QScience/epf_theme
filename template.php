<?php
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
      $class = array($key);

      if (isset($link['href']) && $link['href'] == $_GET['q']&& !drupal_is_front_page()
           && (empty($link['language']) || $link['language']->language == $language_url->language)) {
        $class[] = 'selected';
      }
      $output .= '<li>';

      if (isset($link['href'])) {
        // Pass in $link as $options, they share the same keys.
        $output .= '<a href="' .  check_plain(url($link['href'])) . '"' . drupal_attributes(array('class' => $class)) . '><span>'. $link['title'] . '</span></a>';
      }
      elseif (!empty($link['title'])) {
        // Some links are actually not links, but we wrap these in <span> for adding title and class attributes.
        if (empty($link['html'])) {
          $link['title'] = check_plain($link['title']);
        }
        $output .= '<span>' . $link['title'] . '</span>';
      }

      $i++;
      $output .= "</li>\n";
    }

    $output .= '</ul>';
  }

  return $output;
}