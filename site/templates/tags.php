<?php snippet('layouts/base', slots:true) ?>

<header class="article__header">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Bibliotecaestantes.jpg/2560px-Bibliotecaestantes.jpg">
    <section>

        <?php if (param('tag')): ?>
        <h1>#<?= str_replace(" ", "", urldecode(param('tag'))) ?></h1>
        <p>
            Auf dieser Seite findest du alle Artikel zum Schlagwort "<?= urldecode(param('tag')) ?>".
        </p>

        <?php else: ?>
        <h1>Schlagworte</h1>
        <p>
            Auf dieser Seite findest du eine Übersicht über alle Schlagworte auf Upstream.
        </p>
        <?php endif ?>

    </section>
</header>

<article id="tags">
    <?php /*<nav>
           <ul>
            <li><a href="#">alphabetisch</a></li>
            <li><a href="#">entdecken</a></li>
        </ul>
    </nav> */ ?>

    <section>

        <?php if (param('tag')): ?>
        <!-- Artikelübersicht -->
        <?php $articles = page('artikel')->children()->filterBy('tags', urldecode(param('tag')), ',')->flip()->paginate(10); ?>
        <?php foreach($articles as $article): ?>
        <?php snippet('components/cards/article', ['article' => $article]); ?>
        <?php endforeach ?>
        <?php endif ?>

        <!-- Tagcloud -->
        <?php $tags = page('artikel')->children()->listed()->pluck('tags', ',', true); ?>
        <?php snippet('article__tags', ['tags' => $tags]) ?>

        <?php snippet('article__engage') ?>

    </section>

</article>
