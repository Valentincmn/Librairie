
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
    $mdp = $_POST['password'];
}

$repond = $bdd->exec('USE membre ; INSERT INTO users(prenom,nom,email,mdp) VALUES("'.$prenom.'","'.$nom.'","'.$email.'", "'.$mdp.'");');

header("Location: home.php");


?>