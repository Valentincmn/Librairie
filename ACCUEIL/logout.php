<?php
session_start(); // Démarrer la session
session_unset(); // Supprimer toutes les variables de session
session_destroy(); // Détruire la session

// Redirection vers la page de connexion avec le chemin absolu correct
header("Location: ../CONNEXION/login.php");
exit();
?> 

