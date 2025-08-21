<?php

namespace App\Utils;

class Template
{
    static function render($filepath, $variables = array(), $isAdmin = false, $withHeader = true): string
    {
        ob_start();
        // Déclare l'ensemble des variables présent dans la variable $variales pour
        // les rendres accessibles directement. Exemple :
        // array("nom" => "Brosseau", "prenom" => "Valentin") va générer
        // $nom = "Brosseau" et $prenom = "Valentin"
        extract($variables);
        if ($withHeader) {
            if (!$isAdmin) {
                Template::header();
                include ConstanteServer::base_path_app() . '/' . $filepath;
                Template::footer();
            } else {
                Template::header_admin();
                include ConstanteServer::base_path_app() . '/' . $filepath;
                Template::footer_admin();
            }
        } else
            include ConstanteServer::base_path_app() . '/' . $filepath;


        return ob_get_clean();
    }

    public static function render_admin($filepath, $variables = array(), $withHeader = true)
    {
        ob_start();
        extract($variables);
        if ($withHeader) {
            Template::header_admin();
            include ConstanteServer::base_path_app() . '/' . $filepath;
            Template::footer_admin();
        } else
            include ConstanteServer::base_path_app() . '/' . $filepath;


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
    static private function header_admin(): void
    {
        include_once ConstanteServer::base_path_vues_common() . ("/admin/header.php");
    }
    static private function footer_admin(): void
    {
        include_once ConstanteServer::base_path_vues_common() . ("/admin/footer.php");
    }
}
