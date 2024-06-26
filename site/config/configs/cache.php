<?php return [
	'pages' => [
		'active' => true,
		'ignore' => function ($page) {
			return $page->title()->value() === 'Do not cache me';
		}
	],
	'insta-api' => true,
	'trello-api' => true,
	'soerenengels.steady' => true,
	'soerenengels.steady.widgets' => true
];
