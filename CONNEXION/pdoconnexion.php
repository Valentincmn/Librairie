<?php

session_start(); 

$servername = "localhost";
$username = "root";
$password = "root";

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $mdp = $_POST['password'];

    
    if (empty($email) || empty($mdp)) {
        echo "Veuillez remplir tous les champs.";
    } else {
        try {
            
            $bdd = new PDO("mysql:host=$servername;dbname=membre", $username, $password);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            
            $sql = 'SELECT * FROM users WHERE email = ?';
            $result = $bdd->prepare($sql);
            $result->execute([$email]);

            
            $data = $result->fetch(PDO::FETCH_ASSOC);

            
            if (!$data) {
                echo "Email incorrect ou non trouvé.";
            } elseif (isset($data["mdp"]) && password_verify($mdp, $data["mdp"])) {
                $_SESSION['email'] = $data['email'];
                $_SESSION['id'] = $data['id'];
                
                header("Location: ../ACCUEIL/header 2.php");
                exit();
            } else {
                echo "Mot de passe incorrect.";
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    
}
?>
