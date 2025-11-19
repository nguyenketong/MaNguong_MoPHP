<?php
/**
 * CẤU HÌNH CHUNG CỦA WEBSITE
 */

// Thông tin website
define('SITE_NAME', 'Long Hoàn');
define('SITE_TITLE', 'Long Hoàn - Cửa hàng thuốc tây');
define('SITE_EMAIL', 'longhoan@gmail.com');
define('SITE_HOTLINE', '0123.456.7890');

// Đường dẫn
define('BASE_URL', 'http://localhost/');
define('UPLOAD_DIR', __DIR__ . '/../uploads/');

// Session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Timezone
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
