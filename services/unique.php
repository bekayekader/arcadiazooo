<?php
require_once './plus/api.php';


connexionRequise($resultat);



$champsRequis = ["Utilisateur" => "main"];
$champsLibres = [];
$t = [];
include $P_c_formTraitePost;

$traitement = getServices("solo", $t);
$resultat['infos'] = $traitement['infos'];
$resultat['result'] = $traitement['result'];
if (count($traitement['data']) == 1)
  $resultat['data'] = $traitement['data'][0];




echo json_encode($resultat, JSON_UNESCAPED_UNICODE);
die();