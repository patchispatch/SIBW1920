<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";

    $loader = new \Twig\Loader\FilesystemLoader('../html');
    $twig = new \Twig\Environment($loader);

    // Page name
    $pagename = "AAAAAAAAAH (versión para imprimir)";

    // Render
    echo $twig->render('evento-imprimir.html', [
        'pagename' => $pagename,
    ]);
?>