<?php
// Kết nối CSDL
$conn = mysqli_connect("localhost", "root", "", "quanlybanhang");
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Lấy dữ liệu từ form
$mahd = $_POST['mahd'];
$makh = $_POST['makh'];
$mahang = $_POST['mahang'];
$soluong = $_POST['soluong'];
$thanhtien = $_POST['thanhtien'];

// Thêm dữ liệu
$sql = "INSERT INTO HOADON (mahd, makh, mahang, soluong, thanhtien)
        VALUES ('$mahd', '$makh', '$mahang', '$soluong', '$thanhtien')";

if (mysqli_query($conn, $sql)) {
    echo "Thêm hóa đơn thành công!";
} else {
    echo "Lỗi: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
