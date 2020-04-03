<?php
    require 'scripts/db.php';

    // Connect to database
    $conn = connect();

    // Prepare query
    $query = "SELECT * FROM bannedwords";

    // Send query and close connection
    $result = query($conn, $query);

    // Get results
    if($result->num_rows > 0) {
        while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
        }
        $json = json_encode($myArray);
    }

    echo $json;
?>