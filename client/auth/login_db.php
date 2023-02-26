<?php 
    session_start();
    require_once '../../server/config/connect.php';

    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if (empty($username)) {
            $_SESSION['error'] = 'กรุณากรอก Username';
            header("location: ../../index.php");
        } else if (empty($password)) {
            $_SESSION['error'] = 'กรุณากรอก Password';
            header("location: ../../index.php");
        } else if (strlen($_POST['password']) > 12 || strlen($_POST['password']) < 5) {
            $_SESSION['error'] = 'รหัสผ่านต้องมีความยาว ระหว่าง 5 ถึง 12 ตัวอักษร';
            header("location: ../../index.php");
        } else {
            try {
                $check_role = $conn->prepare("SELECT * FROM member WHERE username = :username");
                $check_role->bindParam(":username",$username);
                $check_role->execute();
                $row = $check_role->fetch(PDO::FETCH_ASSOC);
                

                if ($check_role->rowCount() > 0) {

                    if ($username == $row['username']) {
                        if (password_verify($password, $row['password'])) {
                            if ($row['role'] == 'admin') {
                                $_SESSION['admin_login'] = $row['id'];
                                header("location: ../pages/page_admin.php");
                            } else {
                                $_SESSION['user_login'] = $row['id'];
                                header("location: ../pages/page_user.php");
                            }
                        } else {
                            $_SESSION['error'] = "รหัสผ่านผิด";
                            header("location: ../../index.php");
                        }
                    } else {
                        $_SESSION['error'] = "ชื่อผู้ใช้ผิด";
                        header("location: ../../index.php");
                    }
                } else {
                    $_SESSION['error'] = "ไม่มีข้อมูลผู้ใช้ในระบบ";
                    header("location: ../../index.php");
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

?>