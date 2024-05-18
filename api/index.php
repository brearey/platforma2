<?php
session_start();
require_once('TaskController.php');
$taskController = new TaskController();

// Delete task
if (isset($_GET["action"]) && isset($_GET["id"]) && $_GET["action"] == "delete") {
    $taskController->deleteTask($_GET["id"]);
    header("location:../index.php");
}

// Update task
if (isset($_GET["action"]) && isset($_GET["id"]) && isset($_GET["name"]) && $_GET["action"] == "update") {
    $taskController->updateTask($_GET["id"], $_GET["name"], $_GET["is_done"]);
    header("location:../index.php");
}
