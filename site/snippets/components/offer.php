<?php
$tag = $tag ?? 'section';
$icon = $icon ?? '📦';
$cta = $cta ?? 'Unterstützen';
$cta_link = $cta_link ?? '';
$price_annual = $price_annual ?? null;
$price_monthly = $price_monthly ?? null;
$title = $title ?? 'Paket';
$description = $description ?? 'Beschreibung einfügen ...';
?>
<<?= $tag ?> class="offer">
	<header>
		<p class="offer__icon"><?= $icon ?></p>
		<h3><?= $title ?></h3>
		<?php if ($price_annual) : ?>
			<p class="price annual hidden"><?= $price_annual ?> € im Jahr</p>
			<p class="price annual hidden">Du sparst <?= round(100 - $price_annual / 12 * 100 / $price_monthly) ?> %</p>
		<?php
		endif;
		if ($price_monthly) :
		?>
			<p class="price monthly"><?= $price_monthly ?> € im Monat</p>
		<?php endif; ?>
	</header>

	<div class="content">
		<?= $description ?>
	</div>

	<footer>
		<a href="<?= $cta_link ?>" class="button button__dark">
			<?= $cta ?>
		</a>
	</footer>
</<?= $tag ?>>
