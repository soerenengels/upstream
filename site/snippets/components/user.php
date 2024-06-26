<?php
// Options
$tag = $tag ?? 'li';
$class = $class ?? '';
$image = $user->avatar();
$name = $user->name();
$url = "/redaktion/" . $name->slug();
$role = $user->role()->title();
?>

<<?= $tag ?> class="user <?= $class ?>">
	<?php snippet('components/picture', ['image' => $image ]) ?>

	<h2>
		<a href="<?= $url ?>">
			<?= $name ?>
		</a>
	</h2>

	<?php if($role != false): ?>
		<span><?= $role ?></span>
	<?php endif ?>

  <?= $slot ?>

</<?= $tag ?>>
