<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";

    $loader = new \Twig\Loader\FilesystemLoader('../html');
    $twig = new \Twig\Environment($loader);

    // Page name
    $pagename = "Página principal";

    echo $twig->render('portada.html', [
        'pagename' => $pagename,
    ]);

?>