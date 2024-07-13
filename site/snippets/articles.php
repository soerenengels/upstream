<?php
	use Kirby\Cms\Html;
	$attrs = $attrs ?? [];
	$empty = $empty ?? 'Keine Artikel gefunden';
?>
<section <?= HTML::attr($attrs) ?>>
        <h2 class="info">Texte von <?= $fullname ?></h2>
				<?= $slots->default() ?>
				<div class="article__grid all-articles">
				<?php $index = 1; ?>
				<?php if($articles): ?>
        <?php foreach ($articles as $article): ?>
            <?php snippet('components/cards/article', ['article' => $article, 'type' => $index % 2 == 0 ? 'text' : 'cover']) ?>
						<?php $index++; ?>
        <?php endforeach ?>
				<?php endif ?>
				</div>
</section>
