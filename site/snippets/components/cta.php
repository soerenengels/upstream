<?php

use Kirby\Cms\Html;
$text = ($slots->default() ?? $text) ?? 'Hier klicken';
$button_class = $button_class ?? 'button__dark';

?>

<?= Html::tag('span', $text, ['class' => 'button cta ' . $button_class]); ?>
