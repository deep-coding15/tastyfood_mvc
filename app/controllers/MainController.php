<?php

namespace App\Controllers;
use App\Controllers\Base\IBase;
use App\controllers\base\WebController;
use App\utils\Template;

class MainController extends WebController
{
    function home(): string
    {
        return 'hi homme';
        //return Template::render("views/client/accueil.php", array("date" => date("d-m-Y à H:i")));
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
