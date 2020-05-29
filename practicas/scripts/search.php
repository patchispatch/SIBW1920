<?php
    require_once 'db.php';

    header('Content-Type: application/json');

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['query'])) {
            $query = $_POST['query'];
        }
    }
    
    $result = search_events($query);

    echo(json_encode($result));
?>