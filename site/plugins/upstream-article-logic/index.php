<?php

use Kirby\Cms\App as Kirby;

Kirby::plugin('upstream/article-logic', [
	// Register article snippets
	'snippets' => [
		// General Snippets
		/* 'article__authors'          => __DIR__ . '/snippets/article__authors.php',
        'article__comments'         => __DIR__ . '/snippets/article__comments.php',
        'article__engage'           => __DIR__ . '/snippets/article__engage.php',
        'article__recommendation'   => __DIR__ . '/snippets/article__recommendation.php',
        'article__related'          => __DIR__ . '/snippets/article__related.php',
        'article__share'            => __DIR__ . '/snippets/article__share.php',
        'article__tags'             => __DIR__ . '/snippets/article__tags.php', */
		// Block-Snippets
		'blocks/anti_werther' => __DIR__ . '/snippets/blocks/anti-werther.php',
		'blocks/format_title' => __DIR__ . '/snippets/blocks/format-title.php',
		'blocks/infokasten' => __DIR__ . '/snippets/blocks/infokasten.php',
		'blocks/kicker' => __DIR__ . '/snippets/blocks/kicker.php',
		'blocks/kiosk' => __DIR__ . '/snippets/blocks/kiosk.php',
		'blocks/team' => __DIR__ . '/snippets/blocks/team.php',
		'blocks/offers' => __DIR__ . '/snippets/blocks/offers.php',
		'blocks/takeaway' => __DIR__ . '/snippets/blocks/takeaway.php',
		'blocks/engagement_section' => __DIR__ . '/snippets/blocks/engagement-section.php',
		'blocks/umfragen' => __DIR__ . '/snippets/blocks/umfragen.php',
	],
	'blueprints' => [
		// Block-Blueprints
		'blocks/anti_werther' => __DIR__ . '/blueprints/blocks/anti-werther.yml',
		'blocks/format_title' => __DIR__ . '/blueprints/blocks/format-title.yml',
		'blocks/infokasten' => __DIR__ . '/blueprints/blocks/infokasten.yml',
		'blocks/kiosk' => __DIR__ . '/blueprints/blocks/kiosk.yml',
		'blocks/team' => __DIR__ . '/blueprints/blocks/team.yml',
		'blocks/offers' => __DIR__ . '/blueprints/blocks/offers.yml',
		'blocks/takeaway' => __DIR__ . '/blueprints/blocks/takeaway.yml',
		/* 'blocks/takeaway' => __DIR__ . '/blueprints/blocks/takeaway.yml', */
		'blocks/engagement_section' => __DIR__ . '/blueprints/blocks/engagement-section.yml',
		'blocks/umfragen' => __DIR__ . '/blueprints/blocks/umfragen.yml',
	],
]);
