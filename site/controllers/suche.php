<?php

use Kirby\Cms\Site;
use Kirby\Cms\App as Kirby;

return function (
	Site $site,
	Kirby $kirby
) {
	// Setup
	$searchableTemplates = ['default', 'artikel', 'artikel.newsletter', 'artikel.community', 'artikel.interview', 'glossar-begriff', 'article'];
	$query = get('q') ?? '';
	[
		'author' => $author,
		'tags' => $tagsSelected,
		'type' => $type
	] = params() + ['author' => null, 'tags' => '', 'type' => ''];
	$tagsSelected = explode(',', $tagsSelected);

	// Get all pages for query '*'
	$results = match($query) {
		'*' => $site->index(),
		'' => null,
		default => $site->search($query, 'title|text|layout|tags')
	};

	// Only get listed pages
	$results = $results?->template($searchableTemplates)->listed();

	if ($type && $results) {
		/* $results = $results->filterBy('type', $type); */
		$results = $results->filter(function (\Kirby\Cms\Page $child) use ($type) {
			return $child->format()->value() == $type || $child->intendedTemplate()->name() == $type;
		});
	}

	/* if (isset($author) && ($author = $kirby->users()->find($author))) {
		$results = $results->filter(function ($child) use ($author) {
			return $child->author()->toUsers()->has($author);
		});
	} */
	/*
	if ($tagsSelected) {
		$results = $results->filterBy('tags', $tagsSelected);
	} */

	$paginate = $results->paginate(20);

	// Setup filter options
	$authors = $kirby->users()->filterBy('role', 'editor');
	$tags = $results->pluck('tags', ',', true);
	$formats = $results->pluck('format', ',', true);

	// Choose byline for underneath search input
	$authorByline = isset($author) ? ' von ' . $author->name() : '';
	$byline = match (true) {
		$results->isEmpty() && $query => 'Keine Ergebnisse für die Suche nach <strong>"' . $query . '"</strong>' . $authorByline,
		$results->isEmpty() || $query === null => 'Häufig gesucht: <a href="/suche?q=Armut">“Armut”</a>, <a href="/suche?q=Klima">“Klima”</a>, <a href="/suche?q=Corona">“Corona”</a>, <a href="/suche?q=Soziale%20Determinanten">Soziale Determinanten</a>',
		$results->count() <= 1 => 'Ein Ergebnis für die Suche nach <strong>"' . $query . '"</strong>' . $authorByline,
		default => $results->count() . ' Ergebnisse auf ' . $paginate->pagination()->pages() . ' Seiten für die Suche nach <strong>"' . $query . '"</strong>' . $authorByline . ':'
	};

	return [
		'view' => 'grid',
		'views' => ['grid' => 'Grid', 'list' => 'Liste'],
		'byline' => $byline,
		'query'      => $query,
		'data' => $results,
		'results'    => $paginate,
		'tagsSelected' => $tagsSelected,
		'tags' => $tags,
		'formats' => $formats,
		'author' => $author,
		'pagination' => $paginate->pagination(),
		'filters' => [
			'authors' => $authors,
			'tags' => $tags,
			'types' => $formats
		],
		'selection' => [
			'author' => $author,
			'tags' => $tagsSelected,
			'type' => $type
		]
	];
};
