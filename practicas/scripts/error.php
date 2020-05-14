<?php
    session_start();

    $variables['pagename'] = '404';

    if(isset($_SESSION['username'])) {
        $variables['username'] = $_SESSION['username'];
        $variables['role'] = $_SESSION['role'];
    }
    
    echo $twig->render('error.html', $variables);
?>