<?php
return function () {
	return page('community/umfragen')
		->children()
		->not(page('community/umfragen')->find('vielen-dank'));
};
