<?php
// Démarrer la session
session_start();

// Connexion simple à la base de données
$bdd = new PDO("mysql:host=localhost;dbname=membre", "root", "root");

// Récupérer les informations de l'utilisateur connecté
$email = $_SESSION['email'];

// Ajout de la vérification de session et préparation de la requête
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

// Utilisation d'une requête préparée pour plus de sécurité
$requete = $bdd->prepare("SELECT * FROM users WHERE email = ?");
$requete->execute([$email]);
$user = $requete->fetch();

// Vérification si l'utilisateur existe
if (!$user) {
    header('Location: ../CONNEXION/login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte</title>
    <link rel="stylesheet" href="/TP Librairie PHP/CSS/header 2.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/TP Librairie PHP/CSS/login.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/TP Librairie PHP/CSS/register.css?v=<?php echo time(); ?>">
</head>
<body>
    <!-- Barre de navigation -->
    <div class="nav">
        <a href="../Accueil/header 2.php">
            <span id="librai">LIBRAI</span>
            <span id="mid">/</span>
            <span id="book">BOOK</span>
        </a>

        <div class="nav-r">
            <button id="deconnexion">DECONNEXION</button>
            <a href="Informationcompte.php"><button id="compte">COMPTE</button></a>
            <button id="livre">MES LIVRES</button>
        </div>
    </div>

    <!-- Formulaire avec les informations -->
    <div class="container">
        <div class="wrapper">
            <section class="register">
                <form method="POST" action="modifier_compte.php" id="accountForm">
                    <div class="inputbox">
                        <input type="text" name="prenom" 
                               value="<?php echo $user['prenom']; ?>" 
                               placeholder="Prénom"
                               readonly>
                    </div>
                    <div class="inputbox">
                        <input type="text" name="nom" 
                               value="<?php echo $user['nom']; ?>" 
                               placeholder="Nom"
                               readonly>
                    </div>
                    <div class="inputbox">
                        <input type="email" name="email" 
                               value="<?php echo $user['email']; ?>" 
                               placeholder="Email"
                               readonly>
                    </div>
                    <div class="inputbox" id="passwordField" style="display: none;">
                        <input type="password" name="password" 
                               placeholder="Nouveau mot de passe">
                    </div>
                    
                    <button type="button" id="enableEdit">MODIFIER</button>
                    <button type="submit" name="saveChanges" id="saveChanges" style="display: none;">ENREGISTRER</button>
                </form>   
            </section>
        </div>
    </div>

    <script>
        document.getElementById('deconnexion').addEventListener('click', function() {
            window.location.href = '../ACCUEIL/logout.php';
        });

        document.getElementById('enableEdit').addEventListener('click', function() {
            const inputs = document.querySelectorAll('input');
            inputs.forEach(input => {
                input.removeAttribute('readonly');
            });
            
            document.getElementById('passwordField').style.display = 'block';
            this.style.display = 'none';
            document.getElementById('saveChanges').style.display = 'block';
        });
    </script>
</body>
</html>



