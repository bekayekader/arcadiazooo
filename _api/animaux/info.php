<?php
require_once './plus/api.php';


$champsRequis = ["Animal" => "main"];
$champsLibres = [];
$t = [];
include $P_c_formTraite;

$traitement = getAnimaux("solo", $t);
$resultat['infos'] = $traitement['infos'];
if (count($traitement['data']) == 1) {
  $visualiser = (int) $traitement['data'][0]['visualiser'];
  $nouvelleValeur = $visualiser + 1;
  incrementerVue($traitement['data'][0]['id'], $nouvelleValeur);
  $images = [];
  $dossierImages = "./assets/img/animaux/" . $traitement['data'][0]['id'];
  $scandir = scandir($dossierImages);
  foreach ($scandir as $fichier) {
    if ($fichier != '.' && $fichier != '..')
      $images[] = $fichier;
  }
  $traitement['data'][0]['images'] = $images;
  $resultat['result'] = true;
  $resultat['data'] = $traitement['data'][0];

}



echo json_encode($resultat, JSON_UNESCAPED_UNICODE);
die();