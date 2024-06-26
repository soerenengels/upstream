<?php
use Kirby\Cms\Html;

	if (!$article->exists()) return;
	$tag = $tag ?? 'article';
	$type = $type ?? 'default';
	$class = $class ?? '';
	$heading = $heading ?? 'h3';
	//$indicators = true;
	$format = $article->format() ?? '';
	//$title = $article->title()->widont();
	$title = $article->title();
	$teaser = $article->teaser() ?? $article->text()->excerpt(240);
	$loading = $loading ?? 'lazy';
	$srcset = $srcset ?? null;
	$hidden = $aria['hidden'] ?? false;
?>
<?php
snippet('components/card', [
	'tag' => $tag ?? 'article',
	'attrs' => [
		'class' => 'article__card ' . $class . ' ' . $type . ' ' . $format,
		'style' => 'view-transition-name: card-' . $article->uuid()->id() . ';',
	]
], slots: true);
/*

<<?= $tag ?> class="article__card <?= $class ?> <?= $type ?> <?= $format ?>" <?php /* aria-hidden="<?= json_encode($hidden) ?>" ?>
	style="viev-transition-name: card-<?= $article->uuid()->id() ?>;"> */ ?>

	<?php
	if($indicators ?? true):
		snippet('components/indicators', ['article' => $article]);
	endif;
	?>

	<<?= $heading ?> class="headline">
		<?php if($tag !== 'header'): ?>
		<a href="<?= $article->url() ?>">
			<?= $title ?>
		</a>
		<?php else: ?>
			<?= $title ?>
		<?php endif ?>
	</<?= $heading ?>>

	<?= $teaser->kirbytext() ?>
	<?php /* Html::tag('p', [$teaser->kirbytext()]) */ ?>

	<div class="image__container">
		<?php
			if (($type != 'text') &&
				($image = $article
					->images()
					->template('cover')
					->first()
				)
			) :
				snippet('components/picture', [
					'image' => $image,
					'srcset' => $srcset,
					'loading' => $loading
				]);
			endif;
		?>
	</div>

	<div class="color-area"></div>

<?php endsnippet() ?>
