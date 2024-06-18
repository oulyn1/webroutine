<?php
// Bắt đầu session
session_start();

// Hủy tất cả các biến session
$_SESSION = array();

// Hủy session
session_destroy();

// Chuyển hướng đến trang đăng nhập
header("location: ../../index.php");
exit;
?>