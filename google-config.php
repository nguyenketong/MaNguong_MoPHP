<?php
/**
 * CẤU HÌNH GOOGLE OAUTH
 * 
 * HƯỚNG DẪN LẤY THÔNG TIN:
 * 1. Truy cập: https://console.cloud.google.com/
 * 2. Tạo project mới hoặc chọn project có sẵn
 * 3. Vào "APIs & Services" > "Credentials"
 * 4. Tạo "OAuth 2.0 Client ID"
 * 5. Chọn "Web application"
 * 6. Thêm Authorized redirect URIs: http://localhost/google-callback.php
 *    (Thay localhost bằng domain thực của bạn khi deploy)
 * 7. Copy Client ID và Client Secret vào đây
 */

// Thông tin OAuth từ Google Cloud Console
define('GOOGLE_CLIENT_ID', 'YOUR_CLIENT_ID_HERE.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', 'YOUR_CLIENT_SECRET_HERE');

// URL callback sau khi Google xác thực
// Thay đổi domain này theo môi trường của bạn
define('GOOGLE_REDIRECT_URI', 'http://localhost/google-callback.php');

// Các quyền truy cập cần thiết
define('GOOGLE_SCOPE', 'email profile');
?>
