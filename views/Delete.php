<?php include "Header.php";
require_once "../models/Produit.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$produit = Produit::LoadListId($id);

if (isset($_GET["msg"])){
    echo $_GET["msg"] . "<br>";
}

?>
    <a href="../../briefcrudmvc/index.php"><button>Retour</button></a>
    <form action="../../briefcrudmvc/index.php?action=delete&id=<?php echo $id ?>" method="post">
        <label for="conf">Confirmation :
            <input type="text" name="conf" placeholder='Veuillez taper "Supprimer"'>
        </label>
        <button type="submit">Enregistrer</button>
    </form>
<?php include "Footer.php" ?>