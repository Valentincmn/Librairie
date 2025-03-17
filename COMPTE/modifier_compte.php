<?php
// Démarrer la session
session_start();

// Configuration de la base de données
$host = "localhost";
$dbname = "membre";
$username = "root";
$password = "root";

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Connexion à la base de données
        $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupération des données du formulaire
        $prenom = htmlspecialchars($_POST['prenom']);
        $nom = htmlspecialchars($_POST['nom']);
        $email = htmlspecialchars($_POST['email']);
        $password = $_POST['password'];

        // Préparation de la requête de base
        if (!empty($password)) {
            // Avec changement de mot de passe
            $sql = "UPDATE users SET 
                    prenom = :prenom,
                    nom = :nom,
                    email = :email,
                    mdp = :password
                    WHERE email = :old_email";
            
            $stmt = $bdd->prepare($sql);
            $stmt->execute([
                ':prenom' => $prenom,
                ':nom' => $nom,
                ':email' => $email,
                ':password' => password_hash($password, PASSWORD_DEFAULT),
                ':old_email' => $_SESSION['email']
            ]);
        } else {
            // Sans changement de mot de passe
            $sql = "UPDATE users SET 
                    prenom = :prenom,
                    nom = :nom,
                    email = :email
                    WHERE email = :old_email";
            
            $stmt = $bdd->prepare($sql);
            $stmt->execute([
                ':prenom' => $prenom,
                ':nom' => $nom,
                ':email' => $email,
                ':old_email' => $_SESSION['email']
            ]);
        }

        // Déconnecter l'utilisateur
        session_destroy();
        
        // Rediriger vers la page de connexion
        header("Location: ../CONNEXION/login.php");
        exit();

    } catch(PDOException $e) {
        // En cas d'erreur, rediriger avec un message d'erreur
        header("Location: ../COMPTE/Informationcompte.php?error=" . urlencode("Erreur : " . $e->getMessage()));
        exit();
    }
} else {
    // Si quelqu'un essaie d'accéder directement à cette page
    header("Location: ../COMPTE/Informationcompte.php");
    exit();
}
?> 