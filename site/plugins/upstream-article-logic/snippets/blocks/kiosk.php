<?php // if($articles->isEmpty()) return; ?>

<?php snippet('components/kiosk', [
	'articles' => $block->upstream_kiosk_shelf()->toPages(),
	'headline' =>$block->upstream_kiosk_headline()
]) ?>
