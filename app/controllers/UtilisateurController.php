<?php

namespace App\Controllers;

use App\Controllers\Base\WebController;
use App\Models\Base\SQL;
use App\Models\Repositories\UtilisateurModele;
use App\Utils\Template;
use App\Utils\Utils;
use Exception;

class UtilisateurController extends WebController
{
  private $utilisateurModele;
  function __construct()
  {
    // À mettre dans le constructeur évidemment
    $this->utilisateurModele = new UtilisateurModele();
  }
  function liste($page = 0)
  {
    // Récupère les clients en base.
    $lesClients = $this->utilisateurModele->liste(8, $page);
    return Template::render(
      "views/admin/utilisateur/liste_utilisateur.php",
      array("page" => $page, "utilisateurs" => $lesClients)
    );
  }
  public function loginTraitement()
  {
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
      $data = $_POST;
      $result = $this->utilisateurModele->login($data);
      //var_dump($result);
      if (is_array($result)) {
        $user = $this->utilisateurModele->getOne($result['user']['id']);
        Utils::redirect('/public/plat');
        /* return Template::render(
          "views/client/plat/liste_plat.php",
        ); */
      }
      return Template::render(
        "views/authentification/signup.php",
      );
    }
  }
  public function signupTraitement()
  {
    $data = [];
    if ($_SERVER['REQUEST_METHOD'] === "POST" || $_SERVER['REQUEST_METHOD'] === "post") {
      $data = $_POST;
    } else if ($_SERVER['REQUEST_METHOD'] === "GET" || $_SERVER['REQUEST_METHOD'] === "get") {
      $data = $_GET;
    }

    $result = $this->utilisateurModele->signUp($data);
    if ($result) {
      Utils::redirect('/public/login');
    } else {
      return Template::render(
        "views/authentification/signup.php",
      );
    }
  }
  public function profil()
  {
    $user = $_SESSION['user'];
    return Template::render(
      'views/authentification/profile.php',
      ['user' => $user]
    );
  }
}
