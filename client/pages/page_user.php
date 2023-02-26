<?php

session_start();
require_once '../../server/config/connect.php';
if (!isset($_SESSION['user_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: ../../index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php

    if (isset($_SESSION['user_login'])) {
        $user_id = $_SESSION['user_login'];
        $stmt = $conn->query("SELECT * FROM member WHERE id = $user_id");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav text-black fs-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hello, <span class="text-uppercase"><?php echo $row['username'] ?></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li> <a href="../auth/logout.php" class="dropdown-item">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h3 class="text-center mt-5">สินค้าทั้งหมด</h3>
        <div class="card_prd text-center mt-3">
            <?php
            $stmt = $conn->prepare("SELECT * FROM product,type WHERE product.type_id = type.type_id ORDER BY prd_id DESC");
            $stmt->execute();
            $result = $stmt->fetchAll();
            foreach ($result as $row) {
            ?>
                <div id="myList" class="card_prd_item shadow p-3 mb-5 bg-body">
                    <div class="prd_img">
                        <img src="product/upload/<?= $row['prd_image'] ?>" alt="">
                    </div>
                    <div class="prd_name fs-6 fw-bold mt-3"><?= $row['prd_name'] ?></div>
                    <div class="prd_detail">
                        <div class="prd_type text-muted"><?= $row['type_name'] ?></div>
                        <div class="prd_price text-danger">฿<?= $row['prd_price'] ?>.-</div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>