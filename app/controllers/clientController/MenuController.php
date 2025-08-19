<?php

namespace App\Controllers\ClientController;

use DateTime;

require_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use App\controllers\base\WebController;
use App\Models\Classes\Plat;
use App\Models\Repositories\PlatModele;
use App\utils\Template;
use App\Models\Repositories\MenuModele;

class MenuController extends WebController
{
    private $menuModele;
  function __construct()
  {
    // À mettre dans le constructeur évidemment
    $this->menuModele = new MenuModele();
  }
  function liste($page = 0)
  {
    // Récupère les clients en base.
    $menus = $this->menuModele->liste( $page);
    $lesMenus = [];
    //var_dump($menus);
    foreach ($menus as $key => $menu) {
      $id = $menu->id;
      $plats = $this->menuModele->getPlatsPrixByMenuId($id);
      $lesMenus[$key]["menus"] = $menu;
      $lesMenus[$key]["plats"] = $plats;
    }
    //$lesMenus
    //$plats = $this->menuModele->getPlatsPrixByMenuId();
    return Template::render(
      "views/client/menu/liste_menu.php",
      [
        "page" => $page, 
        "menus" => $lesMenus
      ]
    );
  }
}