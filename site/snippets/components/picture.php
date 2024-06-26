<?php
if(!$image) return;
$loading = $loading ?? 'lazy';
[$default, $webp, $avif] = $srcset ?? ['default', 'default/webp', 'default/avif']
?>

<picture>

	<source
		type="image/avif"
		srcset="<?= $image->srcset($avif) ?>">

	<source
		type="image/webp"
		srcset="<?= $image->srcset($webp) ?>">

	<source
		srcset="<?= $image->srcset($default) ?>">

  <img
    src="<?= $image->resize(500)->url() ?>"
    alt="<?= $image->alt() ?? '' ?>"
    height="<?= $image->height() ?? '' ?>"
    width="<?= $image->width() ?? '' ?>"
		style="object-position: <?= $image->focus() ?? $image->cropselect() ?>;"
		loading="<?= $loading ?>">

</picture>
