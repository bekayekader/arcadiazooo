<?php
require_once './plus/api.php';


$traitement = getRecap();

$resultat['data'] = $traitement['data'];
$resultat['infos'] = "R";
$resultat['result'] = true;


echo json_encode($resultat, JSON_UNESCAPED_UNICODE);
die();
