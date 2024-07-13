<button
    type="<?= $type ?? 'submit' ?>"
    class="<?= $class ?? '' ?>"
		<?= ($iconOnly ?? false) ? 'aria-label="' . ($value ?? '') . '"' : '' ?>
		data-theme="<?= $theme ?? 'default' ?>">
		<?php if(!($iconOnly ?? true)): ?>
			<?= $value ?? '' ?>
		<?php endif ?>
		<?php if(isset($icon)): ?>
			<?= svg('assets/icons/' . $icon . '.svg') ?>
		<?php endif ?>
</button>
