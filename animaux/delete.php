<?php
require_once './plus/api.php';
connexionRequise($resultat);


$champsRequis = ["Animal" => "elt"];
$champsLibres = [];
$t = [];

include $P_c_formTraitePost;

$traitement = deleteAnimal($t);

//  $resultat['data']  = $traitement['data'] ; 
$resultat['infos'] = $traitement['infos'];
$resultat['result'] = $traitement['result'];



echo json_encode($resultat, JSON_UNESCAPED_UNICODE);
die();