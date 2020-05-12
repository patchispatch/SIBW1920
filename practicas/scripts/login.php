<?php
    session_start();

    if(isset($_SESSION['username'])) {
        header('Location: /');
    }
    else {
        echo $twig->render('login.html', []);
    }
?>