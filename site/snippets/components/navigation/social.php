<?php
$socials = [
	'linkedin-box-fill' => /* $linkedin ??  */[
            'label' => 'LinkedIn',
            'url' => 'https://linkedin.com/'
        ],
	'instagram-fill' => [
		'label' => 'Instagram',
		'url' => 'https://instagram.com/upstream.mail/'
	],
	'twitter-x-fill' => [
		'label' => 'Twitter',
		'url' => 'https://twitter.com/UpstreamMail'
	],
	'rss-fill' => [
		'label' => 'RSS-Feed',
		'url' => '/feed/artikel'
	]
];
?>

<nav
	class="social <?= $class ?? '' ?>"
	data-theme="<?= $theme ?? 'default' ?>"
	aria-label="social"
	style="--size-icons_: <?= $size ?? 'initial' ?>">

	<ul>
	<?php foreach ($socials as $key => $icon) : ?>
		<?php if (isset($$key) && $$key == false) return; ?>

		<li>
			<a
				href="<?= $icon['url'] ?>"
				aria-label="<?= $icon['label'] ?>"
				title="<?= $icon['label'] ?>">
				<?= svg("assets/icons/{$key}.svg") ?>
			</a>
		</li>

	<?php endforeach ?>
	</ul>

</nav>

