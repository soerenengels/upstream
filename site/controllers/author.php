<?php

return function ($page, $kirby) {

    /* Setup */
    $authorid = $page->userid();
    $author = $kirby->users()->findBy('id', $authorid);
    $avatar = $author->avatar()->crop(400,400, 'top')->html();
    $articlesByAuthor = page('artikel')
        ->children()
        ->listed()
				->filter(function($child) use ($author) {
					return $child->author()->toUsers()->has($author);
				})
        ->sortBy('date', 'desc');
    /* $glossaryPages = $page->children()->listed();
    $totalChars = count($glossaryPages);
    $threshold1 = count($glossaryPages) >= 8 ? 8 : count($glossaryPages) - 1;
    $threshold2 = count($glossaryPages) >= 16 ? 16 : 0;
    $alphabet = range( 'A', 'Z' ); */

    return [
        'author' => $author,
        'avatar' => $avatar,
        'fullname' => $page->title(),
        'bio' => $page->text(),
        'articlesByAuthor' => $articlesByAuthor,
        'mail' => $author->upstream_mail()
        /* 'threshold1' => $threshold1,
        'threshold2' => $threshold2,
        'totalChars' => $totalChars */
    ];

};
