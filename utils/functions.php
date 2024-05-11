<?php
function successHandler($successMessage)
{
    echo ($successMessage); // DEV MODE
    $_SESSION["success"] = $successMessage;
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
