<?php
    session_start();
    require 'db.php';

// Page name
    $variables['pagename'] = "Nuevo evento";

    if(isset($_SESSION['username'])) {
        $variables['username'] = $_SESSION['username'];
        $variables['role'] = $_SESSION['role'];
    }

    echo $twig->render('nuevo.html', $variables);
?>