<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Métadonnées de base -->
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche de Livres</title>
    <!-- Liens vers les fichiers CSS -->
    <link rel="stylesheet" href="../CSS/header 2.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../CSS/login.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../CSS/register.css?v=<?php echo time(); ?>">
</head>
<body>
    
    <!-- Barre de navigation principale -->
    <div class=nav>
        <!-- Logo cliquable qui renvoie à la page d'accueil -->
        <a href="../ACCUEIL/header 2.php">
            <span id="librai">LIBRAI</span>
            <span id="mid">/</span>
            <span id="book">BOOK</span>
        </a>

        <!-- Boutons de navigation à droite -->
        <div class="nav-r">
            <button id="deconnexion">DECONNEXION</button>
            <a href="../COMPTE/Informationcompte.php"><button id="compte">COMPTE</button></a>
            <button id="livre">MES LIVRES</button>
        </div>
    </div>

    <!-- Barre de recherche -->
    <div class="search-container">
        <input type="text" id="search" placeholder="ENTREZ UN TITRE DE LIVRE">
        <button id="searchButton">RECHERCHER</button>
    </div>

    <!-- Zone d'affichage des résultats de recherche -->
    <div id="results"></div>

    <!-- Scripts JavaScript -->
    <script src="/TP Librairie PHP/scripts/Searchbook.js"></script>
    <script>
        // Gestion du bouton déconnexion
        document.getElementById('deconnexion').addEventListener('click', function() {
            window.location.href = '../ACCUEIL/logout.php';
        });
    </script>
</body>
</html>
    