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

function all_events_list() {
    $conn = connect();

    $stmt = $conn->prepare("SELECT id, titulo, autor, fecha FROM eventos");
    $stmt->execute();

    // Check
    $result = $stmt->get_result();
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    $conn->close();
    return $rows;
}

function all_users_list() {
    $conn = connect();

    $stmt = $conn->prepare("SELECT username, rol FROM usuarios");
    $stmt->execute();

    // Check
    $result = $stmt->get_result();
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    $conn->close();
    return $rows;
}

function all_comments_list() {
    $conn = connect();

    $stmt = $conn->prepare("SELECT id, autor, fecha, evento FROM comentarios");
    $stmt->execute();

    // Check
    $result = $stmt->get_result();
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    $conn->close();
    return $rows;
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

function event_comments($id) {
    $conn = connect();

    $stmt = $conn->prepare("SELECT autor, fecha, contenido FROM comentarios WHERE (evento = ?)");
    $stmt->bind_param("s", $id);
    $stmt->execute();

    // Check
    $result = $stmt->get_result();
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    $conn->close();
    return $rows;
}

function new_event($title, $author, $event, $cover, $images) {
    // Connect to database
    $conn = connect();

    // Prepare query
    $date = date("Y-m-d H:i:s");
    $stmt = $conn->prepare("INSERT INTO eventos (titulo, autor, fecha, portada, texto) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $title, $author, $date, $cover, $event);

    // Send query
    $stmt->execute();

    // Images:
    // Retrieve event ID
    $last_id = $conn->insert_id;

    // Save images
    foreach($images as $img) {
        $stmt = $conn->prepare("INSERT INTO imagenes (ruta, evento) VALUES (?, ?)");
        $stmt->bind_param("si", $img, $last_id);
        $stmt->execute();
    }

    // Close connection
    $conn->close();

    return $last_id;
}

function new_user($username, $password, $role) {
    $conn = connect();

    $stmt = $conn->prepare("INSERT INTO usuarios (username, password, rol) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $username, $password, $role);
    $stmt->execute();

    $conn->close();
}

function new_comment($event_id, $author, $content) {
    $conn = connect();

    $date = date("Y-m-d H:i:s");

    $stmt = $conn->prepare("INSERT INTO comentarios (autor, fecha, evento, contenido) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $author, $date, $event_id, $content);
    $stmt->execute();

    $conn->close();
}

function check_user($username, $password) {
    $conn = connect();

    $stmt = $conn->prepare("SELECT password FROM usuarios WHERE (username = ?)");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    // Check
    $result = $stmt->get_result();
    $hash = $result->fetch_assoc();

    $conn->close();

    return password_verify($password, $hash['password']);
}

function user_info($username) {
    $conn = connect();

    $stmt = $conn->prepare("SELECT username, rol FROM usuarios WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();
    $user_data = $result->fetch_assoc();

    return $user_data;
}

function delete_comment($id) {
    $conn = connect();

    $stmt = $conn->prepare("DELETE FROM comentarios WHERE id = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();

    $conn->close();
}

function delete_event($id) {
    $conn = connect();

    // Delete events
    $stmt1 = $conn->prepare("DELETE FROM eventos WHERE id = ?");
    $stmt1->bind_param("s", $id);
    $stmt1->execute();

    $conn->close();
}

function delete_user($username) {
    $conn = connect();

    // Delete events
    $stmt1 = $conn->prepare("DELETE FROM usuarios WHERE username = ?");
    $stmt1->bind_param("s", $username);
    $stmt1->execute();

    $conn->close();
}



?>