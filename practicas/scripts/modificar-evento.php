<?php
    session_start();
    require 'db.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['event-id'])) {
        // Page name
        $variables['pagename'] = "Modificar evento";

        $id = $_POST['event-id'];
        $variables['evento'] = event_info($id);

        // Encode for CKEditor
        $variables['evento']['texto'] = str_replace( '&', '&amp;', $variables['evento']['texto']);

        if(isset($_SESSION['username'])) {
            $variables['username'] = $_SESSION['username'];
            $variables['role'] = $_SESSION['role'];
        }
    
        echo $twig->render('modificar-evento.html', $variables);
    }
    else {
        header('Location: /error');
    }
?>