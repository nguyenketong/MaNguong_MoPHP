# HƯỚNG DẪN CÀI ĐẶT ĐĂNG NHẬP GOOGLE

## Bước 1: Tạo Google OAuth Credentials

1. Truy cập [Google Cloud Console](https://console.cloud.google.com/)
2. Đăng nhập bằng tài khoản Google của bạn
3. Tạo project mới:
   - Click "Select a project" ở góc trên
   - Click "NEW PROJECT"
   - Đặt tên project (ví dụ: "Long Hoan Website")
   - Click "CREATE"

4. Bật Google+ API:
   - Vào menu "APIs & Services" > "Library"
   - Tìm "Google+ API" hoặc "Google People API"
   - Click "ENABLE"

5. Tạo OAuth Credentials:
   - Vào "APIs & Services" > "Credentials"
   - Click "CREATE CREDENTIALS" > "OAuth client ID"
   - Nếu chưa có OAuth consent screen, click "CONFIGURE CONSENT SCREEN":
     - Chọn "External" (cho phép mọi người dùng)
     - Điền tên app: "Long Hoan"
     - Điền email hỗ trợ
     - Click "SAVE AND CONTINUE"
   
   - Quay lại tạo OAuth client ID:
     - Application type: "Web application"
     - Name: "Long Hoan Web Client"
     - Authorized redirect URIs: Thêm các URL sau:
       ```
       http://localhost/google-callback.php
       http://127.0.0.1/google-callback.php
       ```
       (Nếu deploy lên server thật, thêm: `https://yourdomain.com/google-callback.php`)
     
   - Click "CREATE"
   - **LƯU LẠI** Client ID và Client Secret

## Bước 2: Cấu hình file google-config.php

Mở file `google-config.php` và thay thế:

```php
define('GOOGLE_CLIENT_ID', 'YOUR_CLIENT_ID_HERE.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', 'YOUR_CLIENT_SECRET_HERE');
define('GOOGLE_REDIRECT_URI', 'http://localhost/google-callback.php');
```

Với thông tin thực tế:
- `GOOGLE_CLIENT_ID`: Client ID bạn vừa lấy
- `GOOGLE_CLIENT_SECRET`: Client Secret bạn vừa lấy
- `GOOGLE_REDIRECT_URI`: URL callback (thay localhost bằng domain thật nếu cần)

## Bước 3: Kiểm tra PHP có cURL

Google OAuth cần extension cURL. Kiểm tra:

```php
<?php
if (function_exists('curl_version')) {
    echo "cURL đã được cài đặt";
} else {
    echo "Cần cài đặt cURL";
}
?>
```

Nếu chưa có cURL:
- **XAMPP/WAMP**: Mở `php.ini`, bỏ dấu `;` trước `extension=curl`
- **Linux**: `sudo apt-get install php-curl`

## Bước 4: Test đăng nhập

1. Mở trình duyệt, vào `http://localhost/login.php`
2. Click nút "Đăng nhập bằng Google"
3. Chọn tài khoản Google
4. Cho phép ứng dụng truy cập thông tin
5. Sẽ được redirect về trang chủ với session đã đăng nhập

## Bước 5: Kiểm tra session

Thêm code này vào `index.php` để kiểm tra:

```php
<?php
session_start();
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
    echo "Xin chào: " . $_SESSION['user_name'];
    echo "<br>Email: " . $_SESSION['user_email'];
    if (isset($_SESSION['user_avatar'])) {
        echo "<br><img src='" . $_SESSION['user_avatar'] . "' width='50'>";
    }
    echo "<br><a href='logout.php'>Đăng xuất</a>";
} else {
    echo "Chưa đăng nhập";
}
?>
```

## Bước 6: Tạo file logout.php

```php
<?php
session_start();
session_destroy();
header('Location: login.php');
exit();
?>
```

## Lưu ý quan trọng

1. **Bảo mật**: KHÔNG commit file `google-config.php` lên Git nếu có thông tin thật
2. **HTTPS**: Khi deploy production, bắt buộc dùng HTTPS
3. **Database**: Nên lưu thông tin user vào database (xem code comment trong `google-callback.php`)
4. **Error handling**: Thêm try-catch để xử lý lỗi tốt hơn

## Troubleshooting

### Lỗi "redirect_uri_mismatch"
- Kiểm tra URL trong Google Console khớp 100% với `GOOGLE_REDIRECT_URI`
- Chú ý http vs https, có/không có www

### Lỗi "invalid_client"
- Client ID hoặc Client Secret sai
- Kiểm tra lại file `google-config.php`

### Không nhận được thông tin user
- Kiểm tra cURL đã bật chưa
- Xem error log PHP: `error_log()` hoặc `var_dump()`

## Tài liệu tham khảo

- [Google OAuth 2.0 Documentation](https://developers.google.com/identity/protocols/oauth2)
- [Google Cloud Console](https://console.cloud.google.com/)
