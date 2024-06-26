<?php
/** Lays out layout rows and columns for page text */
/** @var Kirby\Cms\Page $page */
?>
<?php foreach ($page->layout()->toLayouts() as $layout) : ?>
	<section class="layout__row">
		<?php foreach ($layout->columns() as $column) : ?>
			<div class="layout__column" style="--span:<?= $column->span() ?>;">
				<?= $column->blocks() ?>
			</div>
		<?php endforeach ?>
	</section>
<?php endforeach ?>
