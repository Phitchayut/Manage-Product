<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php 
    session_start();
    require_once '../../../server/config/connect.php';

    if(isset($_POST['submit'])) {
        $type_name = $_POST['type_name'];

        $stmt = $conn->prepare("INSERT INTO type(type_name) VALUES (:type_name)");
        $stmt->bindParam(":type_name", $type_name);
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
            header("refresh:1; url=show_typeProduct.php");
        } else {
            $_SESSION['error'] = "Data has not been inserted succesfully";
        }
    }
?>