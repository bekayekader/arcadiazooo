<?php
require_once './plus/api.php';
connexionRequise($resultat);

$champsRequis = ["Email" => "email", "Role" => "role",];
$champsLibres = [];
$t = [];

include $P_c_formTraitePost;

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $resultat['infos'] = "$email n'est pas une adresse valide!";
  echo json_encode($resultat, JSON_UNESCAPED_UNICODE);
  die();
}
$defaut = "arcadia";
$t['password'] = sha1($defaut);

$traitement = addUser($pdo, $t);


$resultat['infos'] = $traitement['infos'] . $defaut;
$resultat['result'] = $traitement['result'];



echo json_encode($resultat, JSON_UNESCAPED_UNICODE);
die();