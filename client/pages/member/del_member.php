<?php
session_start();
require_once '../../../server/config/connect.php';
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $deletestmt = $conn->query("DELETE FROM member WHERE id = $delete_id");
    $deletestmt->execute();
    
    if ($deletestmt) {
        header("refresh:1; url=show_member.php");
    }
}

?>