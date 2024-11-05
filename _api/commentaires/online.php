<?php
require_once './plus/api.php';


$traitement = getAvis("online");

$resultat['data'] = $traitement['data'];
$resultat['infos'] = $traitement['infos'];
$resultat['result'] = $traitement['result'];


echo json_encode($resultat, JSON_UNESCAPED_UNICODE);
die();
