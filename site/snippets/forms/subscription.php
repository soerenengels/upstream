<?php snippet('components/forms/form', [
        'class' => $class ?? 'subcription__form card community',
        'action' => $action ?? '/abonnieren'
    ], slots: true) ?>
    <?php snippet('components/forms/input', [
        'type' => 'email',
        'name' => 'email',
        'value' => isset($query) ? html($query) : '',
        'placeholder' => $placeholder ?? 'name@email.de'
    ]) ?>
    <?php snippet('components/forms/input', [
        'type' => 'submit',
        'class' => 'button button__dark',
        'value' => 'Jetzt abonnieren'
    ]) ?>
<?php endsnippet() ?>
