<div class="kiosk" role="region" aria-roledescription="carousel" aria-label="Artikel">

	<p class="kiosk__headline h1">
			<?= $headline ?>
	</p>

	<?php $index = 1; ?>
	<?php foreach ($articles as $article): ?>
	<?php snippet('components/cards/article', [
			'tag' => 'section',
			'class' => 'kiosk__card' . ($index == 1 ? ' active' : ''),
			'article' => $article,
			'aria' => [
				'hidden' => ($index == 1 ? false : true)
			],
			'type' => 'cover',
			'loading' => $index == 1 ? 'eager' : 'lazy'
		]);
		$index++;
	?>
	<?php endforeach ?>

	<?php /* snippet('components/navigation/bullet', [
		'items' => $articles,
		'class' => 'kiosk__navigation',
		'bullet_items_selector' => '[".kiosk__card", ".kiosk__title"]'
	]) */ ?>

    <section class="kiosk__shelf">

      <?php foreach ($articles as $index => $article): ?>
				<div class="kiosk__title <?= $article == $articles->first() ? 'active' : '' ?>">
					<button title="<?= $article->title() ?>"></button>
					<a
          href="<?= $article->url() ?>">
						<?= $article->title() ?>
					</a>
				</div>
      <?php endforeach ?>

    </section>

    <p class="kiosk__exit">
        <a href="<?= page('artikel')->url() ?>">
            Alle Artikel anzeigen &rarr;
        </a>
    </p>
</div>
