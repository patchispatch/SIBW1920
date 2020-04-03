<?php
    require 'db.php';

// Page name
    $pagename = "Página principal";

    // Events available
    $events = all_events();


    echo $twig->render('portada.html', [
        'pagename' => $pagename,
        'events' => $events,
    ]);
?>