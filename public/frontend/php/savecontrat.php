<?php

ini_set( 'display_errors', 1 );
error_reporting( E_ALL );

// ### save in user.json ####

if ($_POST["userId"] && ($_POST["jsonFileUser"] || $_POST['jsonFileUser'] == null)) {

$idUser = $_POST['userId'];
$dataContrat = ($_POST["jsonFileUser"]);

$pathJson = "../json/commande/$idUser.json";


$userFile = fopen($pathJson, "c")
or die("Unable to open the file...");

ftruncate($userFile, 0);

flock($userFile, LOCK_EX | LOCK_NB);

fwrite($userFile, $dataContrat);

flock($userFile, LOCK_UN);

fclose($userFile);

}


// ######## save in contrat.json #########

if ($_POST["jsonFile"]) {
    
    $pathJson = "../json/commande/contrat.json";
    
    if (file_exists($pathJson) && filesize($pathJson) != 0) {

        if ($_POST["jsonFile"] == null) {

            return header('Location: ../../contrats');
        }
    
    $dataContrats = substr($_POST["jsonFile"], 1, -1 ) . ']';
    
    $dataFiles = file_get_contents($pathJson);
    $dataSubstr = substr($dataFiles, 0, -1);
    
    $dataFileAjout = $dataSubstr . ',' . $dataContrats;
    
    $userFiles = fopen($pathJson, "c")
    or die("Unable to open the file...");

    ftruncate($userFiles, 0);
    
    flock($userFiles, LOCK_EX | LOCK_NB);
    
    fwrite($userFiles, $dataFileAjout);
    
    flock($userFiles, LOCK_UN);
    
    fclose($userFiles);
    
    } else {
    
        $dataContrats = $_POST["jsonFile"];

        $pathJson = "../json/commande/contrat.json";
        
        $userFiles = fopen($pathJson, "c")
        or die("Unable to open the file...");

        ftruncate($userFiles, 0);
        
        flock($userFiles, LOCK_EX | LOCK_NB);
    
        fwrite($userFiles, $dataContrats);
    
        flock($userFiles, LOCK_UN);
    
        fclose($userFiles);

        }
    }

    header('Location: ../../contrats');

?>