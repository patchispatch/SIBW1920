<?php
    session_start();

    if(isset($_SESSION['username'])) {
        $variables['username'] = $_SESSION['username'];
        $variables['role'] = $_SESSION['role'];
    }
    
    echo $twig->render('error.html', $variables);
?>