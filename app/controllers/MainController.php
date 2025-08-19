<?php

namespace App\Controllers;
use App\Controllers\Base\IBase;
use App\controllers\base\WebController;
use App\Models\Repositories\MenuModele;
use App\utils\Template;

class MainController extends WebController
{
  private MenuModele $menuModele;
  public function __construct(){
    $this->menuModele = new MenuModele();
  }
  function home(): string
  {
    $menus = $this->menuModele->liste();
      return Template::render(
          "views/client/accueil.php", 
          array("menus" => $menus),
          false
      );
  }
  function client($id)
  {
      echo "Voici le client avec l'identifiant $id";
  }

  function exemple($parametre = 'Valeur par défaut'): string
  {
      return "Voilà votre paramètre : $parametre";
  }
}
