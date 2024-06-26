<?php
return [
	'debug' => true,
	'auth' => [
		'methods' => [
			'password' => ['2fa' => true]
		]
	],
	'cache' => false,
	'thumbs' => [
		'driver' => 'im',
	]
];
