<?php
    session_start();
    require_once 'db.php';

    $variables['comentarios'] = all_comments_list();

    if(isset($_SESSION['username'])) {
        $variables['username'] = $_SESSION['username'];
        $variables['role'] = $_SESSION['role'];
    }

    echo $twig->render('lista-comentarios.html', $variables);
?>