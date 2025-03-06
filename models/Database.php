<?php
/* classe Database
* Se connecter à la base de données
* Bien gérer les ressources (pattern Singleton)
* Simplifier l'utilisation de pdo
*/
class Database
{
    // Instance unique de la connexion
    private static $instance = null;

    // Stocker l'objet PDO
    private $pdo;

    // Constructeur privé (ne peut être appelé que par getInstance)
    private function __construct()
    {
        // Configuration de la base de données
        $host = "localhost";
        $dbname = "produits";
        $user = "root";
        $pass = "";

        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }

    // Méthode d'accès unique à l'instance
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    // Retourne la connexion PDO
    public function getConnexion()
    {
        return $this->pdo;
    }
}


// Exemple pour appeler cette classe
//$db = Database::getInstance()->getConnexion();