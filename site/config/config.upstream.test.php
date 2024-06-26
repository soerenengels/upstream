<?php
return [
	'cache' => [
		'pages' => [
			'active' => false,
			'type' => 'static'
		]
	],
	'debug' => true,
	'editor' => 'vscode',

	'email' => [
		'transport' => [
			'type' => 'smtp',
			'host' => 'localhost',
			'port' => 1025,
			'security' => false
		]
	],

	'panel' => [
		'favicon' => 'assets/images/icons/favicon-dev.ico'
	],

	'afbora.kirby-minify-html.enabled' => false,

];
