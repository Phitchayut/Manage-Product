<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php 

    session_start();
    require_once '../../../server/config/connect.php';

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $type_name = $_POST['type_name'];

        $stmt = $conn->prepare("UPDATE type SET type_name = :type_name WHERE type_id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":type_name", $type_name);
        $stmt->execute();

        if ($stmt) {
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
            header("refresh:1; url=show_typeProduct.php");
        } else {
            header("location: show_typeProduct.php");
        }
    }

?>