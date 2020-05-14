<?php
    session_start();
    require 'db.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['comment-id'])) {
        // Page name
        $variables['pagename'] = "Modificar comentario";

        $id = $_POST['comment-id'];
        $variables['comentario'] = comment_info($id);

        if(isset($_SESSION['username'])) {
            $variables['username'] = $_SESSION['username'];
            $variables['role'] = $_SESSION['role'];
        }
    
        echo $twig->render('modificar-comentario.html', $variables);
    }
    else {
        header('Location: /error');
    }
?>