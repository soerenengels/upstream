<?php return [
	/* 'driver' => 'gd', */
	'driver' => 'im',
	'interlace' => true,
	'srcsets' => [
		'default' => [
			'200w'  => ['width' => 200],
			'400w'  => ['width' => 400],
			'600w' => ['width' => 600]
		],
		'default/webp' => [
			'200w'  => ['width' => 200, 'format' => 'webp'],
			'400w'  => ['width' => 400, 'format' => 'webp'],
			'600w' => ['width' => 600, 'format' => 'webp']
		],
		'default/avif' => [
			'200w'  => ['width' => 200, 'format' => 'avif'],
			'400w'  => ['width' => 400, 'format' => 'avif'],
			'600w' => ['width' => 600, 'format' => 'avif', 'quality' => 80]
		],
		'article/header/default' => [
			'300w'  => ['width' => 300],
			'600w' => ['width' => 600],
			'900w'  => ['width' => 900],
			'1200w'  => ['width' => 1200],
			'1800w'  => ['width' => 1800]
		],
		'article/header/webp' => [
			'300w'  => ['width' => 300, 'format' => 'webp'],
			'600w' => ['width' => 600, 'format' => 'webp'],
			'900w'  => ['width' => 900, 'format' => 'webp'],
			'1200w'  => ['width' => 1200, 'format' => 'webp'],
			'1800w'  => ['width' => 1800, 'format' => 'webp']
		],
		'article/header/avif' => [
			'300w'  => ['width' => 300, 'format' => 'avif'],
			'600w' => ['width' => 600, 'format' => 'avif'],
			'900w'  => ['width' => 900, 'format' => 'avif'],
			'1200w'  => ['width' => 1200, 'format' => 'avif'],
			'1800w'  => ['width' => 1800, 'format' => 'avif']
		]
	]
];
