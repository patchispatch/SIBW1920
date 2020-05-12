<?php
    require_once 'db.php';

    // Procesar el formulario de nuevo evento
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Título
        if(isset($_POST['id'])) {
            $id = $_POST['id'];
        }

        if(isset($_POST['author'])) {
            $author = $_POST['author'];
        }

        if(isset($_POST['comment'])) {
            $comment = $_POST['comment'];
        }

        // Subir comentario
        new_comment($id, $author, $comment);

        header('Location: eventos/' . $id);
    }
?>