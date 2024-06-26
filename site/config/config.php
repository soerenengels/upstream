<?php

use Kirby\Filesystem\Asset;
use Kirby\Toolkit\Str;
use Kirby\Cms\App;
use tobimori\DreamForm\Support\Menu;

require_once __DIR__ . '/../plugins/kirby3-dotenv/global.php';

loadenv([
	'dir' => realpath(__DIR__ . '/../../'),
	'file' => '.env',
]);

return [
	'locale' => 'de_DE.UTF-8',
	'blocks' => require __DIR__ . '/configs/blocks.php',
	'cache' => require __DIR__ . '/configs/cache.php',
	'debug' => true,
	'routes' => require __DIR__ . '/configs/routes.php',
	'slugs' => 'de',
	'smartypants' => true,
	'thumbs' => require __DIR__ . '/configs/thumbs.php',
	/* 'yaml.handler' => 'symfony', */
	'panel' => [
		'css' => 'assets/css/panel.css',
	],

	'pageMethods' => [
		'ogImage' => function () {
			if ($image = $this->images()->first()) {
				return $image;
			}
			if (file_exists(($url = $this->url() . "/og-image"))) {
				return new Asset($url);
			}
			return false;
		}
	],

	/* Plugins */

	'updates' => [
		'plugins' => [
			'upstream/*' => false,
		]
	],

	/* For Sitemap and RSS-Feed see config/routes.php

	/* Plugin: Linktree */
	'soerenengels.linktree' => [
		'settings' => [
			'description' => 'Ungleichheit macht krank. <br>Wir recherchieren wie.'
		]
	],

	// Plugin: Kirby x Steady
	'soerenengels.steady' => [
		'token' => $_ENV['STEADY_API_KEY'],
		'widget' => false,
	],

	/* Plugin: Matomo-Tab */
	'sylvainjule.matomo' => [
		'url' => $_ENV['MATOMO_API_URL'],
		'id' => '4',
		'token' => $_ENV['MATOMO_API_KEY'],
		'disableCookies' => true,
		'debug' => false,
		'blacklist' => ['127.0.0.1', '::1', 'upstream.test'],
		'active' => false,
		'label' => 'Statistiken'
	],

	/* Plugin: Minify HTML */
	'afbora.kirby-minify-html.enabled' => true,
	'afbora.kirby-minify-html.options' => [
		'doOptimizeViaHtmlDomParser' => true,
		'doRemoveComments' => true,
		'doOptimizeAttributes' => true,
		'doRemoveSpacesBetweenTags' => true,
	],

	/* Plugin: Enhanced Link Dialog */
	"gearsdigital.enhanced-toolbar-link-dialog" => [
		"title" => "{{ page.title }}",
		"filter" => null,
		"sort" => null,
		"qualified" => false,
		"translations" => []
	],

	/* SEO Blueprints, Schema-Generator */
	'tobimori.seo' => [
		'lang' => 'de_DE',
		'canonicalBase' => 'https://upstream-newsletter.de',
		'default' => [
			'twitterCardType' => 'summary_large_image',
			/* 'ogImage' => function($page) {
				return $page->url() . '/og-image';
			} */
		],
		'robots.indicator' => false,
		'socialMedia' => [
			'twitter' => 'https://twitter.com/UpstreamMail',
			'instagram' => 'https://instagram.com/upstream.mail/',
		],
		'sitemap' => [
			'groupByTemplate' => false,
			'excludeTemplates' => ['error', 'sandbox', 'intern', 'umfrage-success', 'umfrage-item', 'glossar']
		]
	],

	/* Plugin: DreamForm */
	'tobimori.dreamform' => [
    // encryption secret for htmx attributes
    'secret' => fn () => env('DREAMFORM_SECRET')
  ],
	/* 'panel.menu' => fn () => [
    'site' => Menu::site(),
    'forms' => Menu::forms(),
    'users',
    'system',
    // [...]
  ], */
];
