<?php snippet('layouts/base', slots: true) ?>

<div class="counter">
    <div class="counter__display" style="--amount: <?= $monthly_amount / 100 ?>; --total: 520;"></div>
    <div class="counter__text"><a href="#steady-plans"><?= $monthly_amount / 100 ?> von 520€ monatlich</a></div>
</div>

<?php snippet('components/article/header') ?>

<?php snippet('layout') ?>

<?php snippet('subscribe', ['title' => 'Du kannst uns aktuell nicht unterstützen?', 'paragraph' => 'Wir verstecken unsere Inhalte hinter keiner Paywall.<br>Unterstütze uns später und abonniere unseren Newsletter.']) ?>
