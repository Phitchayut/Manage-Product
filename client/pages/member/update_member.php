<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php 

    session_start();
    require_once '../../../server/config/connect.php';

    if (isset($_POST['update_member'])) {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $role = $_POST['role'];

        $stmt = $conn->prepare("UPDATE member SET username = :username, role = :role WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":role", $role);
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
            header("refresh:1; url=show_member.php");
        } else {
            header("location: show_member.php");
        }
    }

?>