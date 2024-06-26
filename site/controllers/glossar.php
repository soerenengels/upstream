<?php

return function ($page) {

    /* Setup */
    $glossaryPages = $page->children()->listed();
    $totalChars = count($glossaryPages);
    $threshold1 = count($glossaryPages) >= 8 ? 8 : count($glossaryPages) - 1;
    $threshold2 = count($glossaryPages) >= 16 ? 16 : 0;
    $alphabet = range( 'A', 'Z' );
		$alphabet[] = 'Ä';
		$alphabet[] = 'Ö';
		$alphabet[] = 'Ü';

    return [
        'alphabet' => $alphabet,
        'glossaryPages' => $glossaryPages,
        'threshold1' => $threshold1,
        'threshold2' => $threshold2,
        'totalChars' => $totalChars
    ];

};
