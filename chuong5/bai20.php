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
    <div class="login-container">
        <h2>Đăng nhập thành viên</h2>
        <form method="post">
            <div class="input-group">
                <label for="email">Email name</label>
                <input type="email" id="email" name="email" placeholder="@blu.edu.vn">
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="input-group">
                <label for="maso">Mã số</label>
                <input type="text" id="maso" name="maso">
            </div>
            <button type="submit">Đăng nhập</button>
            <a href="a">Đăng ký</a>
        </form>
    </div>

    <?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $maso = $_POST["maso"];

        $users = parse_ini_file("users.ini");

        if (isset($users[$email]) && $users[$email]["password"] == $password && $users[$email]["maso"] == $maso) {
            $_SESSION["email"] = $email;
            setcookie("login", true, time() + 180);
            header("Location: welcome.php");
            exit;
        } else {
            echo "<script>alert('Thông tin đăng nhập không chính xác.'); window.location.href='login.php';</script>";
        }
    }
    ?>
</body>
</html>