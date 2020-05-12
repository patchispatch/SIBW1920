<?php
    session_start();
    require 'db.php';

    // Variables twig
    $variables['pagename'] = "Página principal";
    $variables['events'] = all_events();

    if(isset($_SESSION['username'])) {
        $variables['username'] = $_SESSION['username'];
        $variables['role'] = $_SESSION['role'];
    }

    echo $twig->render('portada.html', $variables);


?>