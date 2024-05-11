<?php
require_once(dirname(__FILE__) . '/./api/TaskController.php');

$taskController = new TaskController();

// addTask("Clear the room");
// deleteTask(7);
$taskController->updateTask(8, "updated task", true);
echo ("<br>");
echo ("test");
