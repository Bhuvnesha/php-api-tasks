<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(["message" => "Unauthorized"]);
    exit;
}

header("Content-Type: application/json");
include_once "../db.php";

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->id)) {
    $db = (new Database())->getConnection();
    $query = "DELETE FROM tasks WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":id", $data->id);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Task deleted successfully."]);
    } else {
        echo json_encode(["message" => "Delete failed."]);
    }
} else {
    echo json_encode(["message" => "Task ID required."]);
}
