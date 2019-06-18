<?php

ini_set( 'display_errors', 1 );
error_reporting( E_ALL );

$idUser = $_POST["userId"];

$pathJson = "../json/commande/contrat.json";

if(file_exists($pathJson) && filesize($pathJson) != 0) {

$dataContrat = (substr($_POST["jsonFile"], 1, -1) . ']');


$dataFile = file_get_contents($pathJson);
$dataSubstr = substr($dataFile, 0, -1);

$dataFileAjout = $dataSubstr . ',' . $dataContrat;

$userFile = fopen($pathJson, "c")
or die("Unable to open the file...");

flock($userFile, LOCK_EX | LOCK_NB);

fwrite($userFile, $dataFileAjout);

flock($userFile, LOCK_UN);

fclose($userFile);

} else {

    // $dataContrat = '[{"categorie" : ['. substr($_POST["jsonFile"], 1, -1 ) . ']}]';
    $dataContrat = $_POST["jsonFile"];

    $userFile = fopen($pathJson, "c")
    or die("Unable to open the file...");

    flock($userFile, LOCK_EX | LOCK_NB);

    fwrite($userFile, $dataContrat);

    flock($userFile, LOCK_UN);

    fclose($userFile);

    // if (flock($userFile, LOCK_EX | LOCK_NB)) {

    //     fwrite($userFile, 'file locked');

    //     flock($userFile, LOCK_UN);

    //     fclose($userFile); 

    // } else {
        
    //     fwrite($userFile, 'file not locked');

    //     flock($userFile, LOCK_UN);

    //     fclose($userFile); 
    // }
}

$dataContrat = $_POST["jsonFile"];

$pathJsonb = "../json/commande/$idUser.json";


$userFile = fopen($pathJsonb, "w")
or die("Unable to open the file...");

ftruncate($userFile, 0);

flock($userFile, LOCK_EX | LOCK_NB);

fwrite($userFile, $dataContrat);

flock($userFile, LOCK_UN);

fclose($userFile);

header('Location: ../../commande');

?>