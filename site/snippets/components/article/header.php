<?php
    $getClassAttribute = $class ?? '';
    $headerClass = "article__header " . $getClassAttribute;
?>

<?php

snippet('components/cards/article', [
	'article' => $page,
	'tag' => 'header',
	'type' => $headerClass,
	'heading' => 'h1',
	'loading' => 'eager',
	'indicators' => false,
	'srcset' => ['article/header/default','article/header/webp','article/header/avif']
]);

snippet('components/article/vgwort');

?>
