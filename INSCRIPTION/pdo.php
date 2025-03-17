<?php
// Les informations de connexion à la base de données MySQL
$servername = "localhost";    
$username = "root";          
$password = "root";          

try {
    // On crée une connexion à la base de données 'membre'
    $bdd = new PDO("mysql:host=$servername;dbname=membre", $username, $password);
    // On configure PDO pour qu'il affiche les erreurs
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // On vérifie si le formulaire a été envoyé (si le bouton 'ok' a été cliqué)
    if(isset($_POST['ok'])) {
        // On récupère les données du formulaire et on les sécurise
        $prenom = htmlspecialchars($_POST['surname']);    // Protection contre les failles XSS
        $nom = htmlspecialchars($_POST['name']);         // Protection contre les failles XSS
        $email = htmlspecialchars($_POST['email']);      // Protection contre les failles XSS
        $mdp = password_hash($_POST['password'], PASSWORD_DEFAULT);  // On crypte le mot de passe

        // On prépare la requête SQL pour insérer les données
        // Les ? sont des paramètres qui seront remplacés par les vraies valeurs
        $sql = "INSERT INTO users (prenom, nom, email, mdp) VALUES (?, ?, ?, ?)";
        $stmt = $bdd->prepare($sql);  // On prépare la requête pour éviter les injections SQL
        
        // On exécute la requête en remplaçant les ? par nos valeurs
        $stmt->execute([$prenom, $nom, $email, $mdp]);

        // Une fois inscrit, on redirige vers la page principale
        header("Location: ../ACCUEIL/header 2.php");
        exit();  // On arrête l'exécution du script
    }
}
// Si une erreur survient pendant la connexion ou l'insertion
catch(PDOException $e) {
    // On affiche le message d'erreur
    echo "Erreur : ".$e->getMessage();
}
?>