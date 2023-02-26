<?php 
    session_start();
    require_once '../../server/config/connect.php';

    if(isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = 'user';

        if (empty($username)) {
            $_SESSION['error'] = 'กรุณากรอก Username';
            header("location: register_form.php");
        } else if (empty($password)) {
            $_SESSION['error'] = 'กรุณากรอก Password';
            header("location: register_form.php");
        } else if (strlen($_POST['password']) > 12 || strlen($_POST['password']) < 5) {
            $_SESSION['error'] = 'รหัสผ่านต้องมีความยาว ระหว่าง 5 ถึง 12 ตัวอักษร';
            header("location: register_form.php");
        } else {
            try {
                $check_username = $conn->prepare("SELECT username FROM member WHERE username = :username");
                $check_username->bindParam(":username",$username);
                $check_username->execute();
                $row = $check_username->fetch(PDO::FETCH_ASSOC);

                if ($row['username'] == $username) {
                    $_SESSION['warning'] = "คุณเคยลงทะเบียนแล้ว";
                    header("location: register_form.php");
                } else if (!isset($_SESSION['error'])) {
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO member (username,password,role)
                    VALUES (:username,:password,:role)");
                    $stmt->bindParam(":username", $username);
                    $stmt->bindParam(":password", $passwordHash);
                    $stmt->bindParam(":role", $role);
                    $stmt->execute();

                    $_SESSION['success'] = "สมัครสมาชิกเรียบร้อยแล้ว! <a href='../../index.php' class='alert-link'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
                    header("location: register_form.php");
                } else {
                    $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                    header("location: register_form.php");
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

?>