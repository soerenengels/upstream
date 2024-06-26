<?php
return [
	'props' => [
		'label' => function (string $label = "Vorschau: Sharepic") {
			return $label;
		},
		'help' => function (string $help = "Das Open-Graph-Bild wird automatisch aus dem Titel, der Cover-Bild und dem Artikelformat generiert.") {
			return $help;
		}
	],
	'computed' => [
		'url' => function () {
				return $this->model()->url() . '/og-image';
		}
	]
];
