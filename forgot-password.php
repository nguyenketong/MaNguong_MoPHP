<?php
session_start();

$msg = "";
$msg_type = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    
    if (empty($email)) {
        $msg = "Vui lòng nhập email của bạn!";
        $msg_type = "error";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = "Email không hợp lệ!";
        $msg_type = "error";
    } else {
        // TODO: Kiểm tra email trong database và gửi link reset password
        // Giả lập gửi email thành công
        $msg = "Đã gửi link đặt lại mật khẩu đến email: <strong>$email</strong><br>Vui lòng kiểm tra hộp thư của bạn.";
        $msg_type = "success";
        
        // Code mẫu gửi email (cần cấu hình SMTP):
        /*
        $reset_token = bin2hex(random_bytes(32));
        $reset_link = "http://yourdomain.com/reset-password.php?token=$reset_token";
        
        // Lưu token vào database với thời gian hết hạn
        // $conn->query("UPDATE users SET reset_token='$reset_token', reset_expires=DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email='$email'");
        
        // Gửi email
        $to = $email;
        $subject = "Đặt lại mật khẩu - Long Hoàn";
        $message = "Click vào link sau để đặt lại mật khẩu: $reset_link";
        $headers = "From: noreply@longhoan.com";
        mail($to, $subject, $message, $headers);
        */
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên Mật Khẩu - Long Hoàn</title>
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

        .forgot-card {
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
        }
        .form-input {
            width: 100%; 
            padding: 14px 20px;
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

        .info-box {
            background: #e3f2fd;
            border: 1px solid #90caf9;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            font-size: 13px;
            color: #1565c0;
        }
        .info-box i {
            margin-right: 8px;
        }
    </style>
</head>
<body>

    <div class="forgot-card">
        <a href="login.php" class="btn-back">
            <i class="fa fa-arrow-left"></i> Quay lại đăng nhập
        </a>

        <div class="card-header">
            <i class="fas fa-lock"></i>
            <h2>Quên Mật Khẩu?</h2>
            <p>Đừng lo lắng! Nhập email của bạn và chúng tôi sẽ gửi link để đặt lại mật khẩu.</p>
        </div>

        <?php if ($msg != ""): ?>
            <div class="alert-box <?php echo ($msg_type == 'error') ? 'alert-error' : 'alert-success'; ?>">
                <?php echo $msg; ?>
            </div>
        <?php endif; ?>

        <?php if ($msg_type != 'success'): ?>
            <div class="info-box">
                <i class="fas fa-info-circle"></i>
                Link đặt lại mật khẩu sẽ có hiệu lực trong 1 giờ.
            </div>

            <form method="POST" action="">
                <div class="form-group">
                    <input 
                        type="email" 
                        name="email" 
                        class="form-input" 
                        placeholder="Nhập email của bạn" 
                        required
                        value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
                    >
                </div>

                <button type="submit" class="btn-submit">
                    <i class="fas fa-paper-plane"></i> Gửi Link Đặt Lại
                </button>
            </form>
        <?php endif; ?>

        <div class="login-link">
            Nhớ mật khẩu rồi? <a href="login.php">Đăng nhập ngay</a>
        </div>
    </div>

</body>
</html>
