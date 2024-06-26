<?php if($page == page('home')) return; ?>
<nav class="breadcrumb" aria-label="breadcrumb">
    <ol>
        <?php foreach($site->breadcrumb() as $crumb): ?>
        <?php $title = $crumb->meta_title()->isNotEmpty() ? $crumb->meta_title()->html() : $crumb->title()->html() ?>
        <li>
            <a href="<?= $crumb->url() ?>" <?= e($crumb->isActive(), 'aria-current="page"') ?>>
                <?= $title ?>
            </a>
        </li>
        <?php endforeach ?>
    </ol>
</nav>
