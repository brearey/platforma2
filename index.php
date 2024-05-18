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
    <title>Document</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">TODO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Tasks <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Add User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">All Users</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Logout</a>
                </li>
            </ul>

        </div>
    </nav>

    <div class="container">
        <div class="task">
            <div class="col-8 mx-auto">
                <form action="handelers/store-task.php" method="POST" class="form border p-2 my-5">
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
                    <input type="text" name="title" class="form-control my-3 border border-success" placeholder="add new todo">
                    <input type="submit" value="Add" class="form-control btn btn-primary my-3 " placeholder="add new todo">
                </form>
            </div>
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Task</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($tasks as $task) : ?>

                            <?php // var_dump($task); die; 
                            ?>
                            <tr>
                                <td><?php echo $task['id']; ?></td>
                                <td><?php echo $task['name']; ?></td>
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