<!-Comment installer mon projet ->

🎨 Galerie d'Art – Application de Gestion

Application PHP permettant de gérer des peintures stockées dans des entrepôts : ajout, modification, suppression, affichage.

⚙️ Prérequis

PHP 8

MySQL

Serveur local ( WAMP)

Git

Github

Navigateur web

🚀 Installation

Cloner le projet sur visual studio code :

git clone https://github.com/cyrille-06/Project.git 

Placer dans le serveur local :

Ex : C:/wamp64/www/Projet_Galerie

Créer la base de données :

Aller sur http://localhost/phpmyadmin

Créer une base gallery


Configurer la connexion :

Modifier config/config.php :

$host = 'localhost';
$db   = 'gallery';
$user = 'root';
$pass = '';

Lancer l'application :

Accéder à : http://localhost/projet_galerie/pubic/

📁 Structure du projet

config/ – Connexion à la BDD

src/Models/ – Modèles (Peintures, Entrepôts)

src/Controllers/ – Logique métier

public/ – Fichiers accessibles via le navigateur

assets/ – CSS 

👨‍💼 Auteur

Projet réalisé dans le cadre d’une formation développeur web.Contact : ange.cyrille105@gmail.com


