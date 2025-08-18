<?php

use App\Routes\Base\Router as BaseRouter;

use App\Utils\SessionHelpers as SessionHelpers;
include_once 'vendor/autoload.php';
//include("autoload.php");

/*
 * Permet l'utilisation du serveur PHP interne et l'affichage des contenus static.
 */
if (php_sapi_name() == 'cli-server') {
    if (str_starts_with($_SERVER["REQUEST_URI"], '/public/')) {
        return false;
    }
}

class EntryPoint
{
    private BaseRouter $router;
    private SessionHelpers $sessionHelpers;

    function __construct()
    {
        $this->sessionHelpers = new SessionHelpers();

        $this->router = new BaseRouter();
        $this->router->LoadRequestedPath();
    }
}

new EntryPoint();