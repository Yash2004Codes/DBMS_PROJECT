<?php

// Database connection settings
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "dbms";

// Attempt to connect to the database
$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

// Check if the connection was successful
if (!$conn) {
    echo "Not connected to the database. Error: " . mysqli_connect_error();
} else {
    echo "Connected to the database successfully.<br>";
}

// Close the connection when done
//mysqli_close($conn);

?>
