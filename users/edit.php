<?php
require_once './plus/api.php';
connexionRequise($resultat);


$champsRequis = ["Email" => "email", "Role" => "role", "Utilisateur" => "id",];
$champsLibres = [];
$t = [];

include $P_c_formTraitePost;

$traitement = editUser($pdo, $t);

//  $resultat['data']  = $traitement['data'] ; 
$resultat['infos'] = $traitement['infos'];
$resultat['result'] = $traitement['result'];



echo json_encode($resultat, JSON_UNESCAPED_UNICODE);
die();