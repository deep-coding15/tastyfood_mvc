<?php

require_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use App\Utils\ConstanteServer;

//require_once ConstanteServer::base_path_app_core() . '/Autoloader.php';

use App\Core\Autoloader;
use App\Utils\Constante;
use App\Utils\SessionHelpers;

//Autoloader::register();

$_instance = new SessionHelpers(); // ::getInstance();
$_sessionHelpers = new SessionHelpers(); // $_instance->getSession();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  /* require_once __DIR__ . '/../../config/config.php';
   *//* ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL); */
  ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= Constante::base_url() . Constante::base_public() . '/style.css' ?>">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

  <title>
    <?= $title ?>
    <?= $baseUrl = Constante::base_url_vues_client() . '/app/vues'; ?>
  </title>
</head>
<header class="bg-white shadow-md fixed top-0 inset-x-0 z-50 h-14">
  <div class="max-w-7xl mx-auto px-4 h-full flex items-center justify-between">
    <nav class="hidden md:flex space-x-6 w-full">
      <!-- Liens -->
      <h1 class="text-2xl font-bold mr-3">📊 Dashboard Admin</h1>
      <a href="..." class="text-gray-600 hover:text-blue-600 transition">Accueil</a>
      <!-- ... autres liens -->
      <a href="..." class="text-green-500 border border-black rounded px-2 py-1 hover:text-green-700 transition">Connexion</a>
      <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Déconnexion</button>
    </nav>
    <button id="menu-toggle" class="md:hidden text-gray-600 focus:outline-none">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>
  </div>

  <!-- Menu mobile -->
  <div id="mobile-menu" class=" hidden md:hidden px-4 pb-4 space-y-2">
    <a href="..." class="text-gray-600 hover:text-blue-600 block">Accueil</a>
    <!-- ... autres liens -->
  </div>
</header>
<section id="nav-links" class="bg-gray-800 text-white w-52 fixed top-16 bottom-16 left-0 z-40 p-4 overflow-y-auto rounded-r-lg shadow-md">
  <div class="flex flex-col items-center mb-4">
    <p class="text-2xl font-bold">Tasty Food</p>
    <p class="bg-yellow-400 text-black text-sm px-2 py-1 rounded">Admin</p>
  </div>
  <nav>
    <ul class="space-y-2">
      <li><a href="<?= Constante::base_url() . '/src/templates/menu.php' ?>" class="hover:text-yellow-400">Accueil</a></li>
      <li><a href="#" class="hover:text-yellow-400">Ingrédients</a></li>
      <li><a href="#" class="hover:text-yellow-400">Plats</a></li>
      <li><a href="#" class="hover:text-yellow-400">Menu</a></li>
      <li><a href="#" class="hover:text-yellow-400">Réservation</a></li>
      <li><a href="#" class="hover:text-yellow-400">Livraison</a></li>
      <li><a href="#" class="hover:text-yellow-400">Personnel</a></li>
      <li><a href="#" class="hover:text-yellow-400">Réglages</a></li>
      <li><a href="#" class="hover:text-yellow-400">Thèmes et images</a></li>
      <li><a href="#" class="hover:text-yellow-400">Déconnexion</a></li>
    </ul>
  </nav>
</section>
<main class="col-span-2 row-span-1 overflow-auto flex flex-col justify-center items-center">
  <?=
  $content
  ?>
</main>
<footer class="bg-gray-800 text-white py-4 fixed bottom-0 inset-x-0 z-50">
  <div class="max-w-6xl mx-auto px-4 flex flex-col md:flex-row items-center justify-between text-sm">
    <div class="font-semibold">Tasty Food</div>
    <div class="text-gray-400">© 2025 Merveille Tsafack. Tous droits réservés.</div>
    <div class="space-x-4">
      <a href="..." class="hover:text-gray-300 transition">Accueil</a>
      <a href="..." class="hover:text-gray-300 transition">À propos</a>
      <a href="..." class="hover:text-gray-300 transition">Contact</a>
      <a href="..." class="hover:text-gray-300 transition">FAQ</a>
    </div>
  </div>
</footer>
<script>
  const toggleButton = document.getElementById('menu-toggle');
  const mobileMenu = document.getElementById('mobile-menu');

  toggleButton?.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
  });
</script>

</html>