<?php
# Das Snippet wird entweder ohne Titel-Variable eingebunden
# snippet('subscribe')
# oder mit:
# snippet('subscribe', ['title' => 'Werde jetzt Mitglied!'])
?>
<section class="subscribe">
    <h2><?= $title ?? "Jetzt Mitglied werden!" ?></h2>
    <p><?= $paragraph ?? "Jeden Monat frische Perspektiven – direkt in dein Postfach." ?></p>
    <form action="https://www.getrevue.co/profile/upstream-newsletter/add_subscriber" method="post" id="revue-form" name="revue-form" target="_blank">
        <input class="revue-form-field" placeholder="Vorname" type="text" name="member[first_name]" id="member_first_name" aria-label="Vorname">
        <input class="revue-form-field" placeholder="E-Mail" type="email" name="member[email]" id="member_email" aria-label="E-Mail">
        <input type="submit" value="<?= $button ?? 'Mitglied werden' ?>" name="member[subscribe]" id="member_submit" class="button button__dark">
    </form>
    <p class="text-small">
        Mit Klick auf <em><?= $button ?? 'Mitglied werden' ?></em> akzeptierst du unsere <a target="_blank" rel="noopener" href="/datenschutz">Datenschutzbestimmungen</a>.
    </p>
</section>
