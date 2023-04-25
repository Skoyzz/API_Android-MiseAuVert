<?php
$host = "localhost";
$namedb = "mise_au_vert";
$login = "root";
$mdp = "root";

try {
    $db = new  PDO("mysql:host=$host;dbname=$namedb", $login, $mdp);
}catch (PDOException $e){
    echo $e->getMessage();
    die();
}