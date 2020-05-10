<?php

// Connects to the database
function connect() {
    $connection = new mysqli("mysql", "pepe", "mango", "SIBW");

    if($connection->connect_errno) {
        echo("Fallo al conectar: " . $connection->connect_error);
    }

    return $connection;
}

// Starts a query
function query($connection, $query) {
    // Query
    $result = $connection->query($query);

    // Close the connection
    $connection->close();

    return $result;
}

// Returns all events title and cover
function all_events() {
    // Connect to the database
    $conn = connect();
        
    // Prepare query
    $stmt = "SELECT id, titulo, portada FROM eventos";

    // Send query and close connection
    $result = query($conn, $stmt);

    // Parse result:
    if($result->num_rows > 0) {
        $row = $result->fetch_all(MYSQLI_ASSOC);
    }

    return $row; 
}

// Returns event data in an associative array
function event_info($id) {
    // Connect to the database
    $conn = connect();
    
    // Prepare query
    $stmt = "SELECT * FROM eventos WHERE id=" . $id;

    // Send query and close connection
    $result = query($conn, $stmt);

    // Parse result:
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }

    return $row;
}

// Returns event images route in an array
function event_images($id) {
    // Connect to database
    $conn = connect();

    // Prepare query
    $stmt = "SELECT ruta, pie FROM imagenes WHERE evento=" . $id;

    // Send query and close connection
    $result = query($conn, $stmt);

    // Parse result:
    if($result->num_rows > 0) {
        $rows = $result->fetch_all(MYSQLI_ASSOC);
    }

    return $rows;
}

function new_event($title, $author, $event, $cover) {
    // Connect to database
    $conn = connect();

    // Prepare query
    $date = date("Y-m-d H:i:s");
    $stmt = $conn->prepare("INSERT INTO eventos (titulo, autor, fecha, portada, texto) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $title, $author, $date, $cover, $event);

    // Send query
    if ($stmt->execute()) {
        echo("Ha colao");
    }
    else {
        echo("No ha colao");
    }

    // Close connection
    $conn->close();
}

?>