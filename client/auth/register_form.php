<?php
session_start();
require_once('../../server/config/connect.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6 mt-5">
                <form action="register_db.php" method="post">
                    <h3 class="text-center">Register</h3>
                    <?php if (isset($_SESSION['error'])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                            ?>
                        </div>
                    <?php } ?>
                    <?php if (isset($_SESSION['success'])) { ?>
                        <div class="alert alert-success" role="alert">
                            <?php
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                            ?>
                        </div>
                    <?php } ?>
                    <?php if (isset($_SESSION['warning'])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php
                            echo $_SESSION['warning'];
                            unset($_SESSION['warning']);
                            ?>
                        </div>
                    <?php } ?>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="username" placeholder="Username..." aria-describedby="username">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password..." aria-describedby="password">
                    </div>
                    <div class="text-center">
                        <button type="submit" name='register' class="btn btn-primary">Register</button>
                    </div>
                    <div class="text-center">
                        <a href="../../index.php">Login</a>
                    </div>
                </form>

            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</body>

</html>