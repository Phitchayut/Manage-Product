<?php
session_start();
require_once '../../../server/config/connect.php';
if (!isset($_SESSION['admin_login'])) {
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
    <title>Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
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
    <?php require 'add_typeProduct_modal.php' ?>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6">
                <h2>จัดการประเภทสินค้า</h2>
            </div>
            <div class="col-md-6 d-flex justify-content-end align-items-center">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addTypeProduct" data-bs-whatever="@mdo">เพิ่มประเภทสินค้า</button>
            </div>
        </div>

        <div class="mt-5">
            <table class="table table-bordered text-center" id="tbl_typeProduct">
                <thead>
                    <tr>
                        <th scope="col">รหัสประเภทสินค้า</th>
                        <th scope="col">ประเภทสินค้า</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $stmt = $conn->prepare("SELECT * FROM type");
                        $stmt->execute();
                        $result = $stmt->fetchAll();
                        foreach ($result as $row) {
                    ?>
                    <tr>
                        <td><?= $row['type_id'] ?></td>
                        <td><?= $row['type_name'] ?></td>
                        <td>
                        <a href="edit_typeProduct.php?id=<?= $row['type_id']; ?>" class="btn btn-warning">Edit</a>
                            <a data-id="<?= $row['type_id']; ?>" href="?delete=<?= $row['type_id']; ?>" class="btn btn-danger delete-btn">Del.</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!-- swal2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- dataTable -->
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tbl_typeProduct').DataTable();
        });

        $(".delete-btn").click(function(e) {
            var prdID = $(this).data('id');
            e.preventDefault();
            deleteConfirm(prdID);
        })

        function deleteConfirm(prdID) {
            Swal.fire({
                title: 'Are you sure?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                showLoaderOnConfirm: true,
                preConfirm: function() {
                    return new Promise(function(resolve) {
                        $.ajax({
                                url: 'del_typeProduct.php',
                                type: 'GET',
                                data: 'delete=' + prdID,
                            })
                            .done(function() {
                                Swal.fire({
                                    title: 'success',
                                    text: 'Data deleted successfully!',
                                    icon: 'success',
                                }).then(() => {
                                    document.location.href = 'show_typeProduct.php';
                                })
                            })
                            .fail(function() {
                                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error')
                                window.location.reload();
                            });
                    });
                },
            });
        }

    </script>

</body>

</html>