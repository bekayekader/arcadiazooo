<?php
require_once './plus/api.php';
connexionRequise($resultat);

$champsRequis = ["nom" => "nom", "Description" => "description", "Icone" => "icone",];
$champsLibres = [];
$t = [];

include $P_c_formTraitePost;

$traitement = addService($pdo, $t);


$resultat['infos'] = $traitement['infos'];
$resultat['result'] = $traitement['result'];



echo json_encode($resultat, JSON_UNESCAPED_UNICODE);
die();