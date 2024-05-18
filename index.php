<?php session_start();
require_once(dirname(__FILE__) . '/database/connect.php');
$tasks = R::findAll("tasks");
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Todo app by brearey</title>
</head>

<body>
    <div class="container">
        <div class="task">
            <div class="col-8 mx-auto">
                <?php if (isset($_SESSION['success'])) : ?>
                    <div class="alert alert-success text-center">
                        <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>

                    </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['errors'])) : ?>
                    <div class="alert alert-danger text-center">
                        <?php
                        echo $_SESSION['errors'];
                        unset($_SESSION['errors']);
                        ?>

                    </div>
                <?php endif; ?>
                <form action="/api/index.php" method="POST" class="form border p-2 my-5">
                    <input type="text" name="name" class="form-control my-3 border border-success" placeholder="add new todo">
                    <input type="submit" value="Add" class="form-control btn btn-primary my-3">
                </form>
            </div>
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Задача</th>
                            <th>Выполнено?</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($tasks as $task) : ?>

                            <?php // var_dump($task); die; 
                            ?>
                            <tr>
                                <td><?= $task['id']; ?></td>
                                <td><?= $task['name']; ?></td>
                                <td><?= $task['is_done'] ? "Да" : "Нет" ?></td>
                                <td>
                                    <a href="api?action=delete&id=<?php echo $task['id']; ?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i> </a>
                                    <a href="update.php?id=<?php echo $task['id']; ?>" class="btn btn-info"><i class="fa-solid fa-edit"></i> </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="script.js"></script>
</body>

</html>