<?php

use Kirby\Cms\Site;

return function (Site $site) {
    $searchableTemplates = ['artikel', 'artikel.newsletter', 'artikel.community', 'artikel.interview', 'glossar-begriff', 'article'];
    $query   = get('q') ?? '';
		$type = param('type');
		$author = param('autor');
		$tag = param('tag');
		$results = $site->search($query, 'title|text|layout|tags');
		if($type) {
			$results = $results->filterBy('type', $type);
		}
		if($author) {
			$results = $results->filterBy('autor', $author);
		}
		if($tag) {
			$results = $results->filterBy('tags', $tag);
		}
    if($results):
        $results = $results->template($searchableTemplates);
    endif;

		$tags = [];
		/* foreach ($results as $result) {
			var_dump($result);
		} */
	/* var_dump($tags); */
		/* $results->map(function(\Kirby\Cms\Page $page) {
			$tags[] = $page->tags();
		}); */
    $results = $results->paginate(20);



    return [
        'query'      => $query,
        'results'    => $results,
				'tags' => $tags,
        'pagination' => $results->pagination()
    ];

};

?>
