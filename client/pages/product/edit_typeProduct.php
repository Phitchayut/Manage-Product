<?php
session_start();
require_once '../../../server/config/connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php

    if (isset($_SESSION['admin_login'])) {
        $user_id = $_SESSION['admin_login'];
        $stmt = $conn->query("SELECT * FROM member WHERE id = $user_id");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    ?>
    <?php require 'navbar_product.php' ?>

    <div class="container">
        <h3 class="text-center mt-5">แก้ไขประเภทสินค้า</h3>
        <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form action="update_typeProduct.php" method="post" enctype="multipart/form-data">
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $stmt = $conn->query("SELECT * FROM type WHERE type_id = $id");
                    $stmt->execute();
                    $row = $stmt->fetch();
                }
                ?>
                <div class="mb-3">
                <input type="text"  value="<?= $row['type_id']; ?>" required class="visually-hidden" name="id">
                </div>
                <div class="mb-3">
                    <label for="type_name" class="col-form-label">ชื่อประเภทสินค้า:</label>
                    <input type="text" value="<?= $row['type_name']; ?>" class="form-control" name="type_name">
                </div>
                <div>
                <button type="submit" name="submit" class="btn btn-success">บันทึก</button>
                <a href="show_typeProduct.php" class="btn btn-danger">ย้อนกลับ</a>
            </div>
            </form>

        </div>
        <div class="col-md-3"></div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>