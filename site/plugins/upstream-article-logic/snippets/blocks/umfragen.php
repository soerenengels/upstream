<ul class="cards polls">

	<?php
	$polls = collection('umfragen');
	foreach ($polls as $poll) :
	?>
		<?php snippet('components/card', [
			'tag' => "li",
			'type' => 'participate'
		], slots: true) ?>

		<?php slot('default') ?>
		<span class="h2">
			<a href="<?= $poll->url() ?>">
				<?= $poll->title() ?>
			</a>
		</span>
		<?php endslot() ?>

		<?php slot('cta') ?>
		<?php snippet('components/cta', slots: true) ?>
			Mitmachen
		<?php endsnippet() ?>
		<?php endslot() ?>

		<?php endsnippet() ?>

	<?php endforeach ?>

</ul>
