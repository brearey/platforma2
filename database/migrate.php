<?php
require(__DIR__ . "/../utils/functions.php");
require(__DIR__ . getPath("/../database/config.php"));
$create_tables = file_get_contents("./sql/tables.sql");
$insert_data = file_get_contents("./sql/insert.sql");

try {
    $mysqli = new mysqli($host, $user, $password, $dbname);
    // Выполнение SQL запроса create_tables
    if (!mysqli_multi_query($mysqli, $create_tables)) {
        echo "Error executing query: (" . mysqli_errno($mysqli) . ") " . mysqli_error($mysqli);
    }

    // Выполнение SQL запроса insert_data
    if (!mysqli_multi_query($mysqli, $insert_data)) {
        echo "Error executing query: (" . mysqli_errno($mysqli) . ") " . mysqli_error($mysqli);
    }
} catch (Exception $err) {
    var_dump($err);
}
