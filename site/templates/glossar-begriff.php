<?php snippet('layouts/base', slots: true) ?>

<article>
	<?php snippet('components/article/header')?>

    <section class="article__content">
        <?php snippet('layout') ?>
    </section>
    <section class="article__content">
        <a href="/glossar/">&larr; Zum Glossar</a>
    </section>

    <?php snippet('subscribe', ['title' => 'Sollen wir dich auf dem Laufenden halten?', 'button' => 'Abonnieren']) ?>
    <section class="article__row">
    <ul class="cards">

<?php
// TODO: Error-Case, falls nur eine KArte ausgewählt
$block = page('glossar')->engagementFooter()->toBlocks()->findBy('type', 'engagement_section');
$cards = $block->upstream_engagement_section()->toStructure()->filter('card_active', true);
if ($block->upstream_engagement_shuffle()) {
	$cards = $cards->shuffle();
}
foreach ($cards->limit(2) as $card) :
	$card = $card->content();

?>
	<?php snippet('components/card', [
		'tag' => "li",
		'type' => $card->card_type(),
		'cta' => $card->card_cta(),
		'link' => $card->card_cta_link()->toUrl()
	], slots: true) ?>
		<?php slot('default') ?>
		<span class="h2">
			<a href="<?= $card->card_cta_link()->toUrl() ?>">
				<?= $card->card_text() ?>
			</a>
		</span>
		<?php endslot() ?>
		<?php slot('cta') ?>
		<?php snippet('components/cta', slots: true) ?>
			<?= $card->card_cta() ?>
		<?php endsnippet() ?>
		<?php endslot() ?>

		<?php endsnippet() ?>

<?php endforeach ?>

</ul>

    </section>

		<section class="article__row">

    <?php snippet('components/article/related', [
        'recommended' => $kirby->collection('articles')->shuffle()->limit(2),
        'headline' => 'Kennst du schon ... ?']); ?>
		</section>


</article>
