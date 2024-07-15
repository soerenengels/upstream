<?php snippet('layouts/base', slots: true) ?>

<article class="suche">
	<h1>Suche</h1>
	<?php snippet('forms/search') ?>
	<p><?= $byline ?></p>

	<section>
		<ul>
			<?php foreach ($views as $key => $label) : ?>
				<li>
					<a href="<?= $key ?>">
						<?= $label ?>
					</a>
				</li>
			<?php endforeach ?>
		</ul>
		<h2>Filtern mit</h2>
		<ul>
			<!-- <li>Autor*innen</li> -->
			<?php if ($tags) : ?>
				<li>
					<label for="tags">Tags: <?= implode(";;;", $tagsSelected) ?></label>
					<select name="type" id="type" multiple options="2">
						<?php foreach ($tags as $tag) : ?>
							<option value="<?= Kirby\Toolkit\Str::slug($tag) ?>" <?= e(true, 'selected') ?>>
								<?= $tag ?>
							</option>
						<?php endforeach ?>
					</select>
				</li>
			<?php endif ?>
			<?php if ($formats) : ?>
				<li>
					<label for="type">Formate</label>
					<select name="type" id="type" multiple options="2">
						<?php foreach ($formats as $format) : ?>
							<option value="<?= Kirby\Toolkit\Str::slug($format) ?>"><?= Kirby\Toolkit\Str::ucfirst($format) ?></option>
						<?php endforeach ?>
					</select>
				</li>
			<?php endif ?>
		</ul>
	</section>

	<ul class="search__results">

		<?php $index = 1; ?>
		<?php foreach ($results as $result) : ?>
			<?php snippet('components/cards/article', ['article' => $result, 'type' => $index % 2 == 0 ? 'text' : ($result->images()
				->template('cover')
				->first() ? 'cover' : 'text'), 'tag' => 'li']) ?>
			<?php $index++; ?>
		<?php endforeach ?>

	</ul>

	<?php if ($pagination->hasPages()) : ?>
		<nav class="pagination">

			<?php if ($pagination->hasNextPage()) : ?>
				<a class="next" href="<?= $pagination->nextPageURL() ?>">
					< nächste Seite
				</a>
			<?php endif ?>

			<?php foreach ($pagination->range(10) as $r) : ?>
				<li>
					<a<?= $pagination->page() === $r ? ' aria-current="page"' : '' ?> href="<?= $pagination->pageURL($r) ?>">
						<?= $r ?>
						</a>
				</li>
			<?php endforeach ?>

			<?php if ($pagination->hasPrevPage()) : ?>
				<a class="prev" href="<?= $pagination->prevPageURL() ?>">
					vorherige Seite >
				</a>
			<?php endif ?>

		</nav>
	<?php endif ?>

	<?php if ($query && ($results->count() <= 3)) : ?>
		<ul class="cards">
			<?php snippet('components/card', [
				'type' => 'participate',
				'cta' => 'Teilnehmen',
				'link' => '/community/umfragen/was-sollen-wir-als-naechstes-recherchieren/'
			], slots: true) ?>
			<span class="h2">Du hast nicht gefunden, wonach du suchst?</span>
			<p>Sag uns, was wir als nächstes recherchieren sollen. Nimm an unserer kurzen Umfrage teil.</p>
			<?php endsnippet() ?>
			<?php snippet('components/card', [
				'type' => 'glossar',
				'cta' => 'Sags uns',
				'link' => '/community/umfragen/welchen-begriff-willst-du-besser-verstehen/'
			], slots: true) ?>
			<span class="h2">Welchen Begriff willst du besser verstehen?</span>
			<p>In unserem Glossar erklären wir Begriffe wie Soziale Determinanten oder Deprivationsindex. Gibt es einen Begriff, der dir Schwierigkeiten bereitet? Lass ihn uns gemeinsam verstehen.</p>
			<?php endsnippet() ?>
		</ul>

	<?php endif ?>
</article>
