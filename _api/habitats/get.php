<?php
require_once './plus/api.php';


$traitement = getHabitats();

foreach ($traitement['data'] as $key => $value) {
    # animaux...
    $traitement['data'][$key]['animaux'] = getAnimaux("habitat", ["main" => $value['id']])['data'];
}

$resultat['data'] = $traitement['data'];
$resultat['infos'] = $traitement['infos'];
$resultat['result'] = $traitement['result'];


echo json_encode($resultat, JSON_UNESCAPED_UNICODE);
die();
