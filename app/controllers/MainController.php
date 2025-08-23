<?php

namespace App\Controllers;
use App\Controllers\Base\IBase;
use App\controllers\base\WebController;
use App\Models\Repositories\MenuModele;
use App\utils\Template;
use Exception;

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
          false,
          false
      );
  }

  public function login() {
    return Template::render(
      "views/authentification/login.php"
    );
  }

  public function loginTraitement(){
    if($_SERVER['REQUEST_METHOD'] === "POST"){
      $data = $_POST;
    }
    $email = $data['email'];
    $password = $data['password'];

  }
  public function signup() {
    return Template::render(
      "views/authentification/signup.php"
    );
  }

  public function signupTraitement(){
    if($_SERVER['REQUEST_METHOD'] === "POST"){
      $data = $_POST;
    }
    if(!isset($data['nom'], $data['prenom'], $data['email'], $data['password']))
      throw new Exception("les champs sont manquants ou non correctement ecrits.");
    $nom = trim($data['nom']) ?? '';
    $prenom = trim($data['prenom']) ?? '';
    $email = trim($data['email']) ?? '';
    $password = trim($data['password']) ?? '';

    
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
