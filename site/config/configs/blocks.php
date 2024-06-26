<?php return [
	'fieldsets' => [
		'kirby' => [
			'label' => 'Default',
			'type' => 'group',
			'fieldsets' => [
				'steady_paywall',
				'steady_plans',
				'format_title',
				'heading',
				'text',
				'list',
				'quote',
				'image',
				'video',
				'markdown',
				'infokasten',
				'takeaway',
				'umfragen'
			]
		],
		'home' => [
			'label' => 'Startseite',
			'type' => 'group',
			'open' => false,
			'fieldsets' => [
				'engagement_section',
				'kiosk',
				'team',
				'offers',
			]
		],
		'article' => [
			'label' => 'Artikel',
			'type' => 'group',
			'open' => false,
			'fieldsets' => [
				'anti_werther',
				'kicker',
				'engagement_section',
			]
		],

	]
];
