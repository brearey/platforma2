<?php
session_start();
require_once($GLOBALS["root_path"] . "utils/autoload.php");

define("TABLE", "tasks");

// if (isset($_GET["delete"])) {
//     if (isset($_GET["id"])) {
//         $id = $_GET["id"];

//         $task = R::load("Task", $id);

//         if (!$task) {
//             $_SESSION["errors"] = "task not exists";
//         } else {
//             R::trash($task);
//             $_SESSION["success"] = "data deleted succesfully";
//         }




//         // redirection 
//         header("location:../index.php");
//     }
// }

function deleteTask($id)
{
    $task = R::load(TABLE, $id);
    errorHandler($task, "task not exists");
    $trash = R::trash($task);
    errorHandler($trash, "trash error");
    successHandler("task deleted");
}

function addTask($name)
{
    $task = R::dispense(TABLE);
    errorHandler($task, "error dispense task");
    $task->name = $name;
    $task->is_done = false;
    $id = R::store($task);
    errorHandler($id, "error add task");
    successHandler("task created");
}

function updateTask($id, $name, $is_done)
{
    $task = R::load(TABLE, $id);
    errorHandler($task, "error load task");
    $task->name = $name;
    $task->is_done = $is_done;
    $id = R::store($task);
    errorHandler($id, "error update task");
    successHandler("task updated");
}

function errorHandler($entity, $errorMessage)
{
    if (!$entity) {
        dmp($entity); // DEV MODE
        echo ($errorMessage); // DEV MODE
        $_SESSION["errors"] = $errorMessage;
        die();
    }
}

function successHandler($successMessage)
{
    echo ($successMessage); // DEV MODE
    $_SESSION["success"] = $successMessage;
}
