<div class="max-w-sm mx-auto mt-24 bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition">
  <!-- Image du plat -->
  <img class="w-full h-48 object-cover" src="https://via.placeholder.com/400x300" alt="Image du plat">
  <!-- Contenu -->
  <div class="p-5">
    <h2 class="text-2xl font-bold text-gray-800"><?= $plat->nom ?> </h2>
    <p class="mt-2 text-gray-600 text-sm">
        <?= $plat->description ?>
<!--       Délicieuse pizza avec sauce tomate maison, mozzarella fraîche et basilic.
 -->    </p>

    <!-- Prix + Bouton -->
    <div class="mt-4 flex items-center justify-between">
      <span class="text-xl font-semibold text-green-600"><?= $plat->prix?> MAD</span>
      <button class="px-4 py-2 bg-green-500 text-white text-sm font-semibold rounded-xl hover:bg-green-600 transition">
        Commander
      </button>
    </div>
  </div>
</div>
