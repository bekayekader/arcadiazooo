<?php
require_once './plus/api.php';
$resultat['is_auth'] = true;

$champsRequis = ["Pseudo" => "user", "Mot de passe" => "password",];
$champsLibres = ["stay"];
$t = [];

include $P_c_formTraite;

$reponse = loginFunc($pdo, $user, $password, $stay);


$resultat['result'] = $reponse['result'];
$resultat['infos'] = $reponse['infos'];
$resultat['data'] = $reponse['data'];


echo json_encode($resultat, JSON_UNESCAPED_UNICODE);
die();