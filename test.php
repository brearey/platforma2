<?php

require_once('./utils/autoload.php');
require_once('./api/task-controller.php');

$taskController = new TaskController();

// addTask("Clear the room");
// deleteTask(7);
$taskController->updateTask(8, "updated task", true);
echo ("<br>");
echo ("test");
