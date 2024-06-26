
<?php
$format = $block->upstream_format_select();
switch($format) {
    case 'Interview':
        $title = $format;
        $id = 'interview';
        break;
    case 'Begriff erklärt':
        $title = $format;
        $id = 'begriff';
        break;
    case 'Modell erklärt':
        $title = $format;
        $id = 'modell';
        break;
    case 'Narrativ hinterfragt':
        $title = $format;
        $id = 'narrativ';
        break;
    case 'Aktuelles':
        $title = $format;
        $id = 'aktuelles';
        break;
    case 'Takeaways':
        $title = $format;
        $id = 'takeaways';
        break;
    case 'Schlaglichter':
        $title = $format;
        $id = 'schlaglichter';
        break;
    case 'Anhang':
        $title = $format;
        $id = 'anhang';
        break;
    case 'Praxistauglich':
        $title = $format;
        $id = 'praxistauglich';
        break;
    case 'Selbst eintragen':
        $title = $block->upstream_format_title();
        $id = $block->upstream_format_id();
        break;
    default:
        $title = "Something went wrong";
        $id = '';
}
?>
<p class="format__title" id="<?= $id ?>">
    <?= $block->upstream_format_select() ?>
</p>