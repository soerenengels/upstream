<?php if($authors = $page->context_author()->toUsers()): ?>
<aside class="article__authors _two-third">

	<h2 class="info">Autor*in<?= $authors->count() > 1 ? 'nen' : '' ?></h2>
	<ul>
    <?php foreach($authors as $author): ?>
    <li class="_article__author user article__user">

      	<?php if($avatar = $author->avatar()): ?>

        <picture>
        	<img src="<?= $avatar->crop(200, 200)->url() ?>" alt="" loading="lazy" height="100" width="100">
		</picture>
      	<?php endif ?>

		<div>
			<a href="<?= page('redaktion')->url() ?>/<?= $author->name()->slug()?>" class="h3 headline"><?= $author->name() ?></a>
			<?= $author->bio()->exists() ? $author->bio()->kirbytext() : '' ?>

		</div>

	</li>
    <?php endforeach; ?>
	</ul>

</aside>
<?php endif ?>
