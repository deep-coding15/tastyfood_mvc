<?php
namespace App\Controllers\Controller;

use App\Controllers\Base\WebController;
use App\Models\Repositories\MenuModele;
use App\Utils\Template;

class MenuController extends WebController{
    private $menuModele;
    public function __construct(){
        $this->menuModele = new MenuModele();
    }
    /* public function liste($page = 0)  {
        // Récupère les clients en base.
        $lesMenus = $this->menuModele->liste(10, $page);
        //var_dump($lesMenus);
        return Template::render_admin(
        "views/admin/menu/liste.php",
        array("page" => $page, "menus" => $lesMenus),
        true,
        );
  } */
 function liste($page = 0)
  {
    // Récupère les clients en base.
    $menus = $this->menuModele->liste( $page);
    $lesMenus = [];
    //var_dump($menus);
    foreach ($menus as $key => $menu) {
      $id = $menu['id'];
      $plats = $this->menuModele->getPlatsPrixByMenuId($id);
      $lesMenus[$key]["menus"] = $menu;
      $lesMenus[$key]["plats"] = $plats;
    }
    //$lesMenus
    //$plats = $this->menuModele->getPlatsPrixByMenuId();
    return Template::render_admin(
      "views/admin/menu/liste.php",
      [
        "page" => $page, 
        "menus" => $lesMenus
      ]
    );
  }
}