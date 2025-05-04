<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ma_nv = $_POST['ma_nv'];
    $thang = $_POST['thang'];
    $nam = $_POST['nam'];
    $thuong = $_POST['thuong'];

    $sql = "UPDATE luong SET thuong = thuong + $thuong, tong_luong = tong_luong + $thuong 
            WHERE ma_nv='$ma_nv' AND thang=$thang AND nam=$nam";

    if (mysqli_query($conn, $sql)) {
        echo "Đã cập nhật thưởng.";
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
}
?>

<h2>Thêm thưởng cho nhân viên</h2>
<form method="POST">
    Mã NV: <input type="text" name="ma_nv" required><br>
    Tháng: <input type="number" name="thang" min="1" max="12" required><br>
    Năm: <input type="number" name="nam" required><br>
    Thưởng thêm: <input type="number" name="thuong" required><br>
    <button type="submit">Cập nhật</button>
</form>
