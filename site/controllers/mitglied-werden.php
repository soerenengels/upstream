<?php

return function () {

	return [
		'monthly_amount' => steady()->publication()->monthly_amount,
	];
};
