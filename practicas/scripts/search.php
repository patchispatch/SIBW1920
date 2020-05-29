<?php
    session_start();
    require_once 'db.php';

    header('Content-Type: application/json');

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['query'])) {
            $query = $_POST['query'];
        }
    }
    
    // EVENTOS PUBLICADOS
    if($_SESSION['role'] == 'gest' || $_SESSION['role'] == 'admin') {
        $result = search_events_draft($query);
    }
    else {
        $result = search_events($query);
    }


    echo(json_encode($result));
?>