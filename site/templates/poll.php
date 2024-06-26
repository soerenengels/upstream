<?php snippet('layouts/base', slots: true) ?>

<?php slot() ?>
	<?php snippet('forms/poll') ?>
<?php endslot() ?>

<?php slot('footer') ?>
	<?php snippet('components/site/footer', ['reduced' => true]) ?>
<?php endslot() ?>
