<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    require 'db.php';

    $loader = new \Twig\Loader\FilesystemLoader('../html');
    $twig = new \Twig\Environment($loader);

    // Event info
    $event = event_info(1);

    $title = $event["titulo"];
    $author = $event["autor"];
    $date = $event["fecha"];
    $content = $event["texto"];

    $images = event_images(1);

    // Render
    echo $twig->render('evento.html', [
        'title' => $title,
        'author' => $author,
        'date' => $date,
        'content' => $content,
        'images' => $images,
    ]);
?>