
<?php

// Se connecter à la base de données
include("dbconnect.php");
$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method)
{
    case 'POST':
        //updateLoc($db);
        selectUser($db);
        break;

    default:
        // Requête invalide
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}


function selectUser($db){

    $requete = $db->prepare("SELECT * FROM proprietaire WHERE identifiant = ?");
    $reussi =  $requete->execute(array($_POST['login']));

    //$lignesModifiees = $requete->rowCount();

    $result = $requete->fetchAll();
    $mdp=$result [0]["password"];
    if($_POST['mdp'] == $mdp){
        $response=array(
            'status' => 1,
            'status_message' =>'Connexion ok'
        );
    }else{
        $response=array(
            'status' => 0,
            'status_message' =>'Connexion refusée'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}