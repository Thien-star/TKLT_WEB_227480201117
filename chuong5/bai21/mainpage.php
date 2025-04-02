<?php
session_start();

if (isset($_SESSION["username"]) && isset($_SESSION["email"])) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>TRANG CHÍNH</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                text-align: center;
                padding-top: 50px;
            }
            h1 {
                margin-bottom: 20px;
            }
            .welcome-message {
                background-color: #e9ecef;
                padding: 15px;
                border: 1px solid #dee2e6;
                border-radius: 5px;
                margin-bottom: 20px;
            }
            .button {
                display: inline-block;
                padding: 10px 20px;
                background-color: #dc3545;
                color: white;
                text-decoration: none;
                border-radius: 5px;
            }
            .button:hover {
                background-color: #c82333;
            }
        </style>
    </head>
    <body>
        <h1>TRANG CHÍNH</h1>
        <div class="welcome-message">
            Người dùng đã đăng nhập với tên <?php echo $_SESSION["username"]; ?> và Email là <?php echo $_SESSION["email"]; ?>
        </div>
        <a href="logout.php" class="button">Đăng xuất</a>
    </body>
    </html>
    <?php
} else {
    // Nếu không có session thì chuyển hướng về trang đăng nhập
    header("Location: login.html");
    exit();
}
?>