<?php
session_start();

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
