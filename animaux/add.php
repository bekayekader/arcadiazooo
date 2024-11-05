<?php
require_once './plus/api.php';
connexionRequise($resultat);

$champsRequis = ["nom" => "prenom", "Race" => "race", "habitat" => "habitat",];
$champsLibres = [];
$t = [];

include $P_c_formTraitePost;

$t['slug'] = create_slug($prenom);
$t['image'] = $t['slug'] . ".jpg";
$image = $t['image'];

if (!isset($_FILES['image'])) {
    $resultat['result'] = $traitement['result'];
    echo json_encode($resultat, JSON_UNESCAPED_UNICODE);
    die();
}


$traitement = addAnimal($pdo, $t);

if ($traitement['result']) {
    $folder_img = "../assets/img/animaux/" . $traitement['infos'];
    $traitement['infos'] = $prenom . " a été ajouté";
    if (mkdir($folder_img))
        move_uploaded_file($_FILES['image']['tmp_name'], $folder_img . "/" . $image);
}

$resultat['infos'] = $traitement['infos'];
$resultat['result'] = $traitement['result'];



echo json_encode($resultat, JSON_UNESCAPED_UNICODE);
die();