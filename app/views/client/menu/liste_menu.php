
<div class="max-w-7xl p-8 ">
  <?php echo '<pre>';
//var_dump($menus);
echo '</pre>';// mx-auto?>
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 m-12">
    <!-- Carte du menu -->
    <?php foreach ($menus as $key => $item) : 
      $menu = $item['menus']; 
      //var_dump($menu)?>
      <div class="bg-gradient-to-br from-white to-gray-100 shadow-xl rounded-2xl p-6 hover:shadow-2xl transition duration-300">

        <!-- Titre du menu -->
        <h2 class="text-2xl font-bold text-gray-800 mb-2 flex items-center">
          🍽️ <span class="ml-2"><?= $menu['nom'] ?></span>
        </h2>
        <p class="text-gray-600 mb-6 italic"><?= $menu['description'] ?> </p>

        <!-- Grille des plats -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
          <?php $plats = $item['plats']['plats'];
          //var_dump($plats);
          foreach ($plats as $key => $plat) : 
            //var_dump($plat);
//          $plat = $item[$key]['plats'];?>
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-4 border border-gray-100">
              <img src="https://via.placeholder.com/300x200"
                alt="Image du plat"
                class="rounded-lg mb-3 w-full h-16 object-cover">
<?php //var_dump($plat);?>
              <h3 class="text-lg font-semibold text-gray-800"><?= $plat->nom ?></h3>
              <p class="text-sm text-gray-500 mb-2"><?= $plat->description ?></p>
              <p class="text-red-500 font-bold text-lg"><?= $plat->prix ?> MAD</p>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="flex justify-center items-center mt-12 gap-6">
          <p class="text-lg font-semibold text-gray-800 bg-gray-100 px-4 py-2 rounded-lg shadow">
            Total : <?= $item['plats']['prix_total'] ?> MAD
          </p>
          <a href="/views/client/menu/commander"
            class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700">
            Commander
          </a>
        </div>

        <!-- 
        <div class="flex items-center justify-center h-64">
          <button class="bg-green-600 text-white px-4 py-2 rounded-lg shadow hover:bg-green-700">
            Valider
          </button>
        </div>
        <div class="text-center">
          <button class="bg-red-600 text-white px-4 py-2 rounded-lg shadow hover:bg-red-700">
            Supprimer
          </button>
        </div> -->




      </div>
    <?php endforeach; ?>
  </div>
</div>