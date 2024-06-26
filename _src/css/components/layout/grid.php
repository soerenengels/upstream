<?php
	$element = $element ?? 'section';
	$class = $class ?? '';
?>
<<?= $element ?> class="<?= $class ?> grid">
	<?= $slot ?>
</<?= $element ?>>
