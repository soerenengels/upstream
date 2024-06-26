<?php
	$hideNumbers = $hideNumbers ?? null;
?>
<nav>
	<ul>
		<?php if (!$hideNumbers): ?>
			<li><a href="#zahlen" title="Zahlen">#</a></li>
		<?php endif ?>
		<?php foreach ($alphabet as $char) : ?>
			<li><a href="#<?= strtolower($char) ?>"><?= $char ?></a></li>
		<?php endforeach ?>
	</ul>
</nav>
