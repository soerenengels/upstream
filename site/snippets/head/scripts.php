<?= js([
	'assets/js/index.js',
	'@auto'
], [
	'defer' => true
]) ?>

<?php /* Plugin: soerenengels/kirby-steady */ ?>
<?php snippet('components/steady/widget') ?>

<?php snippet('head/tracking') ?>
