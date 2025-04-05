<?php

class Database {
    private $host = "localhost";    
    private $dbname = "gallery"; 
    private $username = "root";     
    private $password = "";         
    private $pdo;                   

    // Constructeur : Établir la connexion à la base de données
    public function __construct() { 
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname . ";charset=utf8";
            $this->pdo = new PDO($dsn, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 

        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
             
        }
    }

    // Fonction pour récupérer la connexion PDO 
    public function getConnection() {
        return $this->pdo;
    }
}

?>
