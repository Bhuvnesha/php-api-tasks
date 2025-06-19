<?php
header("Content-Type: application/json");

include_once "db.php";
include_once "Task.php";

$data = json_decode(file_get_contents("php://input"));

if (
    !empty($data->title) &&
    isset($data->status)
) {
    $database = new Database();
    $db = $database->getConnection();

    $task = new Task($db);
    $task->title = $data->title;
    $task->description = $data->description ?? "";
    $task->status = $data->status;

    if ($task->create()) {
        echo json_encode(["message" => "Task was created."]);
    } else {
        echo json_encode(["message" => "Unable to create task."]);
    }
} else {
    echo json_encode(["message" => "Incomplete data."]);
}
