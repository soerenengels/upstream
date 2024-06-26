<?php $logo = asset('/assets/images/icons/logo_new.png')->resize(90) ?>

<a class="logo" href="<?= $site->url() ?>">
	<img src="<?= $logo->url() ?>"
		alt=""
		width="<?= $logo->width() ?>"
		height="<?= $logo->height() ?>">
	<?= $site->title()->html() ?>
</a>
