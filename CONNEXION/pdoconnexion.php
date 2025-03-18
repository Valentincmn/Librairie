<?php
session_start(); 

$servername = "localhost";
$username = "root";
$password = "root";

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $mdp = $_POST['password'];

    if (empty($email) || empty($mdp)) {
        $_SESSION['error'] = "Veuillez remplir tous les champs.";
        header("Location: login.php");
        exit();
    } else {
        try {
            $bdd = new PDO("mysql:host=$servername;dbname=membre", $username, $password);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = 'SELECT * FROM users WHERE email = ?';
            $result = $bdd->prepare($sql);
            $result->execute([$email]);
            $data = $result->fetch(PDO::FETCH_ASSOC);

            if (!$data) {
                $_SESSION['error'] = "Email incorrect ou non trouvé.";
                header("Location: login.php");
                exit();
            } elseif (isset($data["mdp"]) && password_verify($mdp, $data["mdp"])) {
                $_SESSION['email'] = $data['email'];
                $_SESSION['id'] = $data['id'];
                header("Location: ../ACCUEIL/header 2.php");
                exit();
            } else {
                $_SESSION['error'] = "Mot de passe ou Email incorrect.";
                header("Location: login.php");
                exit();
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = "Erreur de connexion à la base de données.";
            header("Location: login.php");
            exit();
        }
    }
}
?>