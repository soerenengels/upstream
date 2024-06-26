<<?= $level = $block->level()->or('h2') ?> id="<?= $block->customId()->or($block->id()) ?>">
  <?= $block->text() ?>
</<?= $level ?>>