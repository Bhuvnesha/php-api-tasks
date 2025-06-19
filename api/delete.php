<?php
header("Content-Type: application/json");

include_once "db.php";
include_once "Task.php";

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->id)) {
    $database = new Database();
    $db = $database->getConnection();

    $query = "DELETE FROM tasks WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":id", $data->id);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Task deleted."]);
    } else {
        echo json_encode(["message" => "Unable to delete task."]);
    }
} else {
    echo json_encode(["message" => "Task ID not provided."]);
}
