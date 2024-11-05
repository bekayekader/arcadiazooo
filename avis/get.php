<?php
require_once './plus/api.php';

connexionRequise($resultat);

$traitement = getAvis();

$valid = [];
$attente = [];

foreach ($traitement['data'] as $key => $value) {
    # code...
    if ($value['est_valide'] == 1) {
        $valid[] = $value;
    } else
        $attente[] = $value;

}

$resultat['data'] = ["attente" => $attente, "valid" => $valid];

$resultat['infos'] = $traitement['infos'];
$resultat['result'] = $traitement['result'];


echo json_encode($resultat, JSON_UNESCAPED_UNICODE);
die();
