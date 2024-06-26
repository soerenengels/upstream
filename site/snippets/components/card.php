<?php

use Kirby\Cms\Html;

// Setup
$type = $type ?? 'default';
$attrs = $attrs ?? null;
$class = $attrs['class'] ?? '' . ' card ' . $type;

// CARD
$tag = $tag ?? 'div';
$content = [
	$slots->default(),
	$slots->cta() ?? null
];
$attrs = [
	'class' => $class
];

?>
<?= Html::tag($tag, $content, $attrs) ?>
