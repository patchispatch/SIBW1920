<?php
    session_start();
    require_once 'db.php';

    // Procesar el formulario de nuevo evento
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Título
        if(isset($_POST['title'])) {
            $title = $_POST['title'];
        }

        // Evento
        if(isset($_POST['event'])) {
            $event = $_POST['event'];
        }

        // Subir a la base de datos
        $id = $_POST['event-id'];
        update_event($title, $event, $id);

        header('Location: /evento/' . $id);
    }
?>