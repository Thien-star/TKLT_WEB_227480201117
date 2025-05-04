<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ma_nv = $_POST['ma_nv'];
    $thang = $_POST['thang'];
    $nam = $_POST['nam'];
    $luong_cb = $_POST['luong_cb'];
    $phu_cap = $_POST['phu_cap'];
    $thuong = $_POST['thuong'];
    $khau_tru = $_POST['khau_tru'];
    $tong_luong = $luong_cb + $phu_cap + $thuong - $khau_tru;

    $check = mysqli_query($conn, "SELECT * FROM luong WHERE ma_nv='$ma_nv' AND thang=$thang AND nam=$nam");
    if (mysqli_num_rows($check) > 0) {
        $sql = "UPDATE luong SET luong_cb=$luong_cb, phu_cap=$phu_cap, thuong=$thuong, khau_tru=$khau_tru, tong_luong=$tong_luong 
                WHERE ma_nv='$ma_nv' AND thang=$thang AND nam=$nam";
    } else {
        $sql = "INSERT INTO luong (ma_nv, thang, nam, luong_cb, phu_cap, thuong, khau_tru, tong_luong) 
                VALUES ('$ma_nv', $thang, $nam, $luong_cb, $phu_cap, $thuong, $khau_tru, $tong_luong)";
    }

    if (mysqli_query($conn, $sql)) {
        echo "Cập nhật thành công.";
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
}
?>

<h2>Cập nhật lương</h2>
<form method="POST">
    Mã NV: <input type="text" name="ma_nv" required><br>
    Tháng: <input type="number" name="thang" min="1" max="12" required><br>
    Năm: <input type="number" name="nam" required><br>
    Lương cơ bản: <input type="number" step="0.01" name="luong_cb" required><br>
    Phụ cấp: <input type="number" step="0.01" name="phu_cap"><br>
    Thưởng: <input type="number" step="0.01" name="thuong"><br>
    Khấu trừ: <input type="number" step="0.01" name="khau_tru"><br>
    <button type="submit">Lưu</button>
</form>
