<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche de Livres</title>
    <link rel="stylesheet" href="/TP Librairie PHP/CSS/header 2.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/TP Librairie PHP/CSS/login.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/TP Librairie PHP/CSS/register.css?v=<?php echo time(); ?>">
    
</head>
<body>
    
    <div class=nav>

        <span id="librai">LIBRAI</span>
        <span id="mid">/</span>
        <span id="book">BOOK</span>

        <div class="nav-r">
            <button id="deconnexion">DECONNEXION</button>
            <button id="compte">COMPTE</button>
            <button id="livre">MES LIVRES</button>
            
            
        </div>
        

    </div>

    <div class="search-container">
        <input type="text" id="search" placeholder="ENTREZ UN TITRE DE LIVRE">
        <button id="searchButton">RECHERCHER</button>
    </div>
    <div id="results"></div>

    <script src="/TP Librairie PHP/scripts/Searchbook.js"></script>
    <script>
        document.getElementById('deconnexion').addEventListener('click', function() {
            // Redirection vers la page de déconnexion
            window.location.href = '/TP Librairie PHP/logout.php';
        });
    </script>
</body>
</html>
    