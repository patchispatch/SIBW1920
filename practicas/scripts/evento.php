<?php
    require 'db.php';

    $resto = substr($uri, 8);
    $idEvent = intval($resto);

    // Event info
    $event = event_info($idEvent);
    $images = event_images($idEvent);

    $title = $event["titulo"];
    $author = $event["autor"];
    $date = $event["fecha"];
    $content = $event["texto"];

    // Render
    echo $twig->render('evento.html', [
        'pagename' => $title,
        'title' => $title,
        'author' => $author,
        'date' => $date,
        'content' => $content,
        'images' => $images,
    ]);
?>