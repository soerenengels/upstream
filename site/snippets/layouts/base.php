<!DOCTYPE html>
<html lang="de">
<?php snippet('head') ?>

<body>
	<?php snippet('components/a11y/skiplink') ?>
	<?php snippet('components/site/header') ?>
	<?php snippet('components/navigation/breadcrumb') ?>

	<main class="main" id="main">
		<?php snippet('components/login', ['login' => $login ?? null]) ?>
		<?= $slots->default() ?>
	</main>

	<?php if($footer = $slots->footer()): ?>
		<?= $footer ?>
	<?php else: ?>
		<?php snippet('components/site/footer') ?>
	<?php endif ?>

	<?php /* Plugin: tobimori/kirby-seo */ ?>
	<?php snippet('seo/schemas') ?>

</body>
<?php
/* Plugin: johanschopplich/kirby3-docsearch */
/*
<!-- <script>
		docsearch({
			container: "#docsearch",
			appId: "WF4ACN5Q57",
			indexName: "upstream",
			apiKey: "a38775702f493b478d372aa470196bbb",
			placeholder: "Suchen ..."
		});
	</script> -->
*/ ?>

</html>
