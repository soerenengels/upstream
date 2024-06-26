<?php
return function ($page) {
	$limit = 10;
	$featured = collection('articles')->limit(3);
	$articles = collection('articles')->not($featured)->paginate($limit);
	return [
		'featured' => $featured,
		'limit' => $limit,
		'articles' => $articles,
		'pagination' => $articles->pagination()
	];
}
?>

