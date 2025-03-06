<?php include "Header.php" ?>

    <form action="index.php?action=add" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required placeholder="Entrez le nom"/>
        <label for="prix">Prix :</label>
        <input type="text" id="prix" name="prix" required placeholder="Entrez le prix"/>
        <label for="stock">Quantité :</label>
        <input type="text" id="stock" name="stock" required placeholder="Entrez la quantité"/>
        <button type="submit">Envoyer</button>
    </form>

<h1>Liste des produits</h1>
<div>
    <?php if (!isset($produit)){
    echo "<p>Erreur : Produits non trouvés</p>";

    exit;
    }
    ?>
    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>nom</th>
            <th>prix</th>
            <th>stock</th>
            <th>Modification</th>
            <th>Suppression</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($produit as $p): ?>
            <tr>
                <td><?= htmlspecialchars($p['id']) ?></td>
                <td><?= htmlspecialchars($p['nom']) ?></td>
                <td><?= htmlspecialchars($p['prix']) ?></td>
                <td><?= htmlspecialchars($p['stock']) ?></td>
                <td><a href="/views/ProductEdit.php?id=<?= htmlspecialchars($p['id']) ?>">Modifier</a>
                </td>
                <td>
                    <a href="/views/Delete.php?id=<?= htmlspecialchars($p['id']) ?>">Supprimer</a>
                </td>

            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>


</div>

<?php include "Footer.php" ?>