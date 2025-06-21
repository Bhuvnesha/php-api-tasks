<?php
header("Content-Type: application/json");

session_start();

if(!isset($_SESSION['user_id']))
{
    http_response_code(401);
    echo json_encode(['message'=> "Unauthorised"]);
    exit();
}


include_once "../db.php";
include_once "Task.php";

$data = json_decode(file_get_contents("php://input"));

if (
    !empty($data->id) &&
    !empty($data->title)
) {
    $database = new Database();
    $db = $database->getConnection();

    $task = new Task($db);
    $task->id = $data->id;
    $task->title = $data->title;
    $task->description = $data->description ?? "";
    $task->status = $data->status ?? "pending";

    $query = "UPDATE tasks SET title = :title, description = :description, status = :status WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":title", $task->title);
    $stmt->bindParam(":description", $task->description);
    $stmt->bindParam(":status", $task->status);
    $stmt->bindParam(":id", $task->id);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Task updated successfully."]);
    } else {
        echo json_encode(["message" => "Task update failed."]);
    }
} else {
    echo json_encode(["message" => "Incomplete data."]);
}
