<?php

return function ($site) {

    $searchableTemplates = ['artikel', 'artikel.newsletter', 'artikel.community', 'artikel.interview', 'glossar-begriff', 'article'];
    $query   = get('q') ?? '';
    $results = $site->search($query, 'title|text|layout|tags');
    if($results):
        $results = $results->template($searchableTemplates);
    endif;
    $results = $results->paginate(20);

    return [
        'query'      => $query,
        'results'    => $results,
        'pagination' => $results->pagination()
    ];

};

?>
