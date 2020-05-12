<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";

    $loader = new \Twig\Loader\FilesystemLoader('html');
    $twig = new \Twig\Environment($loader);

    function startsWith($string, $query) {
        return substr($string, 0, strlen($query)) === $query;
    }

    $uri = $_SERVER['REQUEST_URI'];

    // TO DO: añadir comprobación de que el usuario no esté logueado
    if(startsWith($uri, "/login")) {
        include("scripts/login.php");
    }
    else if(startsWith($uri, "/logout")) {
        include("scripts/logout.php");
    }
    else if(startsWith($uri, "/session")) {
        include("scripts/session.php");
    }
    else if(startsWith($uri, "/evento")) {
        include("scripts/evento.php");
    }
    else if(startsWith($uri, "/cpanel")) {
        include("scripts/cpanel.php");
    }
    else if(startsWith($uri, "/subir-evento")) {
        include("scripts/subir-evento.php");
    }
    else if(startsWith($uri, "/subir-comentario")) {
        include("scripts/subir-comentario.php");
    }
    // QUITAR
    else if(startsWith($uri, "/nuevousuario")) {
        include("scripts/nuevousuario.php");
    }
    else if(startsWith($uri, "/subirusuario")) {
        include("scripts/subir-usuario.php");
    }
    else if(startsWith($uri, "/nuevo")) {
        include("scripts/nuevo.php");
    }
    else {
        include("scripts/portada.php");
    }
?>