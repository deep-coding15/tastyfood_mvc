<?php

namespace App\Models\Base;

use PDO;

class Database
{
    static function connect(): PDO
    {
        $config = include dirname(__DIR__, 3) . "/configs.php";
        //echo "Connecting to database: {$config['DB_DATABASE']} on {$config['DB_SERVER']}\n";
        $pdo = new \PDO ($config["DB_DSN"], $config["DB_USER"], $config["DB_PASSWORD"]);

        if ($pdo && $config["DEBUG"]) {
            // ACTIVER LE DEBUG DES REQUÊTES
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        }

        return $pdo;
    }
}