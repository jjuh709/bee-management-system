<?php
require_once '../config/db.php';

header('Content-Type: application/json');

$sql = "SHOW TABLES";
$result = $conn->query($sql);

$tables = [];
if ($result) {
    while ($row = $result->fetch_array()) {
        $tables[] = $row[0];
    }
    echo json_encode(["success" => true, "tables" => $tables]);
} else {
    echo json_encode(["error" => "Failed to retrieve tables"]);
}
?>
