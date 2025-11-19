<?php
/**
 * FILE ĐĂNG XUẤT
 * Xóa tất cả session và chuyển về trang đăng nhập
 */

session_start();

// Xóa tất cả session variables
$_SESSION = array();

// Xóa session cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-3600, '/');
}

// Hủy session
session_destroy();

// Chuyển về trang đăng nhập
header('Location: login.php');
exit();
?>
