<?php
    session_start();
    require_once 'db.php';

    // Procesar el formulario de nuevo evento
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Comentario
        if(isset($_POST['username'])) {
            $old_username = $_POST['old-username'];
            $new_username = $_POST['username'];
            $new_role = $_POST['role'];
        }
        // Subir a la base de datos

        if(isset($_POST['passwd']) && $_POST['passwd'] != "") {
            $new_passwd = password_hash($_POST['passwd'], PASSWORD_DEFAULT);
        }
        else {
            $new_passwd = 'null';
        }

        update_user($old_username, $new_username, $new_passwd, $new_role);

        header('Location: /lista-usuarios');
    }
?>