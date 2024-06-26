<?php
return function () {
	return page('artikel')
		->children()->not('tags')
		->template(['article', 'artikel.newsletter', 'artikel.interview', 'artikel.community', 'artikel'])
		->sortBy('date', 'desc');
};
