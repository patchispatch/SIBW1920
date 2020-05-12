<?php
    require_once 'db.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['username'])) {
            $username = $_POST['username'];
        }
        if(isset($_POST['passwd'])) {
            $passwd = password_hash($_POST['passwd'], PASSWORD_DEFAULT);
        }
        if(isset($_POST['role'])) {
            $role = $_POST['role'];
        }

        // Guardar en base de datos
        new_user($username, $passwd, $role);
    }

    header('Location: /nuevousuario');

?>