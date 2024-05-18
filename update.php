<?php session_start();
require_once(dirname(__FILE__) . '/database/connect.php');

$task;

if (isset($_GET['id'])) {
    $task = R::load("tasks", $_GET['id']);
} else {
    $task = R::load("tasks", 1);
}

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <h1>Updating task</h1>
                <form action="/api" method="GET" class="form border p-2 my-5">

                    <?php if (isset($_SESSION['errors'])) : ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            echo $_SESSION['errors'];
                            unset($_SESSION['errors']);
                            ?>

                        </div>
                    <?php endif; ?>
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                    <input type="text" name="name" value="<?php echo $task['name']; ?>" class="form-control my-3 border border-success" placeholder="add new todo">
                    <input type="checkbox" name="is_done" <?= $task['is_done'] ? 'checked' : ''; ?> value="1" class="form-control my-3 border border-success">
                    <input type="submit" value="Сохранить" class="form-control btn btn-primary my-3">
                </form>
            </div>

        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="script.js"></script>
</body>

</html>