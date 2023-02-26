<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

session_start();
require_once "../../../server/config/connect.php";

if (isset($_POST['submit'])) {
    $prd_name = $_POST['prd_name'];
    $type_prd = $_POST['type_prd'];
    $prd_price = $_POST['prd_price'];

    if (is_uploaded_file($_FILES['prd_image']['tmp_name'])) {
        $new_image_name = 'prd_' . uniqid() . "." . pathinfo(basename($_FILES['prd_image']['name']), PATHINFO_EXTENSION);
        $image_upload_path = "./upload/" . $new_image_name;
        move_uploaded_file($_FILES['prd_image']['tmp_name'], $image_upload_path);
    } else {
        $new_image_name = "";
    }
    $stmt = $conn->prepare("INSERT INTO product(prd_name, type_id, prd_price, prd_image) VALUES(:prd_name, :type_id, :prd_price, :prd_image)");
    $stmt->bindParam(":prd_name", $prd_name);
    $stmt->bindParam(":type_id", $type_prd);
    $stmt->bindParam(":prd_price", $prd_price);
    $stmt->bindParam(":prd_image", $new_image_name);
    $stmt->execute();

    if ($stmt) {
        echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'สำเร็จ',
                        text: 'เพิ่มข้อมูลเรียบร้อย!',
                        icon: 'success',
                        timer: 5000,
                        showConfirmButton: false
                    });
                })
            </script>";
        header("refresh:1; url=show_product.php");
    } else {
        $_SESSION['error'] = "Data has not been inserted succesfully";
    }
}
?>