<?php
require_once "../config/config.php";

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data["username"]) || !isset($data["password"])) {
        echo json_encode(["error" => "Missing username or password"]);
        exit;
    }

    $username = $data["username"];
    $password = $data["password"];

    $stmt = $pdo->prepare("SELECT id, password, role FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user["password"])) {
        echo json_encode(["message" => "Login successful", "role" => $user["role"]]);
    } else {
        echo json_encode(["error" => "Invalid credentials"]);
    }
}
?>
