<?php snippet('layouts/base', slots: true) ?>

<article id="glossar">
	<?php snippet('components/article/header') ?>
	<?php snippet('forms/search', [
		'action' => '/suche/type:glossar/',
		'placeholder' => 'Durchsuche das Glossar …'
	]) ?>
	<?php snippet('components/navigation/alphabet', compact('alphabet')) ?>

	<?php
	$iteration = 0;
	foreach (range(0, 9) as $number) :
		$numberedPages = $glossaryPages->filterBy('title', '^=', $number);
	?>
		<?php foreach ($numberedPages as $item) : ?>
			<section class="glossar__item">
				<?php if ($iteration == 0) : ?><h2 id="zahlen">#</h2><?php endif ?>
				<a href="<?= $item->url() ?>"><?= $item->title()->html() ?></a>
			</section>
		<?php $iteration++;
		endforeach; ?>
	<?php endforeach; ?>

	<?php
	foreach ($alphabet as $char) :
		$iteration = 0; // through pages beginning with char
		$pagesFilteredByChar = $glossaryPages->filterBy('title', '^=', $char)->sort();
		$charExists = $pagesFilteredByChar->count() >= 1;
		if ($charExists) :
			foreach ($pagesFilteredByChar as $item) :
	?>
				<section class="glossar__item">
					<?php if ($iteration == 0) : ?><h2 id="<?= strtolower($alphabet[0]) ?>"><?= $alphabet[0] ?></h2><?php endif ?>
					<a href="<?= $item->url() ?>"><?= $item->title()->html() ?></a>
				</section>
	<?php
				$iteration++;
			endforeach;
		endif;

		# Engagement-Sections
		/* if ($totalChars == $threshold1) {
            echo '<section class="contribute">
            <strong><a href="/community/umfragen/welchen-begriff-willst-du-besser-verstehen">Dir fehlt ein Begriff?</a></strong>
            <span>Lass es uns wissen!</span>
          </section>';
        }
        if ($totalChars == $threshold2) {
            snippet('subscribe');
        }
        $totalChars--; */
		array_shift($alphabet);
	endforeach;
	?>
	<?php echo '<section class="contribute">
            <strong><a href="/community/umfragen/welchen-begriff-willst-du-besser-verstehen">Dir fehlt ein Begriff?</a></strong>
            <span>Lass es uns wissen!</span>
          </section>'; ?>
	<?php snippet('subscribe'); ?>
</article>
