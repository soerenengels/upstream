<?php return [
	[
		'pattern' => 'feed/artikel',
		'method' => 'GET',
		'action'  => function () {
			$options = [
				'title' => 'Upstream: Neuste Artikel',
				'description' => 'Ungleichheit mach krank. Wir recherchieren das.',
				'link' => 'artikel/',
				'feedUrl' => site()->url() . '/feed/',
				'textfield' => 'layout'
			];
			$feed = page('artikel')->children()->listed()->flip()->limit(10)->feed($options);
			return $feed;
		}
	],
	[
		'pattern' => 'sitemap.xml',
		'method' => 'GET',
		'action'  => function () {
			$options = [
				'images' => true,
				'videos' => false,
			];
			$feed = site()->index()->listed()->limit(50000)->sitemap($options);
			return $feed;
		}
	],
	[
		'pattern' => 'sitemap.xsl',
		'method' => 'GET',
		'action'  => function () {
			snippet('feed/sitemapxsl');
			die;
		}
	],
];
