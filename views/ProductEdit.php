<?php include "Header.php";
require_once "../models/Produit.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$produit = Produit::LoadListId($id);

?>
    <a href="../../briefcrudmvc/index.php"><button>Retour</button></a>
<form action="../../briefcrudmvc/index.php?action=update&id=<?php echo $id ?>" method="post">
    <label for="nom">Nom :
        <input type="text" name="nom" value="<?php echo $produit["nom"] ?>">
    </label>

    <label for="prix">Prix :
        <input type="text" name="prix" value="<?php echo $produit["prix"] ?>">
    </label>

    <label for="stock">Stock :
        <input type="number" name="stock" value="<?php echo $produit["stock"] ?>">
    </label>
    <button type="submit">Enregistrer</button>
</form>
<?php include "Footer.php" ?>