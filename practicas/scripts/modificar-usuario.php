<?php
    session_start();
    require 'db.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'])) {
        // Page name
        $variables['pagename'] = "Modificar usuario";

        $old_username = $_POST['username'];
        $variables['usuario'] = user_info($old_username);


        if(isset($_SESSION['username'])) {
            $variables['username'] = $_SESSION['username'];
            $variables['role'] = $_SESSION['role'];
        }
    
        echo $twig->render('modificar-usuario.html', $variables);
    }
    else {
        header('Location: /error');
    }
?>