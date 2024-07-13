<?php snippet('layouts/base', slots: true) ?>
<?php # https://getkirby.com/docs/cookbook/content/search
?>

<article class="suche">


	<!-- <form action="" method="GET" class="search__form">
		<input type="search" name="q" value="<?= html($query) ?>">
		<input type="submit" class="button button__dark" value="Suchen">
	</form> -->
	<?php snippet('forms/search') ?>

	<?php if ($results->isEmpty() || $query === null) : ?>
		<p>
			Häufig gesucht: <a href="/suche?q=Armut">“Armut”</a>, <a href="/suche?q=Klima">“Klima”</a>, <a href="/suche?q=Corona">“Corona”</a>, <a href="/suche?q=Soziale%20Determinanten">Soziale Determinanten</a>
		</p>
	<?php endif ?>

	<?php if ($results->isNotEmpty() && $query) : ?>
		<?php if ($results->count() <= 1) : ?>
			<p>Ein Ergebnis für die Suche nach <strong>"<?= $query ?>"</strong>:</p>
		<?php else : ?>
			<p><?= $results->count() ?> Ergebnisse für die Suche nach <strong>"<?= $query ?>"</strong>:</p>
		<?php endif ?>
	<?php elseif ($results->isEmpty() && $query) : ?>
		<p>Keine Ergebnisse für die Suche nach <strong>"<?= $query ?>"</strong>.</p>
	<?php endif ?>
	<?php /*
	<section>
		<h2>Filtern mit</h2>
		<ul>
			<li>Autor*innen</li>
			<li>Schlagworten</li>
			<li><label for="type">Formaten</label>

				<select name="type" id="type" multiple options="2">
					<option value="alle">Alle</option>
					<option value="interviews">Interview</option>
					<option value="newsletter">Newsletter</option>
					<option value="glossar">Glossar</option>
					<option value="seiten">Seiten</option>
				</select>
			</li>
		</ul>
	</section> */ ?>
	<ul class="search__results">

		<?php $index = 1; ?>
		<?php foreach ($results as $result) : ?>
			<?php snippet('components/cards/article', ['article' => $result, 'type' => $index % 2 == 0 ? 'text' : ($result->images()
				->template('cover')
				->first() ? 'cover' : 'text'), 'tag' => 'li']) ?>
			<?php $index++; ?>
		<?php endforeach ?>

	</ul>

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
