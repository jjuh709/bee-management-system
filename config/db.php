<?php
$host = "mysql-db";  // Use "mysql-db" as the container name
$port = 3306;  // Default MySQL port
$user = "root";
$pass = "root";  // Change if you used a different password
$dbname = "bee_management";

// Create a connection
$conn = new mysqli($host, $user, $pass, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed: " . $conn->connect_error]));
}
?>
