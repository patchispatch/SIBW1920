<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";

    $loader = new \Twig\Loader\FilesystemLoader('../html');
    $twig = new \Twig\Environment($loader);

    // Page name
    $title = "AAAAAAAAAH";
    $author = "";
    $date = "";
    $content = "";

    // Render
    echo $twig->render('evento.html', [
        'title' => $title,
        'author' => $author,
        'date' => $date,
        'content' => $content,
    ]);
?>