<?php snippet('components/forms/form', [
    'action' => $page->url(),
    'class' => 'poll',
    'method' => 'POST'
], slots: true ) ?>

    <?php if($success): ?>

        <?php /* Success Item */ ?>
        <section class="poll__success">
            <h1><?= $successPage->title() ?></h1>
            <?= $successPage->text()->toBlocks() ?>
        </section>

    <?php else: ?>

    <!-- Poll-Navigation -->
		<?php snippet('components/navigation/bullet', [
			'items' => $poll_items,
			'class' => 'poll_navigation',
			'bullet_items_selector' => '[".poll__item:not(.poll__explainer)"]'
		]) ?>

    <!-- Poll-Explainer -->
    <section
        class="poll__item poll__explainer active"
        data-poll-item=0>
        <section>
            <?= $page->text()->toBlocks() ?>
            <input
                class="
                    poll__button
                    poll__button--light
                    poll__button--start"
                type="button"
                value="Los geht's"
                onclick="setPollItem(1)">
        </section>

        <!-- Poll: Table of Content -->
        <nav class="poll__toc">
            <ol>
                <?php
                    $index = 1;
                    foreach ($poll_items as $item):
                ?>
                <li
                    data-poll-item="<?= $index ?>"
                    class="<?= $index == 1 ? 'active' : '' ?>">
                    <?= $item->title() ?>
                </li>
                <?php
                    $index++;
                    endforeach;
                ?>
            </ol>
        </nav>
    </section>

    <?php $index = 1 ?>
    <?php foreach ($poll_items as $item): ?>

    <section
        class="poll__item <?= $index == 1 ? 'active' : '' ?>"
        data-poll-item="<?= $index ?>">

        <?php if ($index == 1): ?>
            <h1 class="h2"><?= $page->title()->html() ?></h1>
        <?php endif ?>
        <?= $item->text()->toBlocks() ?>

        <div
            class="poll__buttons">
            <?php if ($index != 1): ?>
                <input
                    class="poll__button
                        poll__button--light"
                    type="button"
                    value="Zurück"
                    onclick="setPollItem(<?= $index - 1 ?>)" >
            <?php endif ?>
            <?php if ($index != $poll_items->count()): ?>
                <input
                    class="poll__button
                        poll__button--dark"
                    type="button"
                    value="Weiter"
                    onclick="setPollItem(<?= $index + 1 ?>)">
            <?php else: ?>
                <input
                    class="poll__button
                        poll__button--dark"
                    type="submit"
                    value="Abschicken"
                    name="submit" >
            <?php endif ?>
        </div>

    </section>
    <?php
        $index++;
        endforeach;
    ?>



    <?php endif ?>

<?php endsnippet() ?>
