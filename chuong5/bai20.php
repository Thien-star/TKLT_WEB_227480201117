<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập thành viên</title>
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }
        .login-container {
            width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .input-group {
            margin-bottom: 15px;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        .input-group input {
            width: calc(100% - 18px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #3e8e41;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: blue;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php
    session_start();

    // Kiểm tra nếu đã đăng nhập từ trước
    if (isset($_COOKIE['login']) && isset($_COOKIE['email'])) {
        $_SESSION['email'] = $_COOKIE['email'];
        header("Location: welcome.php");
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        $maso = trim($_POST["maso"]);

        // Đọc thông tin người dùng từ file users.ini
        $users = parse_ini_file("users.ini", true);
        
        if (isset($users[$email]) && $users[$email]["password"] === $password && $users[$email]["maso"] === $maso) {
            $_SESSION["email"] = $email;
            
            // Lưu thông tin đăng nhập vào cookie, hết hạn sau 3 phút
            setcookie("login", "true", time() + 180, "/");
            setcookie("email", $email, time() + 180, "/");
            
            header("Location: welcome.php");
            exit;
        } else {
            echo "<script>alert('Thông tin đăng nhập không chính xác.'); window.location.href='login.php';</script>";
        }
    }
    ?>
    <div class="login-container">
        <h2>Đăng nhập thành viên</h2>
        <form method="post">
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required placeholder="@blu.edu.vn">
            </div>
            <div class="input-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="maso">Mã số</label>
                <input type="text" id="maso" name="maso" required>
            </div>
            <button type="submit">Đăng nhập</button>
            <a href="register.php">Đăng ký</a>
        </form>
    </div>
</body>
</html>