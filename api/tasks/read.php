<?php
session_start();

if(!isset($_SESSION['user_id']))
{
    http_response_code(401);
    echo json_encode(['message'=> "Unauthorised"]);
    exit();
}

header("Content-Type: application/json");

include_once "../db.php";
include_once "Task.php";

$database = new Database();
$db = $database->getConnection();

$task = new Task($db);
$stmt = $task->read();
$num = $stmt->rowCount();

if ($num > 0) {
    $tasks = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $tasks[] = array(
            "id" => $id,
            "title" => $title,
            "description" => $description,
            "status" => $status
        );
    }
    echo json_encode($tasks);
} else {
    echo json_encode(["message" => "No tasks found."]);
}
