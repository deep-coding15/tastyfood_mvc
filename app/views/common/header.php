<?php

require_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use App\Utils\ConstanteServer ;

//require_once ConstanteServer::base_path_app_core() . '/Autoloader.php';

use App\Core\Autoloader;
use App\Utils\Constante;
use App\Utils\SessionHelpers;

//Autoloader::register();

$_instance = new SessionHelpers();// ::getInstance();
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
  <link rel="stylesheet" href="<?= Constante::base_url() . Constante::base_public() . '/output.css' ?>">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

  <title>
    <?= $title ?>
    <?= $baseUrl = Constante::base_url_vues_client() . '/app/vues'; ?>
  </title>
</head>


<body class="flex flex-col space-y-4 scroll-smooth h-full">
  <header class="bg-white shadow-md fixed top-0 inset-x-0 z-50 h-14 w-full">
    <!-- bg-gray-800 text-white py-3 h-fit fixed bottom-0 left-0 w-full shadow-inner border-t border-gray-700 col-span-2 z-100">
 -->
    <!-- max-w-7xl -->
    <div class="mx-auto px-4 py-4 flex items-center justify-between">
      <nav class="space-x-6 hidden md:flex w-full">
        <a href="/php/tastyfood_mvc/public" class="text-gray-600 hover:text-blue-600 flex-1">Accueil</a>
        <a href="/php/tastyfood_mvc/public/plat" class="text-gray-600 hover:text-blue-600 flex-1">Plats</a>  
        <a href="/php/tastyfood_mvc/public/menu" class="text-gray-600 hover:text-blue-600 flex-1">Menu</a>
        <a href="/php/tastyfood_mvc/public/reservation" class="text-gray-600 hover:text-blue-600 flex-1">Reservation</a>
        <a href="/php/tastyfood_mvc/public/livraison" class="text-gray-600 hover:text-blue-600 flex-1">Livraison</a>
        <a href="/php/tastyfood_mvc/public/a_propos" class="text-gray-600 hover:text-blue-600 flex-1">A propos</a>
        <a href="/php/tastyfood_mvc/public/contact" class="text-gray-600 hover:text-blue-600 flex-1">Contact</a>
        <a href="/php/tastyfood_mvc/public/login" class="text-gray-600 hover:text-blue-600 flex-1 
          border border-black rounded text-green-500" id="connexion">Connexion</a>
        <a href="/php/tastyfood_mvc/public/profil" class="text-gray-600 hover:text-blue-600 flex-1">Profil</a>
      </nav>
      <!-- bouton hamburger visible sur mobile (petits écrans)-->
      <button id="menu-toggle" class="md:hidden text-gray-600 focus:outline-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>

    <!-- uniquement visible sur mobile -->
    <div id="mobile-menu" class="md:hidden hidden px-4 pb-4 space-y-2">
      <a href="/php/tastyfood_mvc/public/plat" class="text-gray-600 hover:text-blue-600 flex-1">Accueil</a>
      <a href="/php/tastyfood_mvc/public/menu" class="text-gray-600 hover:text-blue-600 flex-1">Menu</a>
      <a href="/php/tastyfood_mvc/public/reservation" class="text-gray-600 hover:text-blue-600 flex-1">Reservation</a>
      <a href="/php/tastyfood_mvc/public/livraison" class="text-gray-600 hover:text-blue-600 flex-1">Livraison</a>
      <a href="/php/tastyfood_mvc/public/a_propos" class="text-gray-600 hover:text-blue-600 flex-1">A propos</a>
      <a href="/php/tastyfood_mvc/public/contact" class="text-gray-600 hover:text-blue-600 flex-1">Contact</a>
      <a href="/php/tastyfood_mvc/public/login" class="text-gray-600 hover:text-blue-600 flex-1 border border-black rounded text-green-500" id="connexion">Connexion</a>
      <a href="/php/tastyfood_mvc/public/profil" class="text-gray-600 hover:text-blue-600 flex-1">Profil</a>
    </div>

  </header>


  <!-- <main class="pb-48 p-8 col-span-2 row-span-1 overflow-auto flex flex-col">
  p/*  $content */ ?>
  </main> -->
  <!--  -->
  <main class="col-span-2 row-span-1 overflow-auto flex flex-col justify-center items-center">
