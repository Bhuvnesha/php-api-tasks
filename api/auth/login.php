<?php
session_start();
header("Content-Type: application/json");

include_once "../db.php";

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->username) && !empty($data->password)) {
    $db = (new Database())->getConnection();

    $query = "SELECT * FROM users WHERE username = :username";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":username", $data->username);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($data->password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        echo json_encode(["message" => "Login successful."]);
    } else {
        echo json_encode(["message" => "Invalid credentials."]);
    }
} else {
    echo json_encode(["message" => "Username and password required."]);
}
