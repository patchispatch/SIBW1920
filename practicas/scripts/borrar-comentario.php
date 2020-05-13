<?php
    require_once 'db.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['comment-id'])) {
            $id = $_POST['comment-id'];
        }
    }

    delete_comment($id);

    header('Location: /lista-comentarios');
?>