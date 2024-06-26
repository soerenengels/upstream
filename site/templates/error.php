<?php snippet('layouts/base', ['breadcrumb' => false], slots: true) ?>

<article>
	<?php snippet('components/article/header', ['class' => 'error']) ?>
	<?php snippet('layout') ?>
	<?php snippet('forms/search') ?>
</article>
