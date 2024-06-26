<!-- Menü -->
<button onclick="toggleMenu()" title="Menü öffnen" aria-label="Menü öffnen" data-theme="dark" class="no-button menu">
	<span>Menü</span>
	<div class="icon" style="display: grid">
		<?= svg('assets/icons/menu-line.svg') ?>
		<?= svg('assets/icons/menu-fold-line.svg') ?>
	</div>
</button>

<!-- Menü Overlay -->
<nav class="menu__overlay">
	<search>
	<form action="/suche">
		<input name="q" type="search" aria-label="Suchen" id="nav__search" class="search line" placeholder="Suchen ..." autofocus />
		<!-- <input type="submit"  hidden /> -->
	</form>
	</search>
		<!-- <div id="docsearch"></div> -->
		<button
			onclick="event.preventDefault(); return toggleMenu()"
			title="Menü schließen"
			aria-label="Menü schließen"
			data-theme="light"
			class="no-button icon menu close">
			<div class="icon">
			<?= svg('assets/icons/menu-unfold-line.svg') ?>
			<?= svg('assets/icons/menu-line.svg') ?>
</icon>
		</button>

	<?= $site->navigation('main') ?>
	<?php snippet('components/navigation/social', ['theme' => 'light']) ?></li>
	<?= $site->navigation('legal') ?>
</nav>
