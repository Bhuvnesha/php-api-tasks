<?php
header("Content-Type: application/json");

include_once "../db.php";

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->username) && !empty($data->password)) {
    $username = htmlspecialchars(strip_tags($data->username));
    $password = password_hash($data->password, PASSWORD_BCRYPT);

    $db = (new Database())->getConnection();
    $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $password);

    if ($stmt->execute()) {
        echo json_encode(["message" => "User registered successfully."]);
    } else {
        echo json_encode(["message" => "Username already taken."]);
    }
} else {
    echo json_encode(["message" => "Username and password required."]);
}
