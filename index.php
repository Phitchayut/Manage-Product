<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6 mt-5">
                <form action="client/auth/login_db.php" method="post">
                    <h3 class="text-center">Login</h3>
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
                    <div class="mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username...">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password...">
                    </div>
                    <div class="text-center">
                        <button type="submit" name="login" class="btn btn-primary w-50">Login</button>
                    </div>

                    <div class="text-center">
                        <a href="client/auth/register_form.php">Register</a>
                    </div>

                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</body>

</html>