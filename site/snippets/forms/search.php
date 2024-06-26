<search>
<?php snippet('components/forms/form', [
        'class' => $class ?? 'search__form',
        'action' => $action ?? '/suche'
    ], slots: true) ?>
    <?php snippet('components/forms/input', [
        'type' => 'search',
        'name' => 'q',
        'value' => isset($query) ? html($query) : '',
        'placeholder' => $placeholder ?? 'Durchsuche Upstream'
    ]) ?>
    <?php snippet('components/forms/input', [
        'type' => 'submit',
        'class' => 'button button__dark',
        'value' => 'Suchen'
    ]) ?>
<?php endsnippet() ?>
</search>
