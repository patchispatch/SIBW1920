<?php
    session_start();
    require 'db.php';

    // Event number
    $resto = substr($uri, 8);
    $idEvent = intval($resto);

    // Event info
    $event = event_info($idEvent);
    
    // Twig variables
    $variables['images'] = event_images($idEvent);
    $variables['title'] = $event["titulo"];
    $variables['author'] = $event["autor"];
    $variables['date'] = $event["fecha"];
    $variables['content'] = $event["texto"];

    if(isset($_SESSION['username'])) {
        $variables['username'] = $_SESSION['username'];
        $variables['role'] = $_SESSION['role'];
    }

    // Render
    echo $twig->render('evento.html', $variables);
?>