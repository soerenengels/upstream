<p class="article__published">
	<span title="Veröffentlicht"><?= svg('assets/icons/calendar.svg') ?> <time datetime="<?= $page->date()->toDate('c') ?>" pubdate="pubdate"><?= $page->date()->toDate('d.m.Y') ?></time></span>,
	<?= " zuletzt aktualisiert: " . $page->modified('d.m.Y') ?>
	<?php /*if ($page->modified()->exists()): ?>, zuletzt geändert am: <?= $page->modified()->toDate('d.m.Y') ?><?php endif; */ ?>
</p>
