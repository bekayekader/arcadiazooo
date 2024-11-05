<?php
require_once './plus/api.php';
connexionRequise($resultat);


$champsRequis = ["Avis" => "avis"];
$champsLibres = [];
$t = [];

include $P_c_formTraite;

$traitement = accepterAvis($t);

//  $resultat['data']  = $traitement['data'] ; 
$resultat['infos'] = $traitement['infos'];
$resultat['result'] = $traitement['result'];



echo json_encode($resultat, JSON_UNESCAPED_UNICODE);
die();