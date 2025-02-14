<?php
$host = "localhost"; // Change if using a remote database
$dbname = "bee_management";
$username = "root"; // Default MySQL user
$password = ""; // If you set a password, update it here

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
