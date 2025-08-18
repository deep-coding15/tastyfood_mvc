<?php
// Traitement du formulaire


/* if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom']);
    $description = trim($_POST['description']);
    $prix = floatval($_POST['prix']);
    $imageName = "";

    // Gestion de l'image
    if (!empty($_FILES['image']['name'])) {
        $uploadDir = __DIR__ . '/../uploads/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

        $imageName = time() . '-' . basename($_FILES['image']['name']);
        $targetPath = $uploadDir . $imageName;
        $plat = new Plat();
                $plat->setNom($nom);
                $plat->setPrix($prix);
                $plat->setDescription($description);
                $plat->setPrix($prix);
                $lastId = $this->platModele->addToDB($plat);
                
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
            $message = "✅ Plat ajouté avec succès !";
        } else {
            $message = "❌ Erreur lors de l'upload de l'image.";
        }
    }

    // Ici tu pourrais insérer en base de données
    // Exemple :
    // $pdo->prepare("INSERT INTO plats (nom, description, prix, image) VALUES (?, ?, ?, ?)")
    //     ->execute([$nom, $description, $prix, $imageName]);
} */
    
?>


<div class="bg-gray-100 py-10">


    <div class="max-w-lg mx-auto bg-white p-8 rounded-2xl shadow-lg">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">🍽 Ajouter un plat</h1>

        <?php if(!empty($error)) : ?>
            <p class="text-red-600 font-semibold mb-3"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data" class="space-y-5">

            <div>
                <label class="block font-medium mb-1">Nom du plat</label>
                <input type="text" name="nom" required
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block font-medium mb-1">Description</label>
                <textarea name="description" rows="3" required
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <div>
                <label class="block font-medium mb-1">Prix (€)</label>
                <input type="number" step="0.01" name="prix" required
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block font-medium mb-1">Image du plat</label>
                <input type="file" name="img" accept="image/*"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block font-medium mb-1">Type du plat</label>
                <select name="type" id="type">
                    <option value="0" disabled>Entrez une valeur</option>
                    <option value="1">Accompagnements</option>
                    <option value="2">desserts</option>
                    <option value="3">Entrees</option>
                    <option value="4">resistance</option>
                    <option value="5">Boissons</option>
                </select>
            </div>
            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                ➕ Ajouter
            </button>
        </form>
    </div>

</div> 
<!-- <div class="max-w-lg mx-auto mt-10 bg-white shadow-lg rounded-xl p-6">
    <h1 class="text-2xl font-bold mb-4 text-gray-800">➕ Ajouter un plat</h1>

    <?php if (!empty($error)): ?>
        <p class="text-red-600 font-semibold mb-3"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST" action="" class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Nom du plat</label>
            <input type="text" name="nom" required
                   class="w-full mt-1 p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Prix (€)</label>
            <input type="number" name="prix" step="0.01" required
                   class="w-full mt-1 p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" rows="3"
                      class="w-full mt-1 p-2 border rounded-lg focus:ring-2 focus:ring-blue-500"></textarea>
        </div>

        <button type="submit"
                class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition">
            Enregistrer
        </button>
    </form>
</div> -->
