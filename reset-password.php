<?php
session_start();

$msg = "";
$msg_type = "";
$token = isset($_GET['token']) ? $_GET['token'] : '';

// Kiểm tra token có hợp lệ không
$token_valid = !empty($token); // TODO: Kiểm tra trong database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $reset_token = $_POST['token'];
    
    if (empty($password) || empty($confirm_password)) {
        $msg = "Vui lòng nhập đầy đủ thông tin!";
        $msg_type = "error";
    } elseif (strlen($password) < 6) {
        $msg = "Mật khẩu phải có ít nhất 6 ký tự!";
        $msg_type = "error";
    } elseif ($password !== $confirm_password) {
        $msg = "Mật khẩu xác nhận không khớp!";
        $msg_type = "error";
    } else {
        // TODO: Cập nhật mật khẩu mới vào database
        // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // $conn->query("UPDATE users SET password='$hashed_password', reset_token=NULL WHERE reset_token='$reset_token'");
        
        $msg = "Đặt lại mật khẩu thành công! Đang chuyển đến trang đăng nhập...";
        $msg_type = "success";
        header("refresh:2;url=login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Lại Mật Khẩu - Long Hoàn</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --color-primary: #1e5631;
            --color-hover: #143d22;
            --color-bg: #f4f6f8;
            --border-radius-pill: 50px;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        
        body { 
            background-color: var(--color-bg); 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            min-height: 100vh; 
            padding: 20px;
        }

        .reset-card {
            background: #fff;
            width: 100%; 
            max-width: 480px;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .btn-back {
            display: inline-flex; 
            align-items: center; 
            gap: 5px;
            text-decoration: none; 
            color: #777; 
            font-size: 14px; 
            font-weight: 600;
            margin-bottom: 20px; 
            transition: 0.3s;
        }
        .btn-back:hover { 
            color: var(--color-primary); 
            transform: translateX(-5px); 
        }

        .card-header { 
            text-align: center; 
            margin-bottom: 30px; 
        }
        .card-header i {
            font-size: 60px;
            color: var(--color-primary);
            margin-bottom: 15px;
        }
        .card-header h2 { 
            color: var(--color-primary); 
            text-transform: uppercase; 
            font-weight: 800; 
            font-size: 24px;
            margin-bottom: 10px;
        }
        .card-header p { 
            color: #777; 
            font-size: 14px; 
            line-height: 1.6;
        }

        .form-group { 
            margin-bottom: 20px; 
            position: relative;
        }
        .form-input {
            width: 100%; 
            padding: 14px 50px 14px 20px;
            border: 1px solid #ddd; 
            background-color: #fafafa;
            border-radius: var(--border-radius-pill);
            outline: none; 
            transition: 0.3s; 
            font-size: 15px;
        }
        .form-input:focus {
            border-color: var(--color-primary); 
            background-color: #fff;
            box-shadow: 0 0 0 4px rgba(30, 86, 49, 0.1);
        }

        .toggle-password {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #999;
            transition: 0.3s;
        }
        .toggle-password:hover {
            color: var(--color-primary);
        }

        .btn-submit {
            width: 100%; 
            padding: 14px;
            background-color: var(--color-primary); 
            color: white;
            font-weight: bold; 
            text-transform: uppercase; 
            border: none;
            border-radius: var(--border-radius-pill); 
            cursor: pointer; 
            margin-top: 10px;
            transition: 0.3s; 
            font-size: 16px;
        }
        .btn-submit:hover { 
            background-color: var(--color-hover); 
            transform: translateY(-2px); 
        }

        .login-link { 
            text-align: center; 
            margin-top: 25px; 
            font-size: 14px; 
        }
        .login-link a { 
            color: var(--color-primary); 
            font-weight: 800; 
            text-decoration: none; 
        }
        .login-link a:hover { 
            text-decoration: underline; 
        }

        .alert-box { 
            padding: 12px; 
            border-radius: 10px; 
            margin-bottom: 20px; 
            text-align: center; 
            font-size: 14px; 
            line-height: 1.6;
        }
        .alert-error { 
            background: #fde8e8; 
            color: #c81e1e; 
            border: 1px solid #f8b4b4; 
        }
        .alert-success { 
            background: #def7ec; 
            color: #03543f; 
            border: 1px solid #84e1bc; 
        }
        .alert-warning { 
            background: #fff3cd; 
            color: #856404; 
            border: 1px solid #ffeaa7; 
        }

        .password-requirements {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            font-size: 13px;
        }
        .password-requirements h4 {
            color: var(--color-primary);
            margin-bottom: 10px;
            font-size: 14px;
        }
        .password-requirements ul {
            list-style: none;
            padding: 0;
        }
        .password-requirements li {
            padding: 5px 0;
            color: #666;
        }
        .password-requirements li i {
            margin-right: 8px;
            color: var(--color-primary);
        }
    </style>
</head>
<body>

    <div class="reset-card">
        <a href="login.php" class="btn-back">
            <i class="fa fa-arrow-left"></i> Quay lại đăng nhập
        </a>

        <div class="card-header">
            <i class="fas fa-key"></i>
            <h2>Đặt Lại Mật Khẩu</h2>
            <p>Nhập mật khẩu mới cho tài khoản của bạn</p>
        </div>

        <?php if ($msg != ""): ?>
            <div class="alert-box <?php echo ($msg_type == 'error') ? 'alert-error' : 'alert-success'; ?>">
                <?php echo $msg; ?>
            </div>
        <?php endif; ?>

        <?php if (!$token_valid): ?>
            <div class="alert-box alert-warning">
                <i class="fas fa-exclamation-triangle"></i>
                Link đặt lại mật khẩu không hợp lệ hoặc đã hết hạn!<br>
                <a href="forgot-password.php" style="color: #856404; font-weight: bold;">Yêu cầu link mới</a>
            </div>
        <?php else: ?>
            <div class="password-requirements">
                <h4><i class="fas fa-shield-alt"></i> Yêu cầu mật khẩu:</h4>
                <ul>
                    <li><i class="fas fa-check-circle"></i> Ít nhất 6 ký tự</li>
                    <li><i class="fas fa-check-circle"></i> Nên có chữ hoa, chữ thường</li>
                    <li><i class="fas fa-check-circle"></i> Nên có số và ký tự đặc biệt</li>
                </ul>
            </div>

            <form method="POST" action="">
                <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
                
                <div class="form-group">
                    <input 
                        type="password" 
                        name="password" 
                        id="password"
                        class="form-input" 
                        placeholder="Mật khẩu mới" 
                        required
                    >
                    <i class="fas fa-eye toggle-password" onclick="togglePassword('password')"></i>
                </div>

                <div class="form-group">
                    <input 
                        type="password" 
                        name="confirm_password" 
                        id="confirm_password"
                        class="form-input" 
                        placeholder="Xác nhận mật khẩu mới" 
                        required
                    >
                    <i class="fas fa-eye toggle-password" onclick="togglePassword('confirm_password')"></i>
                </div>

                <button type="submit" class="btn-submit">
                    <i class="fas fa-check"></i> Đặt Lại Mật Khẩu
                </button>
            </form>
        <?php endif; ?>

        <div class="login-link">
            <a href="login.php">Quay lại đăng nhập</a>
        </div>
    </div>

    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = field.nextElementSibling;
            
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>

</body>
</html>
