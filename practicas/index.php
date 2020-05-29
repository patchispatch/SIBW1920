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
    if(startsWith($uri, "/portada") || $uri === "/") {
        include("scripts/portada.php");
    }
    else if(startsWith($uri, "/evento")) {
        include("scripts/evento.php");
    }
    else if(startsWith($uri, "/subir-comentario")) {
        include("scripts/subir-comentario.php");
    }
    else if(startsWith($uri, "/search")) {
        include("scripts/search.php");
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

    // MOD
    else if(startsWith($uri, "/lista-comentarios") && ($_SESSION['role'] == 'mod' || $_SESSION['role'] == 'admin')) {
        include("scripts/lista-comentarios.php");
    }
    else if(startsWith($uri, "/borrar-comentario") && ($_SESSION['role'] == 'mod' || $_SESSION['role'] == 'admin')) {
        include("scripts/borrar-comentario.php");
    }
    else if(startsWith($uri, "/modificar-comentario") && ($_SESSION['role'] == 'mod' || $_SESSION['role'] == 'admin')) {
        include("scripts/modificar-comentario.php");
    }
    else if(startsWith($uri, "/actualizar-comentario") && ($_SESSION['role'] == 'mod' || $_SESSION['role'] == 'admin')) {
        include("scripts/actualizar-comentario.php");
    }

    // GEST
    else if(startsWith($uri, "/subir-evento") && ($_SESSION['role'] == 'gest' || $_SESSION['role'] == 'admin')) {
        include("scripts/subir-evento.php");
    }
    else if(startsWith($uri, "/lista-eventos") && ($_SESSION['role'] == 'gest' || $_SESSION['role'] == 'admin')) {
        include("scripts/lista-eventos.php");
    }
    else if(startsWith($uri, "/borrar-evento") && ($_SESSION['role'] == 'gest' || $_SESSION['role'] == 'admin')) {
        include("scripts/borrar-evento.php");
    }
    else if(startsWith($uri, "/nuevo") && ($_SESSION['role'] == 'gest' || $_SESSION['role'] == 'admin')) {
        include("scripts/nuevo.php");
    }
    else if(startsWith($uri, "/modificar-evento") && ($_SESSION['role'] == 'gest' || $_SESSION['role'] == 'admin')) {
        include("scripts/modificar-evento.php");
    }
    else if(startsWith($uri, "/actualizar-evento") && ($_SESSION['role'] == 'gest' || $_SESSION['role'] == 'admin')) {
        include("scripts/actualizar-evento.php");
    }

    // ADMIN
    else if(startsWith($uri, "/lista-usuarios") && ($_SESSION['role'] == 'admin')) {
        include("scripts/lista-usuarios.php");
    }
    else if(startsWith($uri, "/borrar-usuario") && ($_SESSION['role'] == 'admin')) {
        include("scripts/borrar-usuario.php");
    }
    else if(startsWith($uri, "/nuevo-usuario") && ($_SESSION['role'] == 'admin')) {
        include("scripts/nuevousuario.php");
    }
    else if(startsWith($uri, "/subir-usuario") && ($_SESSION['role'] == 'admin')) {
        include("scripts/subir-usuario.php");
    }
    else if(startsWith($uri, "/modificar-usuario") && ($_SESSION['role'] == 'admin')) {
        include("scripts/modificar-usuario.php");
    }
    else if(startsWith($uri, "/actualizar-usuario") && ($_SESSION['role'] == 'admin')) {
        include("scripts/actualizar-usuario.php");
    }

    // ERROR
    else {
        include("scripts/error.php");
    }
?>