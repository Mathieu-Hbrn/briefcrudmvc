<?php

/**
 * Front controller
 *
 * Point d'entrée de l'application
 * Il lit les parametres passés dans l'URL
 * Selon ces paramètres, il instancie le controleur qui convient
 */

// Démarrage de la session
session_start();

// Inclusion des contrôleurs (ici il y a que Product)
require_once 'controllers/ProductControllers.php';

// Récupération des parametres de l'action via l'url (index.php?action=details)
$action = isset($_GET['action']) ? $_GET['action'] : 'afficherListe';

// Meme chose avec l'id
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Instanciation du contrôleur
$controller = new ProductControllers();

// Routage (selon la valeur de l'action)
//if ($action == 'details'){
//    // Appel de la methode pour afficher les details de la voiture
//    $controller->details($id);
//} else{
//    // Si l(action n'existe pas
//    echo "Action n'existe pas";
//}

switch ($action){
    case 'afficherListe':
        $controller->afficherListe();
        break;

    case "update" :
        $controller->update($id);
        break;

    case "delete" :
        $controller->delete($id);
        break;

    case "add" :
        $controller->add();
        break;

    default:
        // Si l'action n'existe pas
        echo "L'action n'existe pas";
}