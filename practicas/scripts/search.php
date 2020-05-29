<?php
    require_once 'db.php';

    header('Content-Type: application/json');

    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        if(isset($_GET['query'])) {
            $query = $_GET['query'];
        }
    }
    
    $result = search_events($query);

    echo(json_encode($result));
?>