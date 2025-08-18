<?php

namespace App\Controllers\Controller;
require_once dirname(__DIR__, 3) . '/vendor/autoload.php';
use App\controllers\base\WebController;
use App\Models\Repositories\UtilisateurModele;
use App\utils\Template;

class UtilisateurController extends WebController
{
    private $utilisateurModele;
    function __construct(){
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
}