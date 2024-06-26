<?php
    $headline = $headline ?? 'Weiterlesen';
    $recommended = $recommended ?? (($page->recommended()->exists() && $page->recommended()->toPages()->count() == 2) ? $page->recommended()->toPages() : $page->siblings()->shuffle()->limit(2));
?>
<section class="_article__recommendation--footer article__related">

    <h2 class="info"><?= $headline ?></h2>
    <ul class="cards">
        <?php foreach($recommended as $article): ?>
          <?php snippet('components/cards/article', [
						'article' => $article,
						'type' => 'cover',
						'tag' => 'li'
					]); ?>

        <?php endforeach ?>
    </ul>

</section>
