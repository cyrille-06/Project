<?php
namespace App\Models;

/**
 * Class Database pour gérer données 

 * Cette classe gère la connexion à une base de données MySQL en utilisant PDO
 */
class Database {
    /**
     * @var \PDO|null Connexion à la base de données
     */
    private $conn;

    /**

     * @throws \PDOException Si la connexion échoue
     */
    public function __construct() {
        // Chargement du fichier de configuration contenant les informations de connexion
        $config = require __DIR__ . '/../../config/config.php';

        try {
            // Création d'une connexion PDO avec les paramètres extraits de la configuration
            $this->conn = new \PDO(
                "mysql:host={$config['host']};dbname={$config['dbname']}",
                $config['user'],
                $config['password']
            );

            // Configuration du mode d'erreur pour lever des exceptions en cas de problème
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        } catch (\PDOException $e) {
            // En cas d'erreur de connexion, affichage d'un message et arrêt du script
            die("Connection failed: " . $e->getMessage());
        }
    }

    /**
     * Retourne la connexion à la base de données
     * 
     * @return \PDO Connexion active à la base de données
     */
    public function getConnection() {
        return $this->conn;
    }
}
