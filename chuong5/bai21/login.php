<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Thông tin đăng nhập mẫu (trong thực tế bạn sẽ kiểm tra với database)
$valid_username = "xubin";
$valid_email = "zjm@email.com";
$valid_password = "12345678";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($username == $valid_username && $email == $valid_email && $password == $valid_password) {
        // Lưu thông tin vào session
        $_SESSION["username"] = $username;
        $_SESSION["email"] = $email;
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>TRANG XỬ LÝ THÔNG TIN ĐĂNG NHẬP</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    text-align: center;
                    padding-top: 50px;
                }
                h1 {
                    margin-bottom: 20px;
                }
                .success-message {
                    background-color: #d4edda;
                    color: #155724;
                    padding: 15px;
                    border: 1px solid #c3e6cb;
                    border-radius: 5px;
                    margin-bottom: 20px;
                }
                .button {
                    display: inline-block;
                    padding: 10px 20px;
                    background-color: #007bff;
                    color: white;
                    text-decoration: none;
                    border-radius: 5px;
                }
                .button:hover {
                    background-color: #0056b3;
                }
            </style>
        </head>
        <body>
            <h1>TRANG XỬ LÝ THÔNG TIN ĐĂNG NHẬP</h1>
            <div class="success-message">
                Thông tin đăng nhập hợp lệ
            </div>
            <a href="mainpage.php" class="button">Trang chính</a>
        </body>
        </html>
        <?php
        exit();
    } else {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>TRANG XỬ LÝ THÔNG TIN ĐĂNG NHẬP</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    text-align: center;
                    padding-top: 50px;
                }
                h1 {
                    margin-bottom: 20px;
                }
                .error-message {
                    background-color: #f8d7da;
                    color: #721c24;
                    padding: 15px;
                    border: 1px solid #f5c6cb;
                    border-radius: 5px;
                    margin-bottom: 20px;
                }
                .button {
                    display: inline-block;
                    padding: 10px 20px;
                    background-color: #007bff;
                    color: white;
                    text-decoration: none;
                    border-radius: 5px;
                }
                .button:hover {
                    background-color: #0056b3;
                }
            </style>
        </head>
        <body>
            <h1>TRANG XỬ LÝ THÔNG TIN ĐĂNG NHẬP</h1>
            <div class="error-message">
                Thông tin đăng nhập không hợp lệ. Vui lòng thử lại.
            </div>
            <a href="login.html" class="button">Quay lại trang đăng nhập</a>
        </body>
        </html>
        <?php
    }
} else {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>TRANG XỬ LÝ THÔNG TIN ĐĂNG NHẬP</title>
    </head>
    <body>
        <h1>TRANG XỬ LÝ THÔNG TIN ĐĂNG NHẬP</h1>
        <p>Không có dữ liệu được gửi.</p>
        <a href="login.html">Quay lại trang đăng nhập</a>
    </body>
    </html>
    <?php
}
?>