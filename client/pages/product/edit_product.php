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
                <form action="update_product.php" method="post" enctype="multipart/form-data">
                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $stmt = $conn->query("SELECT * FROM product WHERE prd_id = $id");
                        $stmt->execute();
                        $row = $stmt->fetch();
                        $ptype_id = $row['type_id'];
                    }
                    ?>
                    <div class="mb-3">
                        <input type="text" value="<?= $row['prd_id']; ?>" required class="visually-hidden" name="prd_id">
                    </div>
                    <div class="mb-3">
                        <label for="prd_name" class="col-form-label">ชื่อสินค้า:</label>
                        <input type="text" value="<?= $row['prd_name']; ?>" class="form-control" name="prd_name">
                    </div>
                    <div class="mb-3">
                        <label for="type_id" class="col-form-label">ประเภทสินค้า:</label>
                        <select class="form-select" name="type_id" aria-label="Default select example">
                            <option selected>เลือกประเภทสินค้า</option>
                            <?php
                            $stmt = $conn->prepare("SELECT * FROM type");
                            $stmt->execute();
                            $result = $stmt->fetchAll();
                            foreach ($result as $rs) {
                                $ttype_id = $rs['type_id'];
                            ?>
                                <option value="<?= $rs['type_id']; ?>"
                                 <?php
                                    if($ptype_id==$ttype_id){
                                        echo "selected=selected";
                                    }
                                 ?>>
                                 <?= $rs['type_name'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="prd_price" class="col-form-label">ราคาสินค้า:</label>
                        <input type="text" value="<?= $row['prd_price']; ?>" class="form-control" name="prd_price">
                    </div>
                    <div class="mb-3">
                        <label for="" class="col-form-label">รูปภาพสินค้า:</label>
                        <img width="120" src="./upload/<?= $row['prd_image']; ?>" alt=""> <br>
                        <input type="file" class="form-control" id="imgInput" name="prd_image">
                        <input type="hidden" name="old_img" value="<?= $row['prd_image']; ?>">           
                        <img class="mt-2" width="500" src="./uploads/<?= $row['prd_image']; ?>" id="previewImg" alt="">        
                    </div>
                    <div>
                        <button type="submit" name="submit" class="btn btn-success">บันทึก</button>
                        <a href="show_product.php" class="btn btn-danger">ย้อนกลับ</a>
                    </div>
                </form>

            </div>
            <div class="col-md-3"></div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
        let imgInput = document.getElementById('imgInput');
        let previewImg = document.getElementById('previewImg');

        imgInput.onchange = evt => {
            const [file] = imgInput.files;
            if (file) {
                previewImg.src = URL.createObjectURL(file)
            }
        }
    </script>
</body>

</html>