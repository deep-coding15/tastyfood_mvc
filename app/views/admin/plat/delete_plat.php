<?php var_dump($_GET) ?>
<div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-md mt-20 mb-20">

    <h2 class="text-2xl font-bold text-gray-800 mb-6">✏️ Supprimer un plat</h2>
    <!-- action="/php/tastyfood_mvc/public/plat/update/<?php /* echo $plat->id; */ ?>" -->
    <form action="/php/tastyfood_mvc/public/plat/delete/<?= htmlspecialchars($plat->id) ?>" method="post" enctype="multipart/form-data" class="space-y-6">
        <!-- id -->
        <input type="hidden" name="id" id="id" value="<?php echo $plat->id; ?>">
        <!-- Nom -->
        <div>
            <label class="block text-gray-700 font-medium mb-2">Nom du plat</label>
            <p><?php echo htmlspecialchars($plat->nom); ?>"</p>
            <label class="block text-gray-700 font-medium mb-2">Description</label>
            <p><?php echo htmlspecialchars($plat->description); ?></p>
            <label class="block text-gray-700 font-medium mb-2">Prix (€)</label>
            <p><?php echo htmlspecialchars($plat->prix); ?></p>
            <label class="block text-gray-700 font-medium mb-2">Type</label>
            <p><?php echo htmlspecialchars($plat->type); ?></p>
            <label class="block text-gray-700 font-medium mb-2">Image</label>
            <img src="" alt="">
        </div>


        <div class="flex justify-between items-center">
            <a href="/plat" class="px-5 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                ❌ Annuler
            </a>
            <button type="submit" id="delete" class="px-5 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 transition">
                Supprimer
            </button>
        </div>
    </form>
</div>