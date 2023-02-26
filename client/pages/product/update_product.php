<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php 

    session_start();
    require_once '../../../server/config/connect.php';

    if (isset($_POST['submit'])) {
        $prd_id = $_POST['prd_id'];
        $prd_name = $_POST['prd_name'];
        $type_id = $_POST['type_id'];
        $prd_price = $_POST['prd_price'];
        $old_img = $_POST['old_img'];


        if (is_uploaded_file($_FILES['prd_image']['tmp_name'])) {
            $new_image_name = 'prd_' . uniqid() . "." . pathinfo(basename($_FILES['prd_image']['name']), PATHINFO_EXTENSION);
            $image_upload_path = "./upload/" . $new_image_name;
            move_uploaded_file($_FILES['prd_image']['tmp_name'], $image_upload_path);
        } else {
            $new_image_name = "$old_img";
        }
        
        $sql = $conn->prepare("UPDATE product SET prd_name = :prd_name, type_id = :type_id, prd_price = :prd_price, prd_image = :prd_image WHERE prd_id = :prd_id");
        $sql->bindParam(":prd_id", $prd_id);
        $sql->bindParam(":prd_name", $prd_name);
        $sql->bindParam(":type_id", $type_id);
        $sql->bindParam(":prd_price", $prd_price);
        $sql->bindParam(":prd_image", $new_image_name);
        $sql->execute();

        if ($sql) {
            echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'สำเร็จ',
                        text: 'อัพเดทข้อมูลเรียบร้อย!',
                        icon: 'success',
                        timer: 3000,
                        showConfirmButton: false
                    });
                })
            </script>";
            header("refresh:1; url=show_product.php");
        } else {
            header("location: show_product.php");
        }
    }


?>