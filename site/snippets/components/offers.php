<section id="offers" aria-label="Unterstützungspakete">
	<!-- <div id="pakete" class="offer__container"> -->
	<?php foreach ($steady_plans as $offer) : ?>
		<?php snippet('components/offer', [
			'icon' => $offer['icon'],
			'cta' => null,
			'cta_link' => 'https://steadyhq.com/de/plans/' . $offer['id'] . '/subscribe?period=annual',
			'price_annual' => $offer['annual-amount'],
			'price_monthly' => $offer['monthly-amount'],
			'title' => $offer['name'],
			'description' => $offer['benefits']
	]) ?>
	<?php endforeach ?>
	<!-- </div> -->
</section>
