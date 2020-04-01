<?php

// Connects to the database
function connect() {
    $connection = new mysqli('localhost', 'pepe', 'mango', 'SIBW');

    if(mysqli_connecto_errno()) {
        die("Error de conexión");
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



?>