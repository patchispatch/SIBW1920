<?php
    require_once 'db.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['username'])) {
            $username = $_POST['username'];
        }
    }
    delete_user($username);

    header('Location: /lista-usuarios');
?>