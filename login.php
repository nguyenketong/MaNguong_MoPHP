<?php
session_start(); // Khởi tạo session để lưu trạng thái đăng nhập
require_once 'google-config.php';

/* ============================================================
   PHẦN XỬ LÝ PHP (BACKEND)
   ============================================================ */
$msg = "";
$msg_type = ""; // success | error

// Tạo URL đăng nhập Google
$google_login_url = 'https://accounts.google.com/o/oauth2/v2/auth?' . http_build_query([
    'client_id' => GOOGLE_CLIENT_ID,
    'redirect_uri' => GOOGLE_REDIRECT_URI,
    'response_type' => 'code',
    'scope' => GOOGLE_SCOPE,
    'access_type' => 'offline',
    'prompt' => 'select_account'
]);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // 1. Validate dữ liệu
    if (empty($username) || empty($password)) {
        $msg = "Vui lòng nhập tên đăng nhập và mật khẩu!";
        $msg_type = "error";
    } else {
        // 2. KIỂM TRA TRONG CSDL (Code mẫu giả lập)
        // Ở đây bạn sẽ query database: SELECT * FROM users WHERE email = '$username' AND password = '...'
        
        // GIẢ LẬP: Mặc định cứ nhập đúng là "admin" / "123456" thì thành công (để bạn test)
        // Hoặc cho phép đăng nhập mọi tài khoản để test giao diện
        
        // Giả sử đăng nhập thành công:
        $_SESSION['user_logged_in'] = true;
        $_SESSION['user_name'] = $username; // Lưu tên người dùng
        
        $msg = "Đăng nhập thành công! Đang chuyển hướng...";
        $msg_type = "success";
        
        // Chuyển hướng về trang chủ sau 1.5 giây
        header("refresh:1.5;url=index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập - Long Hoàn</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* ============================================================
           CSS STYLING (Đồng bộ với Register)
           ============================================================ */
        :root {
            --color-primary: #1e5631;  /* Xanh rêu đậm */
            --color-hover: #143d22;
            --color-bg: #f4f6f8;
            --google-red: #DB4437;
            --border-radius-pill: 50px;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        
        body { 
            background-color: var(--color-bg); 
            color: #333; 
            display: flex; justify-content: center; align-items: center; 
            min-height: 100vh; padding: 20px;
        }

        /* Card Container */
        .login-card {
            background: #fff;
            width: 100%; max-width: 450px;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            position: relative;
        }

        /* Nút Back */
        .btn-back {
            display: inline-flex; align-items: center; gap: 5px;
            text-decoration: none; color: #777; font-size: 14px; font-weight: 600;
            margin-bottom: 20px; transition: 0.3s;
        }
.btn-back:hover { color: var(--color-primary); transform: translateX(-5px); }

        /* Header Form */
        .card-header { text-align: center; margin-bottom: 30px; }
        .card-header h2 { color: var(--color-primary); text-transform: uppercase; font-weight: 800; font-size: 24px; }
        .card-header p { color: #777; font-size: 14px; margin-top: 5px; }

        /* Input Styles */
        .form-group { margin-bottom: 20px; }
        .form-input {
            width: 100%; padding: 14px 20px;
            border: 1px solid #ddd; background-color: #fafafa;
            border-radius: var(--border-radius-pill);
            outline: none; transition: 0.3s; font-size: 15px;
        }
        .form-input:focus {
            border-color: var(--color-primary); background-color: #fff;
            box-shadow: 0 0 0 4px rgba(30, 86, 49, 0.1);
        }

        /* Nút Submit */
        .btn-submit {
            width: 100%; padding: 14px;
            background-color: var(--color-primary); color: white;
            font-weight: bold; text-transform: uppercase; border: none;
            border-radius: var(--border-radius-pill); cursor: pointer; margin-top: 10px;
            transition: 0.3s; font-size: 16px;
        }
        .btn-submit:hover { background-color: var(--color-hover); transform: translateY(-2px); }

        /* Tiện ích: Quên mật khẩu + Checkbox */
        .form-options {
            display: flex; justify-content: space-between; align-items: center;
            font-size: 13px; margin-bottom: 20px; color: #555;
        }
        .form-options a { color: var(--color-primary); font-weight: 600; }
        .form-options label { display: flex; align-items: center; gap: 5px; cursor: pointer; }

        /* Google Button & Divider */
        .divider { text-align: center; margin: 25px 0; position: relative; }
        .divider span { background: #fff; padding: 0 10px; color: #999; font-size: 12px; position: relative; z-index: 1; }
        .divider::after { content: ""; position: absolute; left: 0; top: 50%; width: 100%; height: 1px; background: #eee; z-index: 0; }

        .btn-google {
            display: flex; align-items: center; justify-content: center; gap: 10px;
            width: 100%; padding: 12px;
            background-color: white; color: #333;
            border: 1px solid #ddd; border-radius: var(--border-radius-pill);
            text-decoration: none; font-weight: 600; font-size: 15px;
            transition: 0.3s;
        }
        .btn-google:hover { background-color: #f9f9f9; border-color: #ccc; }

        /* Link chuyển trang */
        .register-link { text-align: center; margin-top: 30px; font-size: 14px; }
        .register-link a { color: var(--color-primary); font-weight: 800; text-decoration: none; }
        .register-link a:hover { text-decoration: underline; }

        /* Alert */
.alert-box { padding: 12px; border-radius: 10px; margin-bottom: 20px; text-align: center; font-size: 14px; }
        .alert-error { background: #fde8e8; color: #c81e1e; border: 1px solid #f8b4b4; }
        .alert-success { background: #def7ec; color: #03543f; border: 1px solid #84e1bc; }
    </style>
</head>
<body>

    <div class="login-card">
        <!-- Nút quay lại trang chủ -->
        <a href="index.php" class="btn-back">
            <i class="fa fa-arrow-left"></i> Trang chủ
        </a>

        <div class="card-header">
            <h2>Đăng Nhập</h2>
            <p>Chào mừng bạn quay trở lại Nhà thuốc Long Hoàn</p>
        </div>

        <?php if ($msg != ""): ?>
            <div class="alert-box <?php echo ($msg_type == 'error') ? 'alert-error' : 'alert-success'; ?>">
                <?php echo $msg; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <input type="text" name="username" class="form-input" placeholder="Email hoặc Số điện thoại" required>
            </div>

            <div class="form-group">
                <input type="password" name="password" class="form-input" placeholder="Mật khẩu" required>
            </div>

            <div class="form-options">
                <label>
                    <input type="checkbox" name="remember"> Ghi nhớ đăng nhập
                </label>
                <a href="forgot-password.php">Quên mật khẩu?</a>
            </div>

            <button type="submit" class="btn-submit">Đăng Nhập</button>
        </form>

        <div class="divider"><span>HOẶC</span></div>

        <a href="<?php echo htmlspecialchars($google_login_url); ?>" class="btn-google">
            <i class="fab fa-google" style="color: var(--google-red);"></i> Đăng nhập bằng Google
        </a>

        <div class="register-link">
            Bạn chưa có tài khoản? <br>
            <a href="register.php">Đăng ký tài khoản mới</a>
        </div>
    </div>

</body>
</html>
