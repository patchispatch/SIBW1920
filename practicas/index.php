<?php
    session_start();
    require_once "/usr/local/lib/php/vendor/autoload.php";

    $loader = new \Twig\Loader\FilesystemLoader('html');
    $twig = new \Twig\Environment($loader);

    function startsWith($string, $query) {
        return substr($string, 0, strlen($query)) === $query;
    }

    $uri = $_SERVER['REQUEST_URI'];

    // PARA TODOS
    if(startsWith($uri, "/portada")) {
        include("scripts/portada.php");
    }
    else if(startsWith($uri, "/evento")) {
        include("scripts/evento.php");
    }
    else if(startsWith($uri, "/subir-comentario")) {
        include("scripts/subir-comentario.php");
    }

    // SESIÓN
    else if(startsWith($uri, "/login") && !isset($_SESSION['username'])) {
        include("scripts/login.php");
    }
    else if(startsWith($uri, "/logout")) {
        include("scripts/logout.php");
    }
    else if(startsWith($uri, "/session")) {
        include("scripts/session.php");
    }

    // PERMISOS
    else if(startsWith($uri, "/cpanel") && 
    ($_SESSION['role'] == 'mod' || $_SESSION['role'] == 'gest' || $_SESSION['role'] == 'admin')) {
        include("scripts/cpanel.php");
    }
    else if(startsWith($uri, "/lista-comentarios")) {
        include("scripts/lista-comentarios.php");
    }
    else if(startsWith($uri, "/subir-evento")) {
        include("scripts/subir-evento.php");
    }
    else if(startsWith($uri, "/lista-eventos")) {
        include("scripts/lista-eventos.php");
    }
    else if(startsWith($uri, "/lista-usuarios")) {
        include("scripts/lista-usuarios.php");
    }

    else if(startsWith($uri, "/borrar-comentario")) {
        include("scripts/borrar-comentario.php");
    }
    else if(startsWith($uri, "/borrar-evento")) {
        include("scripts/borrar-evento.php");
    }
    else if(startsWith($uri, "/borrar-usuario")) {
        include("scripts/borrar-usuario.php");
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