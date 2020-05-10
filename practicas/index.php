<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";

    $loader = new \Twig\Loader\FilesystemLoader('html');
    $twig = new \Twig\Environment($loader);

    function startsWith($string, $query) {
        return substr($string, 0, strlen($query)) === $query;
    }

    $uri = $_SERVER['REQUEST_URI'];

    if(startsWith($uri, "/evento")) {
        include("scripts/evento.php");
    }
    else if(startsWith($uri, "/cpanel")) {
        include("scripts/cpanel.php");
    }
    else if(startsWith($uri, "/nuevo")) {
        include("scripts/nuevo.php");
    }
    else if(startsWith($uri, "/subir-evento")) {
        include("scripts/subir-evento.php");
    }
    else {
        include("scripts/portada.php");
    }
?>