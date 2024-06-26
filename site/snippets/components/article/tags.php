<section class="article__context">
	<h2 class="info">Kontext</h2>
	<ul class="tags" aria-label="tags">

		<li><?= svg('assets/icons/hashtag.svg') ?></li>

		<?php
		foreach ($tags as $tag) :
			$opacity = ".7";
			if (($count = collection('articles')->filterBy('tags', $tag, ',')->count()) >= 2):
				$opacity = ".8";
				if ($count >= 4):
					$opacity = ".9";
					if ($count >= 6):
						$opacity = "1";
					endif;
				endif;
			endif;
			?>
			<li>
				<a href="/artikel/tags/tag:<?= $tag ?>"  style="--opacity: <?= $opacity ?>;">
					<?= $tag ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>

	<?php snippet('components/article/published') ?>

</section>
