<?php

/* see https://getkirby.com/docs/cookbook/templating/ajax-load-more */

return function ($page) {

  $limit      = 10;
	$featured = collection('articles')->limit(3);
	$articles = collection('articles')->not($featured)->offset($limit)->paginate($limit);
  $pagination = $articles->pagination();
  $more       = $pagination->hasNextPage();

  return [
      'articles' => $articles,
      'more'     => $more,
      'html'     => '',
      'json'     => [],
    ];
};
