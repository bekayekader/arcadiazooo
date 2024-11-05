<?php
require_once './plus/api.php';


$champsRequis = ["Habitat" => "main"];
$champsLibres = [];
$t = [];
include $P_c_formTraite;

$traitement = getHabitats("solo", $t);
$resultat['infos'] = $traitement['infos'];
if (count($traitement['data']) == 1) {
  $resultat['result'] = true;
  # animaux...
  $traitement['data'][0]['animaux'] = getAnimaux("habitat", ["main" => $traitement['data'][0]['id']])['data'];
  $resultat['data'] = $traitement['data'][0];
}



echo json_encode($resultat, JSON_UNESCAPED_UNICODE);
die();