<?php snippet('layouts/base', ['breadcrumb' => false], slots: true) ?>

<article>
	<?php snippet('components/article/header', ['class' => 'error']) ?>
	<?php snippet('layout') ?>
	<section class="layout__row">
		<section class="layout__column" style="--span: 4">
		</section>
		<section class="layout__column" style="--span: 8">
			<?php snippet('forms/search') ?>
		</section>
	</section>
</article>
