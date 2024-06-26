<?php
	use Kirby\Toolkit\Escape;
	$items = $items ?? null;
	if(!$items) return;
	$class = $class ?? '';
	$selector = $bullet_items_selector ?? 'fail';
?>
<nav class="bullet <?= $class ?>">
	<ul>
		<li class="bullet__counter">
			<span>1</span> / <span><?= $items->count() ?></span>
		</li>

		<?php
		$index = 1;
		foreach ($items as $item) :
		?>
			<li
				class="bullet__indicator <?= $index == 1 ? 'active' : '' ?>"
				data-poll-item="<?= $index ?>"
				onfocus="setBulletItem(<?= $index ?>, <?= Escape::attr($selector) ?>)"
				tabindex="0">
			</li>

		<?php
			$index++;
		endforeach;
		?>

	</ul>
</nav>
