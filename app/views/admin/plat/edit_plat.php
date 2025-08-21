<div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-md mt-20 mb-20">

    <h2 class="text-2xl font-bold text-gray-800 mb-6">✏️ Éditer un plat</h2>
    <form action="/php/tastyfood_mvc/public/admin/plat/update/<?= htmlspecialchars($plat->id)?>" method="post" enctype="multipart/form-data" class="space-y-6">
        <!-- id -->
        <input type="hidden" name="id" id="id" value="<?php echo $plat->id; ?>">
        <!-- Nom -->
        <div>
            <label class="block text-gray-700 font-medium mb-2">Nom du plat</label>
            <input
                type="text"
                name="nom"
                value="<?php echo htmlspecialchars($plat->nom); ?>"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-400 focus:outline-none"
                required>
        </div>

        <!-- Description -->
        <div>
            <label class="block text-gray-700 font-medium mb-2">Description</label>
            <textarea
                name="description"
                rows="3"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-400 focus:outline-none"
                required><?php echo htmlspecialchars($plat->description); ?></textarea>
        </div>

        <!-- Prix -->
        <div>
            <label class="block text-gray-700 font-medium mb-2">Prix (€)</label>
            <input
                type="number"
                step="0.01"
                name="prix"
                value="<?php echo htmlspecialchars($plat->prix); ?>"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-400 focus:outline-none"
                required>
        </div>

        <!-- Type -->
        <div>
            <label class="block text-gray-700 font-medium mb-2">Type</label>
            <select
                name="type"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                <option value="1" <?php if ($plat->type == 'Accompagnements') echo 'selected'; ?>>Accompagnements</option>
                <option value="2" <?php if ($plat->type == 'Desserts') echo 'selected'; ?>>Desserts</option>
                <option value="3" <?php if ($plat->type == 'Entrees') echo 'selected'; ?>>Entrees</option>
                <option value="4" <?php if ($plat->type == 'Plat de resistance') echo 'selected'; ?>>Plat de resistance</option>
                <option value="5" <?php if ($plat->type == 'Boissons') echo 'selected' ?>>Boissons</option>
            </select>
        </div>

        <!-- Image -->
        <div>
            <label class="block text-gray-700 font-medium mb-2">Image</label>
            <div class="flex items-center space-x-4">
                <img src="/uploads/<?php echo $plat->image; ?>" alt="Image actuelle" class="w-20 h-20 rounded-lg object-cover border">
                <input
                    type="file"
                    name="image"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-400 focus:outline-none">
            </div>
        </div>

        <!-- Boutons -->
        <div class="flex justify-between items-center">
            <a href="/plats" class="px-5 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                ❌ Annuler
            </a>
            <button type="submit" class="px-5 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 transition">
                💾 Sauvegarder
            </button>
        </div>
    </form>
</div>
