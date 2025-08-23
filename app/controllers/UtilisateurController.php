<?php

namespace App\Controllers;

use App\Controllers\Base\WebController;
use App\Models\Base\SQL;
use App\Models\Repositories\UtilisateurModele;
use App\Utils\Template;
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
  public function loginTraitement(){
    if($_SERVER['REQUEST_METHOD'] === "POST"){
      $data = $_POST;
      $result = $this->utilisateurModele->login($data);
      //var_dump($result);
      if(is_array($result)){
        $user = $this->utilisateurModele->getOne($result['user']['id']);
        return Template::render(
          "views/authentification/profile.php",
          ['user' => $user]
        );
      }
      return Template::render(
          "views/authentification/signup.php",
        );
    }
    
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
}