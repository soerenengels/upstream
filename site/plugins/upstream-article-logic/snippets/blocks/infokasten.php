
<details class="block__infokasten" open="<?= $block->opened()->toBool() ?>">
    <summary class="h4">
        <?= $block->headline() ?>
    </summary>
    <div>
        <?= $block->text() ?>
    </div>
</details>