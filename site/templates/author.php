<?php /* Controller: controllers/author.php */

use Kirby\Cms\StructureObject;
use Kirby\Data\Yaml;
use Kirby\Toolkit\A;
use Kirby\Toolkit\Str;
use Kirby\Uuid\Uuid;

 ?>
<?php snippet('layouts/base', slots: true) ?>

<article id="author">
	<section class="col-1">
		<?= $avatar ?>
	</section>

	<section class="col-2">
		<p class="category-indicator">Autor*in</p>
		<h1><?= $fullname ?></h1>
		<a class="email" href="mailto:<?= $mail ?>"><?= $mail ?></a>
		<p><?= $bio ?></p>
		<?php
			$socials = [];
			$fields = ['twitter', 'instagram', 'website'];
			foreach ($fields as $field) {
				if ($author->$field()->isNotEmpty()) {
					$socials[] = [
						'field' => $field,
						'label' => ucfirst($field),
						'value' => $author->$field(),
						'icon' => ($field == 'instagram' ? 'instagram-fill' : ($field == 'twitter' ? 'twitter-x-fill' : 'link'))
					];
				}
			} ?>
			<p>
				Folge <?= $author->name() ?>:
			</p>
		<ul class="no-list" style="list-style: none">
			<?php foreach ($socials as $social) : ?>
				<li>
					<a class="social <?= $field ?>" href="<?= $social['value'] ?>">
						<?= svg('assets/icons/' . $social['icon'] . '.svg') ?>
						<?= $social['label'] ?>
					</a>
				</li>
			<?php endforeach ?>
		</ul>

	</section>

	<?php snippet('articles', [
		'articles' => $articlesByAuthor,
		'attrs' => [
			'class' => 'col-3'
		]
	], slots: true); ?>
		<?php snippet('forms/search', [
				'action' => '/suche/author:' . Str::slug($fullname),
					'placeholder' => 'Artikel von ' . explode(' ',trim($fullname))[0] . ' durchsuchen …'
				]) ?>
	<?php endsnippet() ?>
</article>
