<?php

$servername = "localhost";
$username = "root";
$password = "root";

try{
    $bdd = new PDO("mysql:host=$servername;dbname=membre", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    }

catch(PDOException $e){
    echo "Erreur : ".$e->getMessage();
}

if(isset($_POST['ok'])){
    $prenom = $_POST['surname'];
    $nom = $_POST['name'];
    $email = $_POST['email'];
    $mdp = password_hash($_POST['password'], PASSWORD_DEFAULT);

$repond = $bdd->exec('USE membre ; INSERT INTO users(prenom,nom,email,mdp) VALUES("'.$prenom.'","'.$nom.'","'.$email.'", "'.$mdp.'");');

header("Location: header 2.php");
}


?>