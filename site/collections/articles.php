<?php
return function () {
	return collection('articles/all')
		->listed();
};
