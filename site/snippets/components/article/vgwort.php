
<?php if ($page->vgwort()->isNotEmpty()): ?>
<?php
    /* $url = 'http://vg09.met.vgwort.de/na/'; */
    $url = '';
?>
<img src="<?= $url . $page->vgwort() ?>" width="1" height="1" alt="" />
<?php endif ?>
