<?php
return function ($kirby) {

	$editors = $kirby->collection('users/editors')->sortBy('name');
	$editorsInactive = $kirby
		->users()
		->role('editor-inactive')
		->sortBy('name');
	$authors = $editors->add($editorsInactive);
	$board = $kirby->collection('users/advisors')->sortBy('name');

	return [
		'authors' => $authors,
		'advisory_board' => $board
	];
};
?>
