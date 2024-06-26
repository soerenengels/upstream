<?php snippet('layouts/base', slots:true) ?>

<article class="grid">

	<!-- NEW ARTICLES -->
	<section class="article__grid featured-articles">
			<header>
					<h2>Die neusten Recherchen</h2>
			</header>
			<?php snippet('components/cards/article', [
					'article' => $featured->first(),
					'indicator' => [
						'class' => 'new',
						'href' => false,
						'label' => 'Neu'
					],
					'type' => "cover"
			])?>
			<?php snippet('components/cards/article', [
					'article' => $featured->offset(1)->first(),
					'indicator' => " ",
					"class" => ' indicator-inside',
					'type' => "text"
			])?>
			<?php snippet('components/cards/article', [
					'article' => $featured->offset(2)->first(),
					'indicator' => " ",
					"class" => ' indicator-inside',
					'type' => "text"
			])?>
	</section>

</article>

<section class="article__grid all-articles" data-page="<?= $pagination->hasNextPage() ?>">
    <header>
        <h2>Alle <?= collection('articles')->count() ?> Recherchen</h2>
        <p>
            Unsere Artikel sind nach Aktualität sortiert. Dursuche sie nach Themen oder Schlagwörtern, zum Beispiel <a href="/suche?q=Klima">Klima</a>, <a href="/suche?q=Körper">Körper</a>, <a href="/suche?q=Sucht">Sucht</a>, oder <a href="/suche?q=Psychische%20Gesundheit">Psychische Gesundheit</a>,
        </p>
				<?php snippet('forms/search') ?>
    </header>

		<?php
			$total = $articles->offset(3)->count();
			$index = 1;
			foreach ($articles->offset(3) as $article):
		?>

		<?php
			if($index == ceil($total / 3)):
					snippet('components/card', [
						'tag' => 'section',
						'type' => 'glossar',
						'cta' => 'Glossar durchstöbern'
			], slots: true);
		?>
			<span class="h2"><a href="/glossar">Kennst du schon unser Glossar?</a></span>
			<p>In unserem Glossar erklären wir, was hinter dem Modell Sozialer Determinanten steckt, was eine Gratifikationskrise oder wie der Deprivationsindex gemessen wird.</p>
		<?php endsnippet();
		endif ?>

		<?php
			if($index == ceil($total / 2)):
					snippet('components/card', [
						'tag' => 'section',
						'type' => 'community',
						'cta' => 'Unterstütze uns'
			], slots: true);
		?>
			<span class="h2"><a href="/community/mitglied-werden">Du findest wertvoll, was wir machen?</a></span>
			<p>Dann hilf uns das Projekt weiterzuführen und werde Teil der Upstream-Community.</p>
		<?php endsnippet();
		endif ?>

<?php
			if($index == ceil($total * 2 / 3)):
					snippet('components/card', [
						'tag' => 'section',
						'type' => 'participate',
						'cta' => 'Teilnehmen'
			], slots: true);
		?>
			<span class="h2"><a href="/community/umfragen/was-sollen-wir-als-naechstes-recherchieren">So kannst du uns bei der Recherche unterstützen</a></span>
			<p>Sag uns, welche Themen du wichtig findest. Nimm zwei Minuten an unserer Umfrage teil.</p>
		<?php endsnippet();
		endif ?>

		<?php

			snippet('components/cards/article', [
            'article' => $article,
            'indicator' => " ",
            'class' => 'default indicator-inside',
						'type' => "default"
			]);
			$index++;
    endforeach ?>

</section>

<section class="load-more">
		<button class="load-more">Mehr laden</button>
</section>
