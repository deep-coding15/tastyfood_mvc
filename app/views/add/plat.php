<h2>Ajouter un plat</h2>
<form action="ajouter_plat.php" method="post" enctype="multipart/form-data">
    <label>Nom du plat :</label>
    <input type="text" name="nom_plat" required>

    <label>Catégorie :</label>
    <select name="categorie" required>
        <option value="">-- Choisir --</option>
        <option value="entree">Entrée</option>
        <option value="plat">Plat principal</option>
        <option value="dessert">Dessert</option>
    </select>

    <label>Prix (€) :</label>
    <input type="number" name="prix" step="0.01" required>

    <label>Description :</label>
    <textarea name="description"></textarea>

    <label>Image :</label>
    <input type="file" name="image">

    <label>
        <input type="checkbox" name="disponible" value="1"> Disponible
    </label>

    <button type="submit">Enregistrer</button>
    <a href="liste_plats.php">Annuler</a>
</form>
