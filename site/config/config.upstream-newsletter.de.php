<?php
return [
	'debug' => false,
	'auth' => [
		'methods' => [
			'password' => ['2fa' => true]
		]
	],
	'email' => [
		'transport' => [
			'security' => true
		],
		'presets' => [
			'contact' => [
				'from'    => 'via-website@upstream-newsleter.de',
				'subject' => 'E-Mail von upstream-newsletter.de'
			]
		]
	],
];
