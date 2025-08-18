<div class="grid grid-cols-1 gap-4 mt-8">
  <h2 class="text-3xl font-bold text-center mb-4">
    Des plats faits maison, avec amour, livrés chez vous.
  </h2>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-6">
    <?php foreach ($plats as $plat): ?>
        
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-105 transform transition duration-300">
        <!-- Image du plat -->
        <img
          src="<?= htmlspecialchars($plat->img ?: '/assets/default-plat.jpg') ?>"
          alt="Plat <?= htmlspecialchars($plat->nom) ?>"
          class="w-full h-48 object-cover">

        <!-- Contenu -->
         <?= htmlspecialchars($plat->nom); $plat->nom ?>
        <div class="p-6 space-y-3">
          <h3 class="text-xl font-bold text-gray-800"><?= htmlspecialchars($plat->nom) ?></h3>
          <p class="text-gray-600 text-sm">
            <?= htmlspecialchars(substr($plat->description ?? '', 0, 60)) ?>
          </p>
          <div class="flex items-center justify-between mt-4">
            <span class="text-lg font-semibold text-green-600">
              <?= number_format($plat->prix, 2) ?> DH
            </span>
            <a href="/php/tastyfood_mvc/public/client/plat/commander/<?= $plat->id ?>"
              class="bg-blue-600 text-white text-sm font-medium px-4 py-2 rounded-lg hover:bg-blue-700 transition">
              Commander
            </a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>