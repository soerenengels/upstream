<?php
    use Kirby\Toolkit\Date;
		use Kirby\Toolkit\Str;
    $article = $article ?? false;
    if (!$article) return;
		$article_format = $article->format()->value() ?? null;
		$article_indicators = $article->indicators()->split();
    $indicators = $indicators ?? [];
    $published = new Date($article->date());

    if($published->diff(new Date())->days < 28) {
        $indicators[] = [
            'class' => 'new',
            'label' => 'Neu',
            'href' => false
        ];
    }
		foreach ($article_indicators as $indicator) {
			$indicators[] = [
        'class' => Str::slug($indicator),
        'label' => $indicator,
        'href' => true
    	];
		}
?>

<?php /* if(empty($indicators)) return */ ?>
<ul class="container indicators">

    <?php foreach ($indicators as $indicator): ?>
        <li class="indicator <?= $indicator['class'] ?>">
            <a <?php e($indicator['href'], 'href="/suche?q=' . $indicator['label'] .'"') ?>>
                <?= $indicator['label'] ?>
            </a>
        </li>
    <?php endforeach ?>

</ul>
