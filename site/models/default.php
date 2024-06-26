<?php
use Kirby\Cms\Page;

class DefaultPage extends Page {
	public function metaDefaults(string $lang = null): array {

		// Get content of the page in the current language
		$content = $this->content($lang);

		return [
			'metaDescription' => $content->metaDescription() ?? $content->teaser() ?? site()->metaDescription(),
			'twitterAuthor' => '@' . $this->site()->twitter(),

			// Open Graph Image
			//'og:image' => "{$this->url()}.png",
			'og:image' => "{$this->url()}/og-image",

			"og:image:width" => 1230,
			"og:image:height" => 600,
			"og:image:alt" => "An image showing the beautiful city of {$this->title()}"
		];
	}
}
