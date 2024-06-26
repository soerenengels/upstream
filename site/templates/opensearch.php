<?php /* via https://bart.degoe.de/tab-plus-search-from-your-url-bar-with-opensearch/ */ ?>
<OpenSearchDescription xmlns="http://a9.com/-/spec/opensearch/1.1/" xmlns:moz="http://www.mozilla.org/2006/browser/search/">
    <ShortName>Upstream</ShortName>
		<LongName>Upstream | Magazin für faire Gesundheit</LongName>
    <Description>Wir recherchieren, wie Ungleichheit krank macht und was dagegen getan werden kann.</Description>
    <Url type="text/html" method="get" template="<?= $page('suche')->url() ?>?q={searchTerms}" />
     <Image height="32" width="32" type="image/x-icon"><?= $site->url() ?>favicon.ico</Image>
</OpenSearchDescription>
