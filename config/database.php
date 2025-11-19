<?php
/**
 * CẤU HÌNH KẾT NỐI DATABASE
 */

// Thông tin kết nối database
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'longhoan_db');

// Tạo kết nối
function getDBConnection() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    
    $conn->set_charset("utf8mb4");
    return $conn;
}

// Đóng kết nối
function closeDBConnection($conn) {
    if ($conn) {
        $conn->close();
    }
}
?>
