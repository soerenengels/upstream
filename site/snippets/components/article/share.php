<aside class="article__share no-external">
        <h2 class="info community">Teile die Seite</h2>
        <ul>
            <li>
                	<a
                        href="mailto:?subject=Ich habe einen interessante Text gefunden&amp;body=Schau dir mal diese Seite an: <?= $page->url() ?>"
                        title="Per Email teilen">
                        <?= svg('assets/icons/mail-fill.svg') ?> per E-Mail
                    </a>
            </li>
            <li>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $page->url() ?>">
                    <?= svg('assets/icons/facebook-box-fill.svg') ?> auf Facebook
                </a>
            </li>
            <li>
                <a href="https://twitter.com/intent/tweet?url=<?= $page->url() ?>&text=Das%20habe%20ich%20gerade%20bei%20Upstream%20gelesen">
                    <?= svg('assets/icons/twitter-x-fill.svg') ?> auf Twitter
                </a>
            </li>
            <li>
                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= $page->url() ?>">
                    <?= svg('assets/icons/linkedin-box-fill.svg') ?> in LinkedIn
                </a>
            </li>
            <li>
                <a href="https://getpocket.com/save?url=<?= $page->url() ?>">
                    <?= svg('assets/icons/bookmark-fill.svg') ?> in Pocket speichern
                </a>
            </li>
            <li>
                <a  href="#"
                    onClick="window.print()">
                    <?= svg('assets/icons/printer-fill.svg') ?> Seite drucken
                </a>
            </li>
        </ul>

    </aside>
