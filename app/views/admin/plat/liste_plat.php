<div class="w-full p-6 bg-gray-100 min-h-screen mt-16 mb-24 overflow-x-auto">
  <!-- Titre -->
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-800">
      🍽️ Liste des Plats <span class="text-sm text-gray-500">Page <?= htmlspecialchars($page) ?></span>
    </h1>
    <a href="/php/tastyfood_mvc/public/plat/create"
      class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow">
      ➕ Ajouter un Plat
    </a>
  </div>

  <!-- Table -->
  <div class="overflow-x-auto bg-white rounded-lg shadow">
    <table class="w-full text-sm text-left text-gray-700">
      <thead class="bg-gray-200 text-gray-700 uppercase text-xs">
        <tr>
          <th class="px-4 py-3">ID</th>
          <th class="px-4 py-3">Nom</th>
          <th class="px-4 py-3">Description</th>
          <th class="px-4 py-3">Prix</th>
          <th class="px-4 py-3">Catégorie</th>
          <th class="px-4 py-3">Créé le</th>
          <th class="px-4 py-3 text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($plats)): ?>
          <?php foreach ($plats as $plat): ?>
            <tr class="border-b hover:bg-gray-50">
              <td class="px-4 py-3 font-medium"><?= htmlspecialchars($plat->getId()); ?></td>
              <td class="px-4 py-3"><?= htmlspecialchars($plat->getNom()); ?></td>
              <td class="px-4 py-3"><?= htmlspecialchars($plat->getDescription()); ?></td>
              <td class="px-4 py-3 font-semibold text-green-600">
                <?= number_format($plat->getPrix(), 2, ',', ' ') ?> MAD
              </td>
              <td class="px-4 py-3"><?= htmlspecialchars($plat->getType()); ?></td>
              <td class="px-4 py-3"><?= htmlspecialchars($plat->getCreatedAt()->format('Y-m-d H:i:s')); ?></td>
              <td class="px-4 py-3 flex gap-2 justify-center">
                <a href="/php/tastyfood_mvc/public/admin/plat/show/<?= $plat->getId(); ?>"
                  class="px-3 py-1 text-xs bg-blue-500 text-white rounded hover:bg-blue-600">Voir</a>
                <a href="/php/tastyfood_mvc/public/admin/plat/edit/<?= $plat->getId(); ?>"
                  class="px-3 py-1 text-xs bg-yellow-500 text-white rounded hover:bg-yellow-600">Modifier</a>
                <a href="/php/tastyfood_mvc/public/admin/plat/delete/<?= $plat->getId(); ?>"
                  onclick="return confirm('Voulez-vous vraiment supprimer ce plat ?');"
                  class="px-3 py-1 text-xs bg-red-500 text-white rounded hover:bg-red-600">Supprimer</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="7" class="px-4 py-6 text-center text-gray-500">
              Aucun plat disponible 🍽️
            </td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <div class="flex justify-between items-center mt-6 mb-12">
    <a href="?page=<?= max(0, $page - 1) ?>"
      class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded">⬅️ Précédent</a>
    <a href="?page=<?= $page + 1 ?>"
      class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded">Suivant ➡️</a>
  </div>
</div>