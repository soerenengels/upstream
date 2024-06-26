<?php
    $defaultTitle = 'Sag uns deine Meinung!';
    $defaultDescription = 'Kommentiere diesen Artikel, indem du uns <a href="mailto:mail@upstream-newsletter.de?subject=Kommentar zu: ' . $page->title()->escape('attr') . '&amp;body=Mein Kommentar zu: ' . $page->url() . '">eine Mail schreibst</a>.'
?>
<section class="article__comments">
    <h2 class="info community">
			Kommentieren
		</h2>
    <span class="h2"><?= isset($title) ? $title : $defaultTitle ?></span>
    <p><?= isset($description) ? $description : $defaultDescription ?>
</section>
