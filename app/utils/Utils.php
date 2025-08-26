<?php
namespace App\Utils;

class Utils{
    /**
     * Summary of redirect
     * @param string $path chemin de l'adresse a specifiée a partir du projet
     * @param int $status
     * @return never
     */
    public static function redirect(string $path =  '/', int $status = 302): void
    {
        $p = '/php/tastyfood_mvc';
        if (!headers_sent()) {
            header("Location: " . $p . $path, true, $status);
            exit;
        } else {
            echo "<script>window.location.href = '$p . $path';</script>";
            exit;
        }
    }

    public static function showErrors()
    {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }
}