<?php
require_once(dirname(__FILE__) . '/../database/connect.php');
require_once(dirname(__FILE__) . '/../utils/functions.php');

class TaskController
{
    private $table = "tasks";

    public function deleteTask($id)
    {
        $task = R::load($this->table, $id);
        errorHandler($task, "task not exists");
        $trash = R::trash($task);
        errorHandler($trash, "trash error");
        successHandler("task deleted");
        header("location:../index.php");
    }

    public function addTask($name)
    {
        $task = R::dispense($this->table);
        errorHandler($task, "error dispense task");
        $task->name = $name;
        $task->is_done = false;
        $id = R::store($task);
        errorHandler($id, "error add task");
        successHandler("task created");
        header("location:../index.php");
    }

    public function updateTask($id, $name, $is_done)
    {
        $task = R::load($this->table, $id);
        errorHandler($task, "error load task");
        $task->name = $name;
        $task->is_done = $is_done;
        $id = R::store($task);
        errorHandler($id, "error update task");
        successHandler("task updated");
        header("location:../index.php");
    }
}
