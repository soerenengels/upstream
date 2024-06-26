<aside class="article__recommendation">
    <strong>Kennst du schon unsere anderen&nbsp;Texte?</strong>
    <ul>
        <?php 
            $recommendations = $page->siblings()->not('tags')->shuffle()->limit(3);
            foreach($recommendations as $recommendation): ?>
        <li>
            <a href="<?= $recommendation->url() ?>"><?= $recommendation->title() ?></a> (<?= ceil($recommendation->text()->words() / 200) ?>&nbsp;min)
        </li>
        <?php endforeach; ?>
    </ul>
</aside>