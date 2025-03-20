<?php
session_start(); // Démarre une session PHP

$servername = "localhost"; // Nom du serveur
$username = "root"; // Nom d'utilisateur de la base de données
$password = "root"; // Mot de passe de la base de données

if (isset($_POST['submit'])) { // Vérifie si le formulaire a été soumis
    $email = $_POST['email']; // Récupère l'email du formulaire
    $mdp = $_POST['password']; // Récupère le mot de passe du formulaire

    if (empty($email) || empty($mdp)) { // Vérifie si les champs sont vides
        $_SESSION['error'] = "Veuillez remplir tous les champs."; // Message d'erreur
        header("Location: login.php"); // Redirige vers la page de connexion
        exit();
    } else {
        try {
            // Connexion à la base de données
            $bdd = new PDO("mysql:host=$servername;dbname=membre", $username, $password);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = 'SELECT * FROM users WHERE email = ?'; // Prépare la requête SQL
            $result = $bdd->prepare($sql); // Prépare la requête
            $result->execute([$email]); // Exécute la requête avec l'email
            $data = $data->fetch(PDO::FETCH_ASSOC); // Récupère les données

            if (!$data) { // Si aucun utilisateur n'est trouvé
                $_SESSION['error'] = "Email incorrect ou non trouvé."; // Message d'erreur
                header("Location: login.php"); // Redirige vers la page de connexion
                exit();
            } elseif (isset($data["mdp"]) && password_verify($mdp, $data["mdp"])) { // Vérifie le mot de passe
                $_SESSION['email'] = $data['email']; // Stocke l'email dans la session
                $_SESSION['id'] = $data['id']; // Stocke l'ID utilisateur dans la session
                header("Location: ../ACCUEIL/header 2.php"); // Redirige vers la page d'accueil
                exit();
            } else {
                $_SESSION['error'] = "Mot de passe ou Email incorrect."; // Message d'erreur
                header("Location: ../CONNEXION/login.php"); // Redirige vers la page de connexion
                exit();
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = "Erreur de connexion à la base de données."; // Message d'erreur
            header("Location: login.php"); // Redirige vers la page de connexion
            exit();
        }
    }
}
?>