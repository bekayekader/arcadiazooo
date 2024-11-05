<?php
require_once './plus/api.php';


$champsRequis = ["Pseudo" => "pseudo", "Avis" => "commentaire",];
$champsLibres = [];
$t = [];

include $P_c_formTraite;


$traitement = creerCommentaire($t);

//  $resultat['data']  = $traitement['data'] ; 
$resultat['infos'] = $traitement['infos'];
$resultat['result'] = $traitement['result'];



echo json_encode($resultat, JSON_UNESCAPED_UNICODE);
die();