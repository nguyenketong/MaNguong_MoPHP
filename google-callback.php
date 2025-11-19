<?php
session_start();
require_once 'google-config.php';

/**
 * FILE XỬ LÝ CALLBACK TỪ GOOGLE
 * Google sẽ redirect về đây sau khi user đăng nhập
 */

// Kiểm tra có mã authorization code không
if (!isset($_GET['code'])) {
    die('Lỗi: Không nhận được mã xác thực từ Google');
}

$auth_code = $_GET['code'];

// Bước 1: Đổi authorization code lấy access token
$token_url = 'https://oauth2.googleapis.com/token';
$token_data = [
    'code' => $auth_code,
    'client_id' => GOOGLE_CLIENT_ID,
    'client_secret' => GOOGLE_CLIENT_SECRET,
    'redirect_uri' => GOOGLE_REDIRECT_URI,
    'grant_type' => 'authorization_code'
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $token_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($token_data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$token_info = json_decode($response, true);

if (!isset($token_info['access_token'])) {
    die('Lỗi: Không lấy được access token từ Google');
}

$access_token = $token_info['access_token'];

// Bước 2: Dùng access token để lấy thông tin user
$user_info_url = 'https://www.googleapis.com/oauth2/v2/userinfo?access_token=' . $access_token;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $user_info_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$user_data = curl_exec($ch);
curl_close($ch);

$user = json_decode($user_data, true);

if (!isset($user['email'])) {
    die('Lỗi: Không lấy được thông tin người dùng từ Google');
}

// Bước 3: Lưu thông tin user vào session
$_SESSION['user_logged_in'] = true;
$_SESSION['user_name'] = $user['name'];
$_SESSION['user_email'] = $user['email'];
$_SESSION['user_avatar'] = $user['picture'] ?? '';
$_SESSION['user_google_id'] = $user['id'];
$_SESSION['login_method'] = 'google';

// Bước 4: (TÙY CHỌN) Lưu user vào database
// Kiểm tra xem email đã tồn tại chưa, nếu chưa thì tạo mới
/*
$conn = new mysqli('localhost', 'username', 'password', 'database');
$email = $conn->real_escape_string($user['email']);
$name = $conn->real_escape_string($user['name']);
$google_id = $conn->real_escape_string($user['id']);
$avatar = $conn->real_escape_string($user['picture']);

$check = $conn->query("SELECT * FROM users WHERE email = '$email' OR google_id = '$google_id'");
if ($check->num_rows == 0) {
    // Tạo user mới
    $conn->query("INSERT INTO users (fullname, email, google_id, avatar, created_at) 
                  VALUES ('$name', '$email', '$google_id', '$avatar', NOW())");
}
$conn->close();
*/

// Bước 5: Chuyển hướng về trang chủ
header('Location: index.php');
exit();
?>
