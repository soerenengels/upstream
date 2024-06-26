<ul class="cards">

	<?php
	// TODO: Error-Case, falls nur eine KArte ausgewählt
	$cards = $cards = $block->upstream_engagement_section()->toStructure()->filter('card_active', true);
	if ($block->upstream_engagement_shuffle()) {
		$cards = $cards->shuffle();
	}
	foreach ($cards->limit(2) as $card) :
		$card = $card->content();
	?>
		<?php snippet('components/card', [
			'tag' => "li",
			'type' => $card->card_type()
		], slots: true) ?>

		<?php slot('default') ?>
		<span class="h2">
			<a href="<?= $card->card_cta_link()->toUrl() ?>">
				<?= $card->card_text() ?>
			</a>
		</span>
		<?php endslot() ?>

		<?php slot('cta') ?>
		<?php snippet('components/cta', slots: true) ?>
			<?= $card->card_cta() ?>
		<?php endsnippet() ?>
		<?php endslot() ?>

		<?php endsnippet() ?>

	<?php endforeach ?>

</ul>
