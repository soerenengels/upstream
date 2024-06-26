<ul class="users" id="team">

	<?php foreach(($authors = $block->upstream_team_members()->toUsers()) as $author): ?>

		<?php snippet('components/user', [
			'user' => $author,
			'class' => $author->role() == 'editor-inactive' ? 'inactive' : ($author->role() == 'advisor' ? 'advisor' : false)
		], slots: true) ?>

		<?php if ($block->upstream_team_show_text() == "true"): ?>
			<p><?= $author->statement(); ?></p>
		<?php endif ?>

		<?php endsnippet() ?>

	<?php endforeach ?>

</ul>
