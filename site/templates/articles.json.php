<?php

foreach($articles as $article) {

  $html .= snippet('components/cards/article', [
		'article' => $article,
		'indicator' => " ",
		'class' => 'default indicator-inside',
		'type' => "default"
], true);

}
$json['html'] = $html;
$json['more'] = $more;

echo json_encode($json);
