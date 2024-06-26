<?php return ?>
<p style="text-align: right; max-width: unset; font-size: var(--font-size-s);">
<?php
	$user_id = $kirby->session()->get('kirby.userId');
	if(
		$user_id &&
		($session_user = $kirby->users()->find($user_id))->isLoggedIn() &&
		($login ?? null) !== false
	):
		echo "Hallo " . $session_user->nameOrEmail() . "! ";
	?>
<a href="<?= $page->panel()->url() ?>">Bearbeiten</a>
	<?php

	endif;
	?>
</p>
