<?php
    # TODO: Twitter-Url in Site einbinden
    # TODO: Logo in Site einbinden
    # TODO: ggfs. Steady- und Instagram-Url in Site einbinden
?>
<?php

use Spatie\SchemaOrg\Graph;
$graph = new Graph;

/**
 *  Zeige auf der Startseite das Schema für:
 *  - Organization /#organization
 *  - Logo /#logo
 *  - Website /#website
*/


/* https://schema.org/Organization */
/* https://schema.org/WebSite */
/* https://schema.org/WebPage */
/* https://schema.org/NewsArticle */


$graph->organization()
	->id($site->url() . '/#organization')
	->name($site->title())
	->email('mail@upstream-newsletter.de')
	->url($site->url())
	->sameAs("https://instagram.com/upstream.mail/")
	->logo($graph->imageobject('logo'))
	->image($graph->imageobject('logo'));

$logo = asset('/assets/images/icons/logo_new.png');
$graph->imageobject('logo')
	->id($site->url() . '/#logo')
	->inLanguage('de-DE')
	->url($logo->url())
	->width($logo->width())
	->height($logo->height());

$graph->website()
	->id($site->url() . '/#website')
	->name('Wie wirkt Ungleichheit auf Gesundheit? | Upstream, der Sozialmedizin-Newsletter')
	->alternateName('Wie macht Ungleichheit krank?')
	->url($site->url())
	->image($graph->imageobject($site->url() . '/#logo'))
	->provider($graph->organization());

	/**
 *  Zeige auf jeder Seite das Schema für:
 *  - Webpage url/#webpage
*/
$graph->webpage()
	->id($page->url() . '/#webpage')
	->url($page->url())
	->name($page->title())
	->isPartOf($graph->website())
	->datePublished($page->date()->toDate('c'))
	->dateModified($page->content()->modified()->toDate('c'))
	->inLanguage('de-DE')
	->potentialAction($site->schema('ReadAction')->target($page->url()));

/**
 *  Zeige auf Artikelseiten das Schema für:
 *  - Webpage url/#webpage
*/
$article_image = $page->images()->template('cover')?->first()?->url() ?? null;
$graph->newsarticle($page->uuid())
	->headline($page->title()) //seotitle
	->if(isset(($article_image)), function($schema) use ($article_image) {
		$schema->image($article_image);
	})
	->datePublished($page->date()->toDate('c'))
	->dateModified($page->content()->modified()->toDate('c'));


if ( $page != page('home') ) :
	$graph->hide(\Spatie\SchemaOrg\Organization::class);
	$graph->hide(\Spatie\SchemaOrg\WebSite::class);
endif;
if ( $page->template() != 'article' ) :
	$graph->hide(\Spatie\SchemaOrg\NewsArticle::class);
endif;

if ( $page->template() == 'article' && $page->context_author()) :
	$authors = [];
	foreach ($page->context_author()->toUsers() as $author):

		$authors[] = $graph->person($author->username())
			->name($author->username())
			->id($site->url() . '/redaktion/' . Str::slug($author->username()) . '/#person');

	endforeach;
	$graph->newsarticle($page->uuid())
			->author($authors);
		$graph->hide(\Spatie\SchemaOrg\Person::class);
endif;


echo $graph;
?>
