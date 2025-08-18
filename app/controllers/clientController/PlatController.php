<?php

namespace App\Controllers\ClientController;

use DateTime;

require_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use App\controllers\base\WebController;
use App\Models\Classes\Plat;
use App\Models\Repositories\PlatModele;
use App\utils\Template;

class PlatController extends WebController
{
    private $platModele;
  function __construct()
  {
    $this->platModele = new PlatModele();
  }
  function liste($page = 0, $type = 6)
  {
    // Récupère les clients en base.
    $lesPlats = $this->platModele->liste(10, $page, $type);

    return Template::render(
      "views/client/plat/liste_plat.php",
      array(
        "page" => $page, 
        "types" => $type,
        "plats" => $lesPlats
        )
    );
  }
  function accueil(string $page = 'default'){
    $types = [
        'accompagnement' => 'Accompagnements',
        'dessert'        => 'Desserts',
        'entree'         => 'Entrees',
        'resistance'     => 'Plat de resistance',
        'boisson'        => 'Boissons',
    ];

    $type = $types[$page] ?? null;
    $plats = $type 
        ? $this->platModele->getPlatsByTypeName($type)
        : $this->platModele->getPlats();
        //var_dump($plats);
    return Template::render(
        "/views/client/plat/liste_plat.php",
        [
            "type" => $type,
            "plats" => $plats
        ]
    );
  }
  
}