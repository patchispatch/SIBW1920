<?php
    session_start();
    require_once 'db.php';

    $variables['usuarios'] = all_users_list();

    if(isset($_SESSION['username'])) {
        $variables['username'] = $_SESSION['username'];
        $variables['role'] = $_SESSION['role'];
    }

    echo $twig->render('lista-usuarios.html', $variables);
?>