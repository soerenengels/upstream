<search>
<?php $params = new Kirby\Http\Params(params()) ?>
<?php snippet('components/forms/form', [
        'class' => $class ?? 'search__form',
        'action' => $action ?? '/suche/' . $params
    ], slots: true) ?>
    <?php snippet('components/forms/input', [
        'type' => 'search',
        'name' => 'q',
				'label' => 'Suche',
        'value' => isset($query) ? html($query) : '',
        'placeholder' => $placeholder ?? 'Durchsuche Upstream …'
    ]) ?>
    <?php snippet('components/forms/button', [
        'type' => 'submit',
				'iconOnly' => $iconOnly ?? true,
        'value' => 'Suchen',
				'icon' => 'search-line'
		]) ?>
<?php endsnippet() ?>
</search>
