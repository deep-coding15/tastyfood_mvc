<section id="links" class="relative top-2 mt-16">
  <nav>
    <ul class="flex flex-row justify-between w-full">
      <?php foreach (['accompagnement', 'dessert', 'entree', 'resistance', 'boisson'] as $p): ?>
        <li class="rounded-lg cursor-pointer">
          <a href="?page=<?= $p ?>"
            class="block px-6 py-3 rounded-lg transition 
                       <?= ($page === $p)
                          ? 'bg-blue-600 text-white font-semibold shadow'
                          : 'bg-gray-100 text-gray-700 hover:bg-gray-200' ?>">
            <?= ucfirst($p) ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </nav>
</section>

<div class="grid grid-cols-1 gap-4 mt-8">
  <h2 class="text-3xl font-bold text-center mb-4">
    Des plats faits maison, avec amour, livrés chez vous.
  </h2>

  <div id="carts" class="carts grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    <?php foreach ($plats as $plat): ?>
      <div class="max-w-sm bg-white rounded-2xl shadow-lg hover:scale-105 transition">
        <img src="<?= htmlspecialchars($plat->getImgPlat()) ?>"
          alt="image du plat <?= htmlspecialchars($plat->getNomPlat()) ?>"
          class="w-full h-48 object-cover rounded-t-2xl">
        <div class="p-6 space-y-4">
          <p class="text-xl font-bold text-gray-800"><?= htmlspecialchars($plat->getNomPlat()) ?></p>
          <div class="flex items-center justify-between">
            <span class="text-lg font-semibold text-green-600">
              <?= number_format($plat->getPrixPlat(), 2) ?> DH
            </span>
            <a href="/client/plat_details.php?id=<?= $plat->getIdPlat() ?>"
              class="bg-blue-600 text-white text-sm font-medium px-4 py-2 rounded-lg hover:bg-blue-700">
              Voir plus
            </a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>