<?php
/* GIỮ NGUYÊN PHẦN XỬ LÝ PHP CŨ */
$msg = "";
$msg_type = ""; 

if (!file_exists('uploads')) { mkdir('uploads', 0777, true); }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = htmlspecialchars(trim($_POST['fullname']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = $_POST['password'];
    $re_pass = $_POST['re_password'];
    
    // Xử lý ảnh (giữ nguyên logic cũ)
    $avatar_path = "default-avatar.png"; 
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . time() . "_" . basename($_FILES["avatar"]["name"]);
        move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
        $avatar_path = $target_file;
    }

    if (empty($fullname) || empty($phone) || empty($password)) {
        $msg = "Vui lòng nhập đủ thông tin (*)"; $msg_type = "error";
    } elseif ($password !== $re_pass) {
        $msg = "Mật khẩu không khớp!"; $msg_type = "error";
    } else {
        $msg = "Đăng ký thành công! <br> <a href='index.php'>Về trang chủ ngay</a>"; 
        $msg_type = "success";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký - Long Hoàn</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* CSS GIỮ NGUYÊN, CHỈ THÊM NÚT BACK */
        :root {
            --color-primary: #1e5631; --color-hover: #143d22;
            --color-bg: #f4f6f8; --border-radius-pill: 50px;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { background-color: var(--color-bg); display: flex; justify-content: center; align-items: center; min-height: 100vh; padding: 20px; }
        
        .register-card {
            background: #fff; width: 100%; max-width: 480px;
            padding: 30px 40px; border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1); position: relative;
        }

        /* --- THÊM STYLE CHO NÚT QUAY LẠI --- */
        .btn-back {
            display: inline-flex; align-items: center; gap: 5px;
            text-decoration: none; color: #777; font-size: 14px; font-weight: 600;
            margin-bottom: 20px; transition: 0.3s;
        }
        .btn-back:hover { color: var(--color-primary); transform: translateX(-5px); }

        /* Các style cũ giữ nguyên */
        .card-header { text-align: center; margin-bottom: 20px; }
        .card-header h2 { color: var(--color-primary); text-transform: uppercase; }
        .avatar-wrapper { text-align: center; margin-bottom: 20px; }
        .avatar-preview { width: 100px; height: 100px; border-radius: 50%; border: 3px solid var(--color-primary); object-fit: cover; margin: 0 auto; display: block; background: #eee; }
        .form-group { margin-bottom: 15px; }
        .form-input { width: 100%; padding: 12px 20px; border: 1px solid #ddd; background: #fafafa; border-radius: var(--border-radius-pill); outline: none; }
        .form-input:focus { border-color: var(--color-primary); background: #fff; }
        .btn-submit { width: 100%; padding: 14px; background: var(--color-primary); color: white; border: none; border-radius: var(--border-radius-pill); cursor: pointer; font-weight: bold; text-transform: uppercase; }
        .btn-google { display: flex; align-items: center; justify-content: center; gap: 10px; width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: var(--border-radius-pill); text-decoration: none; color: #333; margin-top: 20px; font-weight: 600;}
        .alert-box { padding: 10px; border-radius: 10px; margin-bottom: 15px; text-align: center; background: #def7ec; color: #03543f; }
        .alert-error { background: #fde8e8; color: #c81e1e; }
    </style>
</head>
<body>

    <div class="register-card">
        
        <!-- NÚT QUAY LẠI INDEX.PHP -->
        <a href="index.php" class="btn-back">
            <i class="fa fa-arrow-left"></i> Quay lại trang chủ
        </a>

        <div class="card-header">
            <h2>Đăng Ký</h2>
            <p>Tạo tài khoản Long Hoàn</p>
        </div>

        <?php if ($msg != ""): ?>
            <div class="alert-box <?php echo ($msg_type == 'error') ? 'alert-error' : ''; ?>">
                <?php echo $msg; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="" enctype="multipart/form-data">
            <div class="avatar-wrapper">
                <img id="avatarPreview" class="avatar-preview" src="https://cdn-icons-png.flaticon.com/512/149/149071.png">
                <label style="cursor: pointer; font-size: 13px; color: var(--color-primary); font-weight: bold; margin-top:5px; display:block;">
                    <i class="fa fa-camera"></i> Tải ảnh lên
                    <input type="file" name="avatar" accept="image/*" style="display: none;" onchange="previewImage(this)">
                </label>
            </div>

            <div class="form-group"><input type="text" name="fullname" class="form-input" placeholder="Họ và tên (*)" required></div>
            <div class="form-group"><input type="text" name="phone" class="form-input" placeholder="Số điện thoại (*)" required></div>
            <div class="form-group"><input type="password" name="password" class="form-input" placeholder="Mật khẩu (*)" required></div>
            <div class="form-group"><input type="password" name="re_password" class="form-input" placeholder="Nhập lại mật khẩu (*)" required></div>

            <button type="submit" class="btn-submit">Đăng Ký Ngay</button>
        </form>

        <a href="https://accounts.google.com/signup" target="_blank" class="btn-google">
            <i class="fab fa-google" style="color: #DB4437;"></i> Đăng ký bằng Google
        </a>
    </div>

    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) { document.getElementById('avatarPreview').src = e.target.result; }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>