<?php
    session_start();
    require_once 'db.php';

    // Procesar el formulario de nuevo evento
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Comentario
        if(isset($_POST['comentario'])) {
            $comment = $_POST['comentario'];
            $comment = $comment . "\n [ MODIFICADO POR UN MODERADOR ]";
        }

        // Subir a la base de datos
        $id = $_POST['comment-id'];
        update_comment($id, $comment);

        header('Location: /lista-comentarios');
    }
?>