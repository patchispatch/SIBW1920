<?php
    require_once 'db.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['event-id'])) {
            $id = $_POST['event-id'];
        }
    }
    delete_event($id);

    header('Location: /lista-eventos');
?>