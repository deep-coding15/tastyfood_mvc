<?php

namespace App\Routes\Base;
require_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use App\Controllers\ClientController\MenuController as MenuClientController;
use App\Controllers\Controller\PlatController;
use App\Controllers\ClientController\PlatController as PlatClientController;
use App\Controllers\Controller\MenuController;
use App\Routes\Base\Route as BaseRoute;
use App\Controllers\Controller\UtilisateurController;
use App\controllers\MainController;
use App\utils\Template;

class Web
{
    function __construct()
    {
        $main = new MainController();
        $utilisateurController = new UtilisateurController();
        $platController = new PlatController();
        $platClientController = new PlatClientController();

        $menuClientControlleur = new MenuClientController();
        //$platController = new \App\Controllers\Controller\PlatController(); 
        // Appel la méthode « home » dans le contrôleur $main.
        BaseRoute::Add('/', [$main, 'home']);
        BaseRoute::Add('/home', [$main, 'home']);
        BaseRoute::Add('/public/utilisateur', [$utilisateurController, 'liste']);
    

        BaseRoute::Add('/public/admin/plat', [$platController, 'liste']);
        BaseRoute::Add('/public/admin/plat/create', [$platController, 'ajouter']);
        BaseRoute::Add('/public/admin/plat/show/{platId}', [$platController, 'show']);
        BaseRoute::Add('/public/admin/plat/edit/{platId}', [$platController, 'edit']);
        BaseRoute::Add('/public/admin/plat/update/{platId}', [$platController, 'update']);
        BaseRoute::Add('/public/admin/plat/delete/{platId}', [$platController, 'delete']);


        BaseRoute::Add('/public/plat', [$platClientController, 'accueil']);
        BaseRoute::Add('/public/plat/{type}', [$platClientController, 'accueil']);

        BaseRoute::Add('/public/menu', [$menuClientControlleur, 'liste']);
        // /php/tastyfood_mvc/public/client/plat
        BaseRoute::Add('/about', function () {
            return Template::render('views/global/about.php');
        });
    }
}

/* BaseRoute::Add('/public/plat/edit/{platId}', [
            'controller' => 'PlatController',
            'action' => 'edit'
        ]); */