<?php
require_once './plus/api.php';
connexionRequise($resultat);


$champsRequis = ["nom" => "nom", "Description" => "description", "Icone" => "icone", "Service" => "id",];
$champsLibres = [];
$t = [];

include $P_c_formTraitePost;

$traitement = editService($pdo, $t);

//  $resultat['data']  = $traitement['data'] ; 
$resultat['infos'] = $traitement['infos'];
$resultat['result'] = $traitement['result'];



echo json_encode($resultat, JSON_UNESCAPED_UNICODE);
die();