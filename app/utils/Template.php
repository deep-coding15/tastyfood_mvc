<?php

namespace App\Utils;

class Template
{
    static function render($filepath, $variables = array(), $withHeader = true): string
    {
        ob_start();
        // Déclare l'ensemble des variables présent dans la variable $variales pour
        // les rendres accessibles directement. Exemple :
        // array("nom" => "Brosseau", "prenom" => "Valentin") va générer
        // $nom = "Brosseau" et $prenom = "Valentin"
        extract($variables);
        if ($withHeader) Template::header();
        //var_dump( ConstanteServer::base_path_app() . '/' . $filepath);
            include ConstanteServer::base_path_app() . '/' . $filepath;
        if ($withHeader) Template::footer();

        return ob_get_clean();
    }

    static private function header(): void
    {
        include_once ConstanteServer::base_path_vues_common() . ("/header.php");
    }

    static private function footer(): void
    {
        include_once ConstanteServer::base_path_vues_common() . ("/footer.php");
    }
}