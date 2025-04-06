<?php

// Définition des constantes pour la connexion à la base de données
define('DB_HOST', 'localhost');   // L'hôte du serveur de base de données 
define('DB_NAME', 'gallery');     // Le nom de la base de données
define('DB_USER', 'root');        // Le nom d'utilisateur pour se connecter à la base de données 
define('DB_PASS', '');            // Le mot de passe pour l'utilisateur 

// On essaie de se connecter à la base de données avec PDO
try {
    // Création de la connexion PDO avec les informations définies au-dessus
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);

    // Définition des attributs de la connexion
    // ATTR_ERRMODE permet de définir le mode de gestion des erreurs 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // ATTR_DEFAULT_FETCH_MODE définit le mode de récupération des résultats 
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // En cas d'erreur, on arrête le script et affiche un message d'erreur
    die("Erreur de connexion : " . $e->getMessage());
}

?>
