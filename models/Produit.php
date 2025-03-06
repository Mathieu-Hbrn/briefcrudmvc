<?php
require_once 'Database.php';
/* classe produit
* Caractéristiques : nom, prix, stock
 * On utilise des propriétés privées pour encapsuler
 * Un constructeur pour initialiser les objets
 * des getters pour acceder aux données et des setters pour les modifier
 * une méthode qui permet d'afficher les details des produits
 */

class Produit
{

    //propriétés privées
    private $id; // id unique de la base de données
    private $nom;
    private $tarif;
    private $stock;

    //Constructeur : initialisation de la voiture
    public function __construct($nom, $tarif, $stock, $id = null)
    {
        $this->nom = $nom;
        $this->tarif = $tarif;
        $this->stock = $stock;
    }

    // Getter pour les details des produits
    // Affichage des details des produits
    public function getDetails()
    {
        return "Produit : " . $this->nom . " Tarif : " . $this->tarif . "€" . " - Stock :" . $this->stock ;
    }

    // Getter pour l'id'
    public function getId()
    {
        return $this->id;
    }

    // Getter pour le nom
    public function getNom()
    {
        return $this->nom;
    }

    // Getter pour le tarif
    public function getTarif()
    {
        return $this->tarif;
    }

    // Getter pour le stock
    public function getStock()
    {
        return $this->stock;
    }


    // Setter pour modifier un produit
    public function setProduit($nouveauNom, $nouveauTarif, $nouveauStock)
    {
        $this->nom = $nouveauNom;
        $this->tarif = $nouveauTarif;
        $this->stock = $nouveauStock;
    }

    // Affichage des details du produit

    // Méthode pour charger le produit de la bdd
    /**
     * Charger un produit depuis la bdd via son id
     * @return Array|null return l'objet produit ou rien si non trouvé
     */
    public static function loadList(){
        // On récupère pdo via la classe Database
        $db = Database::getInstance()->getConnexion();

        // Récupération des infos dans la Bdd
        $stmt = $db->query("SELECT * FROM articles");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Charger un produit depuis la bdd via son id
     * @param int $id id du produit
     * @return Array Tableau associatif contenant les produits
     */

    public static function LoadListId(int $id) {
        // On récupère pdo via la classe Database
        $db = Database::getInstance()->getConnexion();

        // Récupération des infos dans la Bdd
        $stmt = $db->query("SELECT * FROM articles WHERE id = $id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
    }

    public static function Update($id, $nom, $prix, $stock) {
        // On récupère pdo via la classe Database
        $db = Database::getInstance()->getConnexion();

        $stmt = $db->prepare("UPDATE articles SET nom=?, prix=?, stock=? WHERE id=?");
        return $stmt->execute([$nom, $prix, $stock, $id]);
    }

    public static function delete($id) {
        $db = Database::getInstance()->getConnexion();

        $stmt = $db->query("DELETE FROM articles WHERE id = $id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function add($nom, $prix, $stock) {
        $db = Database::getInstance()->getConnexion();

        $stmt = $db->prepare("INSERT INTO articles (nom, prix, stock) VALUE (?, ?, ?)");
        return $stmt->execute([$nom, $prix, $stock]);
    }
}