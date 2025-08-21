<?php

use App\Utils\Constante;

require_once dirname(__DIR__, 4) . '/vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- TailwindCSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Police Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>

  <title>
    <?php $title ?>
    <?php $baseUrl = Constante::base_url_vues_client() . '/app/vues'; ?>
  </title>
</head>

<!-- HEADER -->
<header class="bg-white shadow-md fixed top-0 inset-x-0 z-50 h-14">
  <div class="max-w-7xl mx-auto px-4 h-full flex items-center justify-between">
    <nav class="hidden md:flex space-x-6 w-full items-center">
      <!-- Titre -->
      <h1 class="text-2xl font-bold text-gray-800 mr-6">📊 Dashboard Admin</h1>
      <!-- Liens -->
      <a href="..." class="text-gray-600 hover:text-blue-600 transition">Accueil</a>
      <a href="..." class="text-gray-600 hover:text-blue-600 transition">Statistiques</a>
      <a href="..." class="text-gray-600 hover:text-blue-600 transition">Utilisateurs</a>
      <!-- Boutons -->
      <a href="..." class="ml-auto text-green-600 border border-green-600 rounded px-3 py-1 hover:bg-green-600 hover:text-white transition">Connexion</a>
      <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded shadow">Déconnexion</button>
    </nav>

    <!-- Burger menu (mobile) -->
    <button id="menu-toggle" class="md:hidden text-gray-600 focus:outline-none">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>
  </div>

  <!-- Menu mobile -->
  <div id="mobile-menu" class="hidden md:hidden px-4 pb-4 space-y-2 bg-white shadow">
    <a href="..." class="block text-gray-600 hover:text-blue-600">Accueil</a>
    <a href="..." class="block text-gray-600 hover:text-blue-600">Statistiques</a>
    <a href="..." class="block text-gray-600 hover:text-blue-600">Utilisateurs</a>
  </div>
</header>

<body class="bg-gray-100 grid grid-cols-4 gap-4">
  <!-- SIDEBAR -->
  <aside class="col-span-8 bg-gray-800 text-white w-56 fixed top-16 bottom-0 left-0 z-40 p-4 overflow-y-auto rounded-r-lg shadow-md">
    <div class="flex flex-col items-center mb-6">
      <p class="text-2xl font-bold">🍽️ Tasty Food</p>
      <p class="bg-yellow-400 text-black text-sm px-3 py-1 rounded mt-1">Admin</p>
    </div>
    <nav>
      <ul class="space-y-3">
        <li><a href="<?= Constante::base_url() . '/src/templates/menu.php' ?>" class="block hover:text-yellow-400">Accueil</a></li>
        <li><a href="/php/tastyfood_mvc/public/admin/" class="block hover:text-yellow-400">Ingrédients</a></li>
        <li><a href="/php/tastyfood_mvc/public/admin/plat" class="block hover:text-yellow-400">Plats</a></li>
        <li><a href="/php/tastyfood_mvc/public/admin/menu" class="block hover:text-yellow-400">Menu</a></li>
        <li><a href="/php/tastyfood_mvc/public/admin/" class="block hover:text-yellow-400">Réservation</a></li>
        <li><a href="/php/tastyfood_mvc/public/admin/" class="block hover:text-yellow-400">Livraison</a></li>
        <li><a href="/php/tastyfood_mvc/public/admin/" class="block hover:text-yellow-400">Personnel</a></li>
        <li><a href="/php/tastyfood_mvc/public/admin/" class="block hover:text-yellow-400">Réglages</a></li>
        <li><a href="/php/tastyfood_mvc/public/admin/" class="block hover:text-yellow-400">Thèmes & Images</a></li>
        <li><a href="/php/tastyfood_mvc/public/admin/" class="block hover:text-yellow-400">Déconnexion</a></li>
      </ul>
    </nav>
  </aside>

  <!-- CONTENU PRINCIPAL -->
  <main class="col-span-3 ml-56 pt-20 p-6 w-full">