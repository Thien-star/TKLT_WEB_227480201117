<?php
$servername = "localhost";
$username = "root";
$password = ""; // Mặc định XAMPP không có mật khẩu
$dbname = "ql_nhansu";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Thiết lập UTF-8 để hỗ trợ tiếng Việt
$conn->set_charset("utf8");
?>
