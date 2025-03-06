<?php

// Ce controller gere les actions qui concernent le produit
// Son but est de récupérer les données et d'inclure la vue



require_once __DIR__. '/../models/Produit.php';
require_once __DIR__. '/../models/Database.php';


class ProductControllers{
    /*
     * function details
     * Afficher les details du produit selon son id
     *
     * @param int $id  Id du produit
     */
    public function afficherListe(){
        $produit = Produit::loadList();
        if (!$produit){
            echo "Produits non trouvés";
            return;
        }

        // Inclusion de la vue
        include __DIR__. '/../views/ProductList.php';

    }

    public function add(){
        Produit::add($_POST["nom"], $_POST["prix"], $_POST["stock"]);
        header("Location: index.php");
        exit();
    }

    public function delete($id){
        // Chargement du produit
        $produit = Produit::loadListId($id);
        if (!$produit){
            echo "Produit non trouvé";
            return;
        }

        $conf = isset($_POST["conf"]) ? trim($_POST["conf"]) : "";

        if ($conf === "Supprimer"){
            Produit::delete($id);
            header("Location: index.php");
        } else {
            header("Location: views/Delete.php?msg=Confirmation ratee : Mauvaise orthographe&id=" . $id);
        }
        exit();
    }

    public function update($id){
        $produit = Produit::LoadListId($id);
        if (!$produit){
            echo "produit non trouvé";
            return;
        }

        $nom = !empty($_POST["nom"]) ? trim($_POST["nom"]) : $produit["nom"];
        $prix = !empty($_POST["prix"]) ? floatval($_POST["prix"]) : floatval($produit["prix"]);
        $stock = !empty($_POST["stock"]) ? intval($_POST["stock"]) : intval($produit["stock"]);

        Produit::Update($id, $nom, $prix, $stock);
        header("Location: index.php");
        exit();
    }
}